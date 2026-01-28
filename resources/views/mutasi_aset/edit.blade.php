@extends('layouts.app')

@section('title', 'Edit Mutasi Aset')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Mutasi Aset</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('mutasi_aset.index') }}">Mutasi</a></div>
                <div class="breadcrumb-item active">Edit</div>
            </div>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Form Edit Mutasi Aset</h4>
                </div>
                <div class="card-body">
                    {{-- Error Messages --}}
                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Terjadi Kesalahan:</strong>
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form action="{{ route('mutasi_aset.update', $mutasiAset->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="aset_id">Aset <span class="text-danger">*</span></label>
                                    <select name="aset_id" class="form-control @error('aset_id') is-invalid @enderror"
                                        id="aset_id" required>
                                        <option value="">Pilih Aset</option>
                                        @foreach ($asets as $aset)
                                            <option value="{{ $aset->id }}"
                                                {{ old('aset_id', $mutasiAset->aset_id) == $aset->id ? 'selected' : '' }}>
                                                {{ $aset->kode_aset }} - {{ $aset->nama_aset }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('aset_id')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tanggal_mutasi">Tanggal Mutasi <span class="text-danger">*</span></label>
                                    <input type="date" name="tanggal_mutasi"
                                        class="form-control @error('tanggal_mutasi') is-invalid @enderror"
                                        id="tanggal_mutasi"
                                        value="{{ old('tanggal_mutasi', $mutasiAset->tanggal_mutasi->format('Y-m-d')) }}"
                                        required>
                                    @error('tanggal_mutasi')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lokasi_asal_id">Lokasi Asal <span class="text-danger">*</span></label>
                                    <select name="lokasi_asal_id"
                                        class="form-control @error('lokasi_asal_id') is-invalid @enderror"
                                        id="lokasi_asal_id" required>
                                        <option value="">Pilih Lokasi</option>
                                        @foreach ($lokasis as $lokasi)
                                            <option value="{{ $lokasi->id }}"
                                                {{ old('lokasi_asal_id', $mutasiAset->lokasi_asal_id) == $lokasi->id ? 'selected' : '' }}>
                                                {{ $lokasi->nama_lokasi }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('lokasi_asal_id')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="lokasi_tujuan_id">Lokasi Tujuan <span class="text-danger">*</span></label>
                                    <select name="lokasi_tujuan_id"
                                        class="form-control @error('lokasi_tujuan_id') is-invalid @enderror"
                                        id="lokasi_tujuan_id" required>
                                        <option value="">Pilih Lokasi</option>
                                        @foreach ($lokasis as $lokasi)
                                            <option value="{{ $lokasi->id }}"
                                                {{ old('lokasi_tujuan_id', $mutasiAset->lokasi_tujuan_id) == $lokasi->id ? 'selected' : '' }}>
                                                {{ $lokasi->nama_lokasi }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('lokasi_tujuan_id')
                                        <span class="invalid-feedback d-block">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="keterangan">Keterangan</label>
                            <textarea name="keterangan" class="form-control @error('keterangan') is-invalid @enderror"
                                id="keterangan" rows="4" placeholder="Opsional">{{ old('keterangan', $mutasiAset->keterangan) }}</textarea>
                            @error('keterangan')
                                <span class="invalid-feedback d-block">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <a href="{{ route('mutasi_aset.index') }}" class="btn btn-secondary">
                                <i class="fas fa-times"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update Mutasi
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
