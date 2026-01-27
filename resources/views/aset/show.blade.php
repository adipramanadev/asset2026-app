@extends('layouts.app')

@section('title')
    Aset Detail - {{ $aset->nama_aset }}
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Aset</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Detail Aset: {{ $aset->nama_aset }}</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <td>{{ $aset->id }}</td>
                        </tr>
                        <tr>
                            <th>Kode Aset</th>
                            <td>{{ $aset->kode_aset }}</td>
                        </tr>
                        <tr>
                            <th>Nama Aset</th>
                            <td>{{ $aset->nama_aset }}</td>
                        </tr>
                        <tr>
                            <th>Kategori</th>
                            <td>{{ $aset->kategori->nama_kategori ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Lokasi</th>
                            <td>{{ $aset->lokasi->nama_lokasi ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Kondisi</th>
                            <td>
                                <span class="badge
                                    @if($aset->kondisi === 'baik') badge-success
                                    @elseif($aset->kondisi === 'rusak') badge-danger
                                    @else badge-warning
                                    @endif">
                                    {{ ucfirst($aset->kondisi) }}
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td>{{ $aset->jumlah }} unit</td>
                        </tr>
                        <tr>
                            <th>Dibuat</th>
                            <td>{{ $aset->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Terakhir Diupdate</th>
                            <td>{{ $aset->updated_at->format('d M Y H:i') }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('aset.index') }}" class="btn btn-secondary">Kembali ke Daftar</a>
                    <a href="{{ route('aset.edit', $aset->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('aset.destroy', $aset->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
