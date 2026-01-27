@extends('layouts.app')

@section('title', 'Tambah Lokasi')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Lokasi</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Form Lokasi Baru</h4>
                </div>
                <div class="card-body">
                    {{-- session error  --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {{-- session success --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('location.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama_lokasi">Nama Lokasi</label>
                            <input type="text" name="nama_lokasi" class="form-control" id="nama_lokasi" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <input type="text" name="alamat" class="form-control" id="alamat">
                        </div>
                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" id="deskripsi" rows="4"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Tambah Lokasi</button>
                        <a href="{{ route('location.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
