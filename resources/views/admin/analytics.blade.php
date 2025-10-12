<x-template.layout>
    @php
        $rowsCollection = collect($rows ?? [])
            ->filter(function ($row) {
                return is_array($row) && !empty($row['date']);
            })
            ->sortBy('date')
            ->values();

        $periodDays = 7;

        $todayRow = $rowsCollection->last();
        $yesterdayRow = $rowsCollection->slice(-2, 1)->first();
        $twoDaysAgoRow = $rowsCollection->slice(-3, 1)->first();

        $currentPeriodRows = collect(array_slice($rowsCollection->all(), -$periodDays));
        $previousPeriodRows =
            $rowsCollection->count() >= $periodDays * 2
                ? collect(array_slice($rowsCollection->all(), -($periodDays * 2), $periodDays))
                : collect();

        $metricConfigs = collect([
            'activeUsers' => [
                'label' => 'Active Users',
                'icon' => 'ri-user-line',
                'bg' => 'primary',
                'type' => 'number',
                'decimals' => 0,
                'delta_decimals' => 1,
                'secondary' => 'totalUsers',
            ],
            'sessions' => [
                'label' => 'Sessions',
                'icon' => 'ri-bar-chart-line',
                'bg' => 'info',
                'type' => 'number',
                'decimals' => 0,
                'delta_decimals' => 1,
            ],
            'engagementRate' => [
                'label' => 'Engagement Rate',
                'icon' => 'ri-pulse-line',
                'bg' => 'success',
                'type' => 'percent',
                'decimals' => 1,
                'delta_decimals' => 1,
            ],
            'averageSessionDuration' => [
                'label' => 'Avg. Engagement Time',
                'icon' => 'ri-timer-line',
                'bg' => 'warning',
                'type' => 'duration',
                'decimals' => 0,
                'delta_decimals' => 1,
            ],
            
        ]);

        $getNumeric = function ($row, $key) {
            if (!is_array($row)) {
                return null;
            }

            $value = $row[$key] ?? null;

            return is_numeric($value) ? (float) $value : null;
        };

        $aggregate = function ($rowsSet, $key, $mode) {
            $values = collect($rowsSet)
                ->map(function ($row) use ($key) {
                    if (!is_array($row)) {
                        return null;
                    }

                    $value = $row[$key] ?? null;

                    return is_numeric($value) ? (float) $value : null;
                })
                ->filter(function ($value) {
                    return $value !== null;
                });

            if ($values->isEmpty()) {
                return null;
            }

            return $mode === 'avg' ? $values->avg() : $values->sum();
        };

        $formatValue = function ($value, $config) {
            if ($value === null) {
                return '—';
            }

            $decimals = $config['decimals'] ?? 0;

            switch ($config['type'] ?? 'number') {
                case 'percent':
                    return number_format($value * 100, $decimals) . '%';
                case 'duration':
                    $seconds = (int) round($value);
                    if ($seconds < 60) {
                        return $seconds . 's';
                    }

                    $minutes = intdiv($seconds, 60);
                    $remaining = $seconds % 60;

                    if ($minutes >= 60) {
                        $hours = intdiv($minutes, 60);
                        $minutes = $minutes % 60;

                        return sprintf('%dh %02dm', $hours, $minutes);
                    }

                    return sprintf('%dm %02ds', $minutes, $remaining);
                case 'currency':
                    $symbol = $config['currency'] ?? 'Rp';

                    return $symbol . ' ' . number_format($value, $decimals);
                default:
                    return number_format($value, $decimals);
            }
        };

        $calcDelta = function ($current, $previous) {
            if ($current === null || $previous === null || $previous == 0.0) {
                return null;
            }

            return (($current - $previous) / $previous) * 100;
        };

        $formatDelta = function ($delta, $decimals = 1) {
            if ($delta === null) {
                return [
                    'class' => 'secondary',
                    'icon' => 'ri-subtract-line',
                    'text' => '—',
                ];
            }

            $rounded = round($delta, $decimals);

            if ($rounded > 0) {
                return [
                    'class' => 'success',
                    'icon' => 'ri-arrow-up-line',
                    'text' => '+' . number_format($rounded, $decimals) . '%',
                ];
            }

            if ($rounded < 0) {
                return [
                    'class' => 'danger',
                    'icon' => 'ri-arrow-down-line',
                    'text' => number_format($rounded, $decimals) . '%',
                ];
            }

            return [
                'class' => 'secondary',
                'icon' => 'ri-subtract-line',
                'text' => number_format(0, $decimals) . '%',
            ];
        };

        $determineMode = function ($type) {
            return in_array($type, ['percent', 'duration', 'average'], true) ? 'avg' : 'sum';
        };

        $cards = $metricConfigs
            ->map(function ($config, $key) use (
                $todayRow,
                $yesterdayRow,
                $twoDaysAgoRow,
                $currentPeriodRows,
                $previousPeriodRows,
                $getNumeric,
                $aggregate,
                $formatValue,
                $calcDelta,
                $formatDelta,
                $determineMode,
            ) {
                $type = $config['type'] ?? 'number';
                $mode = $determineMode($type);

                $todayValue = $getNumeric($todayRow, $key);
                $yesterdayValue = $getNumeric($yesterdayRow, $key);
                $twoDaysAgoValue = $getNumeric($twoDaysAgoRow, $key);

                $weekValue = $aggregate($currentPeriodRows, $key, $mode);
                $prevWeekValue = $previousPeriodRows->isEmpty() ? null : $aggregate($previousPeriodRows, $key, $mode);

                $deltaDecimals = $config['delta_decimals'] ?? 1;

                $secondaryKey = $config['secondary'] ?? null;
                $secondaryToday = $secondaryKey ? $getNumeric($todayRow, $secondaryKey) : null;
                $secondaryFormatted = $secondaryToday !== null ? number_format($secondaryToday, 0) : null;
                $secondaryShare =
                    $secondaryToday && $todayValue
                        ? ($secondaryToday > 0
                            ? round(($todayValue / $secondaryToday) * 100, 1)
                            : null)
                        : null;

                return [
                    'key' => $key,
                    'config' => $config,
                    'values' => [
                        'today' => [
                            'label' => 'Hari ini',
                            'value' => $todayValue,
                            'formatted' => $formatValue($todayValue, $config),
                            'delta' => $formatDelta($calcDelta($todayValue, $yesterdayValue), $deltaDecimals),
                        ],
                        'yesterday' => [
                            'label' => 'Kemarin',
                            'value' => $yesterdayValue,
                            'formatted' => $formatValue($yesterdayValue, $config),
                            'delta' => $formatDelta($calcDelta($yesterdayValue, $twoDaysAgoValue), $deltaDecimals),
                        ],
                        'week' => [
                            'label' => '7 Hari',
                            'value' => $weekValue,
                            'formatted' => $formatValue($weekValue, $config),
                            'delta' => $formatDelta($calcDelta($weekValue, $prevWeekValue), $deltaDecimals),
                        ],
                    ],
                    'secondary_today' => $secondaryToday,
                    'secondary_formatted' => $secondaryFormatted,
                    'secondary_share' => $secondaryShare,
                ];
            })
            ->filter(function ($card) {
                return collect($card['values'])
                    ->pluck('value')
                    ->filter(function ($value) {
                        return $value !== null;
                    })
                    ->isNotEmpty();
            });
    @endphp

    <div class="page-content">
        <div class="container-fluid">
            <div class="row mb-4">
                <div class="col-12 d-flex flex-wrap align-items-center justify-content-between gap-2">
                    <div>
                        <h4 class="mb-0">Google Analytics</h4>
                        <small class="text-muted">Ringkasan KPI utama (hari ini, kemarin, 7 hari)</small>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <button type="button" class="btn btn-soft-secondary btn-sm" onclick="window.location.reload()">
                            <i class="ri-refresh-line"></i> Refresh
                        </button>
                    </div>
                </div>
            </div>
            @if (!is_null($realtimeActiveUsers ?? null))
                <div class="row g-3 mb-3">
                    <div class="col-xxl-3 col-md-6">
                        <div class="card card-animate h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div>
                                        <p class="text-uppercase text-muted fw-semibold mb-1"
                                            style="letter-spacing: 0.5px;">
                                            Active Users (Realtime)
                                        </p>
                                        <h3 class="mb-0 ff-secondary fw-semibold">
                                            {{ number_format($realtimeActiveUsers) }}</h3>
                                        <p class="text-muted mb-0" style="font-size: 12px;">
                                            Pengguna aktif 30 menit terakhir (Realtime API).
                                        </p>
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title rounded-circle bg-soft-primary text-primary fs-3">
                                            <i class="ri-speed-up-line"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            <div class="row g-3">

                @forelse ($cards as $card)
                    <div class="col-xxl-3 col-md-6">
                        <div class="card card-animate h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-start justify-content-between">
                                    <div>
                                        <p class="text-uppercase text-muted fw-semibold mb-1"
                                            style="letter-spacing: 0.5px;">
                                            {{ $card['config']['label'] }}
                                        </p>
                                        <h3 class="mb-0 ff-secondary fw-semibold">
                                            {{ $card['values']['today']['formatted'] }}
                                        </h3>
                                        @if ($card['secondary_today'] !== null)
                                            <p class="text-muted mb-0" style="font-size: 12px;">
                                                Total: {{ $card['secondary_formatted'] }}
                                                @if ($card['secondary_share'] !== null)
                                                    <span
                                                        class="ms-1">({{ number_format($card['secondary_share'], 1) }}%
                                                        aktif)</span>
                                                @endif
                                            </p>
                                        @endif
                                    </div>
                                    <div class="avatar-sm flex-shrink-0">
                                        <span
                                            class="avatar-title rounded-circle bg-soft-{{ $card['config']['bg'] }} text-{{ $card['config']['bg'] }} fs-3">
                                            <i class="{{ $card['config']['icon'] }}"></i>
                                        </span>
                                    </div>
                                </div>

                                <div class="mt-4 pt-3 border-top">
                                    <div class="row g-3 text-center">
                                        @foreach ($card['values'] as $point)
                                            <div class="col">
                                                <p class="text-muted text-uppercase mb-1"
                                                    style="font-size: 10px; letter-spacing: 0.5px;">
                                                    {{ $point['label'] }}
                                                </p>
                                                <h6 class="mb-1 fw-semibold">{{ $point['formatted'] }}</h6>
                                                @php($delta = $point['delta'])
                                                <span
                                                    class="badge bg-soft-{{ $delta['class'] }} text-{{ $delta['class'] }} fw-semibold"
                                                    style="font-size: 11px;">
                                                    <i
                                                        class="{{ $delta['icon'] }} align-middle me-1"></i>{{ $delta['text'] }}
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12">
                        <div class="alert alert-warning mb-0">
                            Data Google Analytics tidak tersedia untuk periode ini.
                        </div>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-template.layout>
