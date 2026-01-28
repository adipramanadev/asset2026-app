@extends('layouts.app')

@section('content')
    <div class="section">
        <div class="section-header d-flex justify-content-between align-items-center mb-4">
            <h1 class="section-title mb-0">Laporan Aset</h1>
            <div>
                <a href="{{ route('laporan.exportExcel', request()->all()) }}" class="btn btn-success mr-2"><i
                        class="fas fa-file-excel"></i> Export Excel</a>
                <a href="{{ route('laporan.exportPdf', request()->all()) }}" class="btn btn-danger"><i
                        class="fas fa-file-pdf"></i> Export PDF</a>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <form method="GET" action="{{ route('laporan.index') }}" class="mb-4">
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label>Periode</label>
                            <input type="text" name="periode" class="form-control" value="{{ request('periode') }}"
                                placeholder="2026-01-01 - 2026-01-31">
                        </div>
                        <div class="form-group col-md-4">
                            <label>Kategori</label>
                            <select name="kategori" class="form-control">
                                <option value="">Semua Kategori</option>
                                @foreach ($kategoris as $kat)
                                    <option value="{{ $kat->id }}"
                                        {{ request('kategori') == $kat->id ? 'selected' : '' }}>{{ $kat->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-md-4 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary w-100"><i class="fas fa-search"></i>
                                Tampilkan</button>
                        </div>
                    </div>
                </form>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead class="thead-light">
                            <tr>
                                <th>No</th>
                                <th>Nama Aset</th>
                                <th>Kategori</th>
                                <th>Tanggal Input</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($assets as $i => $aset)
                                <tr>
                                    <td>{{ $i + 1 }}</td>
                                    <td>{{ $aset->nama_aset }}</td>
                                    <td>{{ $aset->kategori->nama_kategori ?? '-' }}</td>
                                    <td>{{ $aset->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak ada data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
