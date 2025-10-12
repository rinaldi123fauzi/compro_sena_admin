<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Google\Analytics\Data\V1beta\Client\BetaAnalyticsDataClient;
use Google\Analytics\Data\V1beta\Metric;
use Google\Analytics\Data\V1beta\RunRealtimeReportRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;
use Throwable;

class AnalyticsController extends Controller
{
    public function overview(): View
    {
        $timezone = config('app.timezone', 'UTC');
        $end = Carbon::now($timezone)->endOfDay();
        $start = $end->copy()->subDays(6)->startOfDay();
        $period = Period::create($start, $end);
        $suffix = 'overview_' . $start->format('Ymd') . '_' . $end->format('Ymd');

        $summaryData = $this->fetchSummary($period, $suffix);
        $realtimeActiveUsers = $this->fetchRealtimeActiveUsers();

        return view('admin.analytics', [
            'summary' => $summaryData['summary'],
            'rows' => $summaryData['rows'],
            'realtimeActiveUsers' => $realtimeActiveUsers,
            'startDate' => $start->toDateString(),
            'endDate' => $end->toDateString(),
        ]);
    }

    public function insights(Request $request): View
    {
        [$startDate, $endDate] = $this->resolveDates($request);
        $period = Period::create($startDate, $endDate);
        $rangeKey = $startDate->format('Ymd') . '_' . $endDate->format('Ymd');

        $summary = $this->fetchSummary($period, $rangeKey);

        $geoRows = $this->fetchReport(
            "ga_geo_{$rangeKey}",
            $period,
            ['activeUsers', 'conversions'],
            ['country', 'city'],
            50,
            'activeUsers'
        );

        $deviceRows = $this->fetchReport(
            "ga_device_{$rangeKey}",
            $period,
            ['activeUsers', 'engagementRate', 'conversions'],
            ['deviceCategory'],
            25,
            'activeUsers'
        );

        $platformRows = $this->fetchReport(
            "ga_platform_{$rangeKey}",
            $period,
            ['activeUsers', 'conversions'],
            ['platform', 'operatingSystem', 'browser'],
            40,
            'activeUsers'
        );

        $landingPages = $this->fetchReport(
            "ga_landing_{$rangeKey}",
            $period,
            ['activeUsers', 'sessions', 'engagementRate', 'conversions'],
            ['landingPagePlusQueryString'],
            40,
            'activeUsers'
        );

        $topPagesRaw = $this->fetchReport(
            "ga_pages_{$rangeKey}",
            $period,
            ['screenPageViews', 'userEngagementDuration'],
            ['pagePath', 'pageTitle'],
            40,
            'screenPageViews'
        );

        $topPages = array_map(function (array $row) {
            $views = $row['screenPageViews'] ?? 0.0;
            $engagement = $row['userEngagementDuration'] ?? 0.0;
            $row['avgEngagementTime'] = $views > 0 ? $engagement / $views : null;

            return $row;
        }, $topPagesRaw);

        $exitPagesRaw = $this->fetchReport(
            "ga_exit_{$rangeKey}",
            $period,
            ['exits', 'screenPageViews'],
            ['pagePath'],
            40,
            'exits'
        );

        $exitPages = array_map(function (array $row) {
            $views = $row['screenPageViews'] ?? 0.0;
            $exits = $row['exits'] ?? 0.0;
            $row['exitRate'] = $views > 0 ? $exits / $views : null;

            return $row;
        }, $exitPagesRaw);

        $siteSearchRaw = $this->fetchReport(
            "ga_search_{$rangeKey}",
            $period,
            ['eventCount', 'conversions'],
            ['searchTerm'],
            40,
            'eventCount'
        );

        $siteSearch = array_values(array_filter($siteSearchRaw, function (array $row) {
            $term = trim((string) ($row['searchTerm'] ?? ''));

            return $term !== '' && $term !== '(not set)' && $term !== '(not provided)';
        }));

        return view('admin.analytics-insights', [
            'startDate' => $startDate->toDateString(),
            'endDate' => $endDate->toDateString(),
            'summary' => $summary['summary'],
            'geoRows' => $geoRows,
            'deviceRows' => $deviceRows,
            'platformRows' => $platformRows,
            'landingPages' => $landingPages,
            'topPages' => $topPages,
            'exitPages' => $exitPages,
            'siteSearchRows' => $siteSearch,
        ]);
    }

    protected function resolveDates(Request $request): array
    {
        $timezone = config('app.timezone', 'UTC');
        $endInput = $request->input('end_date');
        $startInput = $request->input('start_date');

        $end = $endInput ? Carbon::parse($endInput, $timezone) : Carbon::now($timezone);
        $start = $startInput ? Carbon::parse($startInput, $timezone) : $end->copy()->subDays(6);

        if ($start->gt($end)) {
            [$start, $end] = [$end->copy(), $start->copy()];
        }

        return [$start->copy()->startOfDay(), $end->copy()->endOfDay()];
    }

    protected function fetchSummary(Period $period, string $cacheSuffix): array
    {
        return Cache::remember("ga_summary_{$cacheSuffix}", now()->addMinutes(5), function () use ($period) {
            $metrics = [
                'activeUsers',
                'totalUsers',
                'sessions',
                'screenPageViews',
                'engagementRate',
                'averageSessionDuration',
            ];

            try {
                $collection = Analytics::get($period, $metrics, ['date']);
            } catch (Throwable $e) {
                Log::warning('Unable to fetch GA summary', [
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                ]);

                return [
                    'summary' => array_fill_keys($metrics, 0.0),
                    'rows' => [],
                ];
            }

            $rows = $collection->map(function ($row) use ($metrics) {
                $normalized = [
                    'date' => $row['date'] ?? null,
                ];

                foreach ($metrics as $metric) {
                    $value = $row[$metric] ?? null;
                    $normalized[$metric] = is_numeric($value) ? (float) $value : 0.0;
                }

                return $normalized;
            })->values()->all();

            $summary = [];
            foreach ($metrics as $metric) {
                $summary[$metric] = array_reduce(
                    $rows,
                    function ($carry, $item) use ($metric) {
                        return $carry + ($item[$metric] ?? 0);
                    },
                    0.0
                );
            }

            return [
                'summary' => $summary,
                'rows' => $rows,
            ];
        });
    }

    protected function fetchReport(
        string $cacheKey,
        Period $period,
        array $metrics,
        array $dimensions,
        int $limit = 10,
        ?string $sortMetric = null
    ): array {
        return Cache::remember($cacheKey, now()->addMinutes(5), function () use ($period, $metrics, $dimensions, $limit, $sortMetric) {
            try {
                $collection = Analytics::get($period, $metrics, $dimensions);
            } catch (Throwable $e) {
                Log::warning('Unable to fetch GA report', [
                    'metrics' => $metrics,
                    'dimensions' => $dimensions,
                    'message' => $e->getMessage(),
                    'code' => $e->getCode(),
                ]);

                return [];
            }

            $rows = $collection->map(function ($row) use ($metrics, $dimensions) {
                $normalized = [];

                foreach ($dimensions as $dimension) {
                    $normalized[$dimension] = $row[$dimension] ?? null;
                }

                foreach ($metrics as $metric) {
                    $value = $row[$metric] ?? null;
                    $normalized[$metric] = is_numeric($value) ? (float) $value : null;
                }

                return $normalized;
            });

            if ($sortMetric !== null) {
                $rows = $rows->sortByDesc(function ($row) use ($sortMetric) {
                    return $row[$sortMetric] ?? 0;
                });
            }

            return $rows->take($limit)->values()->all();
        });
    }

    protected function fetchRealtimeActiveUsers(): ?int
    {
        $propertyId = config('analytics.property_id');
        $credentialsPath = config('analytics.service_account_credentials_json');

        if (empty($propertyId) || empty($credentialsPath) || !is_file($credentialsPath)) {
            return null;
        }

        try {
            $client = new BetaAnalyticsDataClient([
                'credentials' => $credentialsPath,
            ]);

            $request = (new RunRealtimeReportRequest())
                ->setProperty('properties/' . $propertyId)
                ->setMetrics([new Metric(['name' => 'activeUsers'])]);

            $response = $client->runRealtimeReport($request);

            $client->close();

            $rows = $response->getRows();
            if (empty($rows)) {
                return null;
            }

            $metricValues = $rows[0]->getMetricValues();
            if (empty($metricValues)) {
                return null;
            }

            $value = $metricValues[0]->getValue();

            return is_numeric($value) ? (int) $value : null;
        } catch (Throwable $e) {
            Log::warning('Unable to fetch GA realtime active users', [
                'message' => $e->getMessage(),
                'code' => $e->getCode(),
            ]);

            return null;
        }
    }
}
