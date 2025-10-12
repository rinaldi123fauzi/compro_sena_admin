<x-template.layout>
    <div class="page-content">
        <div class="container-fluid">
            <div class="row align-items-center mb-4">
                <div class="col">
                    <h4 class="mb-1">Google Analytics – Insights</h4>
                    <p class="text-muted mb-0">Analisis audiens, perangkat, dan konten dengan rentang tanggal kustom.</p>
                </div>
                <div class="col-auto">
                    <form class="d-flex align-items-end gap-2" method="GET">
                        <div>
                            <label class="form-label mb-1" for="start_date">Mulai</label>
                            <input type="date" class="form-control form-control-sm" id="start_date" name="start_date"
                                value="{{ request('start_date', $startDate ?? now()->toDateString()) }}">
                        </div>
                        <div>
                            <label class="form-label mb-1" for="end_date">Selesai</label>
                            <input type="date" class="form-control form-control-sm" id="end_date" name="end_date"
                                value="{{ request('end_date', $endDate ?? now()->toDateString()) }}">
                        </div>
                        <div class="d-flex gap-2 align-items-end">
                            <button type="submit" class="btn btn-primary btn-sm">Terapkan</button>
                            <a href="{{ route('analytics.insights') }}" class="btn btn-soft-secondary btn-sm">Reset</a>
                        </div>
                    </form>
                </div>
            </div>

            @php
                $formatNumber = fn($value) => is_numeric($value) ? number_format($value) : '—';
                $formatPercent = fn($value, $decimals = 1) => is_numeric($value)
                    ? number_format($value * 100, $decimals) . '%'
                    : '—';
                $formatDuration = function ($seconds) {
                    if (!is_numeric($seconds)) {
                        return '—';
                    }

                    $seconds = (int) round($seconds);
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
                };
            @endphp

            <div class="row g-3 mb-4">
                <div class="col-xxl-3 col-md-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <p class="text-uppercase text-muted mb-1 fw-semibold" style="letter-spacing: 0.5px;">Active
                                Users</p>
                            <h3 class="ff-secondary fw-semibold mb-0">
                                {{ $formatNumber($summary['activeUsers'] ?? null) }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <p class="text-uppercase text-muted mb-1 fw-semibold" style="letter-spacing: 0.5px;">
                                Sessions</p>
                            <h3 class="ff-secondary fw-semibold mb-0">{{ $formatNumber($summary['sessions'] ?? null) }}
                            </h3>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <p class="text-uppercase text-muted mb-1 fw-semibold" style="letter-spacing: 0.5px;">
                                Engagement Rate</p>
                            <h3 class="ff-secondary fw-semibold mb-0">
                                {{ $formatPercent($summary['engagementRate'] ?? null, 1) }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-3 col-md-6">
                    <div class="card h-100 shadow-sm">
                        <div class="card-body">
                            <p class="text-uppercase text-muted mb-1 fw-semibold" style="letter-spacing: 0.5px;">Avg.
                                Engagement Time</p>
                            <h3 class="ff-secondary fw-semibold mb-0">
                                {{ $formatDuration($summary['averageSessionDuration'] ?? null) }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-xxl-6">
                    <div class="card h-100">
                        <div class="card-header align-items-center d-flex">
                            <h5 class="card-title mb-0 flex-grow-1">Geo – Country & City</h5>
                            <div class="flex-shrink-0"><small class="text-muted">Top lokasi berdasarkan users</small>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-nowrap align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th>Country</th>
                                            <th>City</th>
                                            <th class="text-end">Users</th>
                                            <th class="text-end">Conversions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($geoRows as $row)
                                            <tr>
                                                <td>{{ $row['country'] ?? '—' }}</td>
                                                <td>{{ $row['city'] ?? '—' }}</td>
                                                <td class="text-end">{{ $formatNumber($row['activeUsers'] ?? null) }}
                                                </td>
                                                <td class="text-end">{{ $formatNumber($row['conversions'] ?? null) }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Tidak ada data.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6">
                    <div class="card h-100">
                        <div class="card-header align-items-center d-flex">
                            <h5 class="card-title mb-0 flex-grow-1">Device</h5>
                            <div class="flex-shrink-0"><small class="text-muted">Kategori perangkat</small></div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-nowrap align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th>Device</th>
                                            <th class="text-end">Users</th>
                                            <th class="text-end">Engagement Rate</th>
                                            <th class="text-end">Conversions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($deviceRows as $row)
                                            <tr>
                                                <td>{{ $row['deviceCategory'] ?? '—' }}</td>
                                                <td class="text-end">{{ $formatNumber($row['activeUsers'] ?? null) }}
                                                </td>
                                                <td class="text-end">
                                                    {{ $formatPercent($row['engagementRate'] ?? null) }}</td>
                                                <td class="text-end">{{ $formatNumber($row['conversions'] ?? null) }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="4" class="text-center">Tidak ada data.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row g-4 mt-0">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h5 class="card-title mb-0 flex-grow-1">Platform / OS / Browser</h5>
                            <div class="flex-shrink-0"><small class="text-muted">Distribusi teknologi pengguna</small>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-nowrap align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th>Platform</th>
                                            <th>Operating System</th>
                                            <th>Browser</th>
                                            <th class="text-end">Users</th>
                                            <th class="text-end">Conversions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($platformRows as $row)
                                            <tr>
                                                <td>{{ $row['platform'] ?? '—' }}</td>
                                                <td>{{ $row['operatingSystem'] ?? '—' }}</td>
                                                <td>{{ $row['browser'] ?? '—' }}</td>
                                                <td class="text-end">{{ $formatNumber($row['activeUsers'] ?? null) }}
                                                </td>
                                                <td class="text-end">{{ $formatNumber($row['conversions'] ?? null) }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada data.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="row g-4 mt-0">
                <div class="col-xxl-6">
                    <div class="card h-100">
                        <div class="card-header align-items-center d-flex">
                            <h5 class="card-title mb-0 flex-grow-1">Top Landing Pages</h5>
                            <div class="flex-shrink-0"><small class="text-muted">Halaman masuk utama</small></div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-nowrap align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th>Landing Page</th>
                                            <th class="text-end">Users</th>
                                            <th class="text-end">Sessions</th>
                                            <th class="text-end">Engagement Rate</th>
                                            <th class="text-end">Conversions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($landingPages as $row)
                                            <tr>
                                                <td class="text-break" style="max-width:320px">{{ $row['landingPagePlusQueryString'] ?? '—' }}</td>
                                                <td class="text-end">{{ $formatNumber($row['activeUsers'] ?? null) }}</td>
                                                <td class="text-end">{{ $formatNumber($row['sessions'] ?? null) }}</td>
                                                <td class="text-end">{{ $formatPercent($row['engagementRate'] ?? null) }}</td>
                                                <td class="text-end">{{ $formatNumber($row['conversions'] ?? null) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center">Tidak ada data.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6">
                    <div class="card h-100">
                        <div class="card-header align-items-center d-flex">
                            <h5 class="card-title mb-0 flex-grow-1">Top Pages by Views</h5>
                            <div class="flex-shrink-0"><small class="text-muted">Performansi berdasarkan tampilan</small></div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-nowrap align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th>Page</th>
                                            <th class="text-end">Views</th>
                                            <th class="text-end">Avg. Engagement</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($topPages as $row)
                                            <tr>
                                                <td class="text-break" style="max-width:320px">
                                                    <div class="fw-semibold">{{ $row['pageTitle'] ?? '—' }}</div>
                                                    <small class="text-muted">{{ $row['pagePath'] ?? '' }}</small>
                                                </td>
                                                <td class="text-end">{{ $formatNumber($row['screenPageViews'] ?? null) }}</td>
                                                <td class="text-end">{{ $formatDuration($row['avgEngagementTime'] ?? null) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">Tidak ada data.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="row g-4 mt-0">
                <div class="col-xxl-6">
                    <div class="card h-100">
                        <div class="card-header align-items-center d-flex">
                            <h5 class="card-title mb-0 flex-grow-1">Exit Pages</h5>
                            <div class="flex-shrink-0"><small class="text-muted">Prioritas perbaikan</small></div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-nowrap align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th>Page</th>
                                            <th class="text-end">Exits</th>
                                            <th class="text-end">Exit Rate</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($exitPages as $row)
                                            <tr>
                                                <td class="text-break" style="max-width:320px">{{ $row['pagePath'] ?? '—' }}</td>
                                                <td class="text-end">{{ $formatNumber($row['exits'] ?? null) }}</td>
                                                <td class="text-end">{{ $formatPercent($row['exitRate'] ?? null) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">Tidak ada data.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-6">
                    <div class="card h-100">
                        <div class="card-header align-items-center d-flex">
                            <h5 class="card-title mb-0 flex-grow-1">Site Search</h5>
                            <div class="flex-shrink-0"><small class="text-muted">Kata kunci pencarian internal</small></div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-nowrap align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th>Search Term</th>
                                            <th class="text-end">Event Count</th>
                                            <th class="text-end">Conversions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($siteSearchRows as $row)
                                            <tr>
                                                <td class="text-break" style="max-width:320px">{{ $row['searchTerm'] ?? '—' }}</td>
                                                <td class="text-end">{{ $formatNumber($row['eventCount'] ?? null) }}</td>
                                                <td class="text-end">{{ $formatNumber($row['conversions'] ?? null) }}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="3" class="text-center">Tidak ada data atau fitur pencarian tidak aktif.</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</x-template.layout>
