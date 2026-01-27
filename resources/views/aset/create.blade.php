@extends('layouts.app')

@section('title', 'Add Aset')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Tambah Aset</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Form Tambah Aset Baru</h4>
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

                    <form action="{{ route('aset.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="kode_aset">Kode Aset</label>
                            <input type="text" name="kode_aset" class="form-control" id="kode_aset" value="{{ old('kode_aset') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="nama_aset">Nama Aset</label>
                            <input type="text" name="nama_aset" class="form-control" id="nama_aset" value="{{ old('nama_aset') }}" required>
                        </div>
                        <div class="form-group">
                            <label for="kategori_id">Kategori</label>
                            <select name="kategori_id" class="form-control" id="kategori_id">
                                <option value="">Pilih kategori</option>
                                @foreach($kategori as $k)
                                    <option value="{{ $k->id }}" {{ old('kategori_id') == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_kategori }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="lokasi_id">Lokasi</label>
                            <select name="lokasi_id" class="form-control" id="lokasi_id">
                                <option value="">Pilih lokasi</option>
                                @foreach($lokasi as $l)
                                    <option value="{{ $l->id }}" {{ old('lokasi_id') == $l->id ? 'selected' : '' }}>
                                        {{ $l->nama_lokasi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="kondisi">Kondisi</label>
                            <select name="kondisi" class="form-control" id="kondisi">
                                <option value="">Pilih kondisi</option>
                                <option value="baik" {{ old('kondisi') == 'baik' ? 'selected' : '' }}>Baik</option>
                                <option value="rusak" {{ old('kondisi') == 'rusak' ? 'selected' : '' }}>Rusak</option>
                                <option value="maintenance" {{ old('kondisi') == 'maintenance' ? 'selected' : '' }}>Maintenance</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" name="jumlah" class="form-control" id="jumlah" value="{{ old('jumlah', 1) }}" min="1" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Aset</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
