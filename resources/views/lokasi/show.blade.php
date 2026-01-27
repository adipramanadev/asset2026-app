@extends('layouts.app')

@section('title', 'Detail Lokasi')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Lokasi</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>{{ $location->nama_lokasi }}</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_lokasi"><strong>Nama Lokasi</strong></label>
                        <p>{{ $location->nama_lokasi }}</p>
                    </div>
                    <div class="form-group">
                        <label for="alamat"><strong>Alamat</strong></label>
                        <p>{{ $location->alamat ?? '-' }}</p>
                    </div>
                    <div class="form-group">
                        <label for="deskripsi"><strong>Deskripsi</strong></label>
                        <p>{{ $location->deskripsi ?? '-' }}</p>
                    </div>
                    <div class="form-group">
                        <label><strong>Dibuat Tanggal</strong></label>
                        <p>{{ $location->created_at->format('d-m-Y H:i') }}</p>
                    </div>
                    <div class="form-group">
                        <label><strong>Diupdate Tanggal</strong></label>
                        <p>{{ $location->updated_at->format('d-m-Y H:i') }}</p>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('location.edit', $location->id) }}" class="btn btn-warning">Edit</a>
                    <a href="{{ route('location.index') }}" class="btn btn-secondary">Kembali</a>
                    <form action="{{ route('location.destroy', $location->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
