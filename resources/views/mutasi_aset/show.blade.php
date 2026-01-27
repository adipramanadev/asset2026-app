@extends('layouts.app')

@section('title', 'Detail Mutasi Aset')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Mutasi Aset</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('mutasi_aset.index') }}">Mutasi</a></div>
                <div class="breadcrumb-item active">Detail</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Informasi Mutasi Aset #{{ $mutasiAset->id }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Kode Aset</strong></label>
                                        <p>{{ $mutasiAset->aset->kode_aset }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Nama Aset</strong></label>
                                        <p>{{ $mutasiAset->aset->nama_aset }}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Lokasi Asal</strong></label>
                                        <p>
                                            <span class="badge badge-info">{{ $mutasiAset->lokasiAsal->nama_lokasi }}</span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Lokasi Tujuan</strong></label>
                                        <p>
                                            <span class="badge badge-success">{{ $mutasiAset->lokasiTujuan->nama_lokasi }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Tanggal Mutasi</strong></label>
                                        <p>{{ $mutasiAset->tanggal_mutasi->format('d F Y') }}</p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><strong>Petugas</strong></label>
                                        <p>{{ $mutasiAset->user->name }}</p>
                                    </div>
                                </div>
                            </div>

                            @if ($mutasiAset->keterangan)
                                <div class="form-group">
                                    <label><strong>Keterangan</strong></label>
                                    <p>{{ $mutasiAset->keterangan }}</p>
                                </div>
                            @endif

                            <div class="row mt-4">
                                <div class="col-12">
                                    <div class="pb-3 border-bottom">
                                        <small class="text-muted">
                                            Dibuat: {{ $mutasiAset->created_at->format('d M Y H:i') }} |
                                            Diubah: {{ $mutasiAset->updated_at->format('d M Y H:i') }}
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <a href="{{ route('mutasi_aset.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                                <a href="{{ route('mutasi_aset.edit', $mutasiAset->id) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('mutasi_aset.destroy', $mutasiAset->id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
