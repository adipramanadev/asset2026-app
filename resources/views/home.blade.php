@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Home</div>
            </div>
        </div>

        <div class="section-body">
            {{-- Welcome Alert --}}
            @if (session('status'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Selamat datang!</strong> {{ session('status') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            {{-- Statistics Cards Row 1 --}}
            <div class="row">
                {{-- Total Assets Card --}}
                <div class="col-md-3 col-sm-6">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-box"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Aset</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalAset }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total Categories Card --}}
                <div class="col-md-3 col-sm-6">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-tags"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Kategori</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalKategori }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total Locations Card --}}
                <div class="col-md-3 col-sm-6">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-map-marker-alt"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Lokasi</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalLokasi }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Total Quantity Card --}}
                <div class="col-md-3 col-sm-6">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="fas fa-cube"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Unit</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalJumlah }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Statistics Cards Row 2 --}}
            <div class="row">
                {{-- Good Condition Card --}}
                <div class="col-md-3 col-sm-6">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Baik</h4>
                            </div>
                            <div class="card-body">
                                {{ $asetBaik }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Damaged Condition Card --}}
                <div class="col-md-3 col-sm-6">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-times-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Rusak</h4>
                            </div>
                            <div class="card-body">
                                {{ $asetRusak }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Maintenance Condition Card --}}
                <div class="col-md-3 col-sm-6">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-tools"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Maintenance</h4>
                            </div>
                            <div class="card-body">
                                {{ $asetMaintenance }}
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Percentage Card --}}
                <div class="col-md-3 col-sm-6">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-info">
                            <i class="fas fa-percentage"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Aset Baik</h4>
                            </div>
                            <div class="card-body">
                                @if ($totalAset > 0)
                                    {{ round(($asetBaik / $totalAset) * 100, 1) }}%
                                @else
                                    0%
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Charts Row --}}
            <div class="row">
                {{-- Condition Chart --}}
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Distribusi Kondisi Aset</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="kondisiChart" height="100"></canvas>
                        </div>
                    </div>
                </div>

                {{-- Top Categories Chart --}}
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Aset per Kategori (Top 5)</h4>
                        </div>
                        <div class="card-body">
                            <canvas id="kategoriChart" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Recent Assets Table --}}
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Aset Terbaru</h4>
                            <div class="card-header-action">
                                <a href="{{ route('aset.index') }}" class="btn btn-primary btn-sm">Lihat Semua</a>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <tr class="bg-light">
                                            <th>Kode Aset</th>
                                            <th>Nama Aset</th>
                                            <th>Kategori</th>
                                            <th>Lokasi</th>
                                            <th>Kondisi</th>
                                            <th>Tanggal Dibuat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($recentAset as $aset)
                                            <tr>
                                                <td>
                                                    <strong>{{ $aset->kode_aset }}</strong>
                                                </td>
                                                <td>{{ $aset->nama_aset }}</td>
                                                <td>
                                                    <span class="badge badge-primary">
                                                        {{ $aset->kategori->nama_kategori ?? '-' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <span class="badge badge-info">
                                                        {{ $aset->lokasi->nama_lokasi ?? '-' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    @if ($aset->kondisi === 'baik')
                                                        <span class="badge badge-success">Baik</span>
                                                    @elseif($aset->kondisi === 'rusak')
                                                        <span class="badge badge-danger">Rusak</span>
                                                    @else
                                                        <span class="badge badge-warning">Maintenance</span>
                                                    @endif
                                                </td>
                                                <td>{{ $aset->created_at->format('d M Y') }}</td>
                                                <td>
                                                    <a href="{{ route('aset.show', $aset->id) }}"
                                                        class="btn btn-info btn-sm">Detail</a>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-muted py-4">
                                                    <i class="fas fa-inbox"></i> Belum ada data aset
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Chart.js Library --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>

    <script>
        // Condition Distribution Chart
        const kondisiCtx = document.getElementById('kondisiChart').getContext('2d');
        new Chart(kondisiCtx, {
            type: 'doughnut',
            data: {
                labels: ['Baik', 'Rusak', 'Maintenance'],
                datasets: [{
                    data: [{{ $kondisiData['baik'] }}, {{ $kondisiData['rusak'] }},
                        {{ $kondisiData['maintenance'] }}
                    ],
                    backgroundColor: ['#28a745', '#dc3545', '#ffc107'],
                    borderColor: ['#20c997', '#c82333', '#ff9800'],
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 15,
                            font: {
                                size: 12
                            }
                        }
                    }
                }
            }
        });

        // Category Distribution Chart
        const kategoriCtx = document.getElementById('kategoriChart').getContext('2d');
        new Chart(kategoriCtx, {
            type: 'bar',
            data: {
                labels: [
                    @foreach ($asetByKategori as $kategori)
                        '{{ $kategori->nama_kategori }}',
                    @endforeach
                ],
                datasets: [{
                    label: 'Jumlah Aset',
                    data: [
                        @foreach ($asetByKategori as $kategori)
                            {{ $kategori->total }},
                        @endforeach
                    ],
                    backgroundColor: '#6777ef',
                    borderColor: '#4c51bf',
                    borderWidth: 1,
                    borderRadius: 5
                }]
            },
            options: {
                indexAxis: 'y',
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1
                        }
                    }
                }
            }
        });
    </script>

    <style>
        .card-statistic-1 {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .card-statistic-1:hover {
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            transform: translateY(-5px);
        }

        .card-statistic-1 .card-icon {
            position: absolute;
            width: 64px;
            height: 64px;
            left: 20px;
            top: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            color: white;
        }

        .card-statistic-1 .card-wrap {
            padding: 20px;
            padding-left: 100px;
            text-align: left;
            line-height: 1;
        }

        .card-statistic-1 .card-header {
            margin-bottom: 8px;
            font-size: 13px;
            font-weight: 500;
            color: #666;
        }

        .card-statistic-1 .card-body {
            font-size: 28px;
            font-weight: 700;
            color: #333;
        }

        .bg-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .bg-success {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .bg-danger {
            background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
        }

        .bg-warning {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .bg-info {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        }
    </style>
@endsection
