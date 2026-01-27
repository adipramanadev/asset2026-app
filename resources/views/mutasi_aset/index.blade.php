@extends('layouts.app')

@section('title', 'Daftar Mutasi Aset')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Mutasi Aset</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">Mutasi</div>
                <div class="breadcrumb-item active">Daftar</div>
            </div>
        </div>

        <div class="section-body">
            {{-- Success Message --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Daftar Mutasi Aset</h4>
                    <div class="card-header-action">
                        <a href="{{ route('mutasi_aset.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Mutasi
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr class="bg-light">
                                    <th style="width: 5%;">ID</th>
                                    <th style="width: 15%;">Aset</th>
                                    <th style="width: 12%;">Asal</th>
                                    <th style="width: 12%;">Tujuan</th>
                                    <th style="width: 10%;">Tanggal</th>
                                    <th style="width: 10%;">Petugas</th>
                                    <th style="width: 20%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($mutasiAsets as $mutasi)
                                    <tr>
                                        <td><strong>{{ $mutasi->id }}</strong></td>
                                        <td>
                                            <small><strong>{{ $mutasi->aset->kode_aset }}</strong></small><br>
                                            {{ $mutasi->aset->nama_aset }}
                                        </td>
                                        <td>
                                            <span class="badge badge-info">{{ $mutasi->lokasiAsal->nama_lokasi ?? '-' }}</span>
                                        </td>
                                        <td>
                                            <span class="badge badge-success">{{ $mutasi->lokasiTujuan->nama_lokasi ?? '-' }}</span>
                                        </td>
                                        <td>{{ $mutasi->tanggal_mutasi->format('d M Y') }}</td>
                                        <td>{{ $mutasi->user->name ?? '-' }}</td>
                                        <td>
                                            <a href="{{ route('mutasi_aset.show', $mutasi->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('mutasi_aset.edit', $mutasi->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('mutasi_aset.destroy', $mutasi->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus?')">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">
                                            <i class="fas fa-box"></i> Belum ada mutasi aset
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
