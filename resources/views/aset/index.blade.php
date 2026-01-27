@extends('layouts.app')

@section('title', 'Aset List')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Manajemen Aset</h1>
        </div>

        <div class="section-body">
            {{-- session success --}}
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('aset.create') }}" class="btn btn-primary">Tambah Aset</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Kode</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Lokasi</th>
                                <th>Kondisi</th>
                                <th>Jumlah</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($aset as $item)
                                <tr>
                                    <td>{{ $item->kode_aset }}</td>
                                    <td>{{ $item->nama_aset }}</td>
                                    <td>{{ $item->kategori->name ?? ($item->kategori->nama_kategori ?? '-') }}</td>
                                    <td>{{ $item->lokasi->name ?? ($item->lokasi->nama_lokasi ?? '-') }}</td>
                                    <td>
                                        <span
                                            class="badge
                                            @if ($item->kondisi === 'baik') badge-success
                                            @elseif($item->kondisi === 'rusak') badge-danger
                                            @else badge-warning @endif">
                                            {{ ucfirst($item->kondisi) }}
                                        </span>
                                    </td>
                                    <td>{{ $item->jumlah }}</td>
                                    <td>
                                        <a href="{{ route('aset.show', $item->id) }}" class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('aset.edit', $item->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('aset.destroy', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Are you sure?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        {{ $aset->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <style>
        /* Pagination Styling */
        .pagination {
            margin: 0;
        }

        .pagination .page-link {
            color: #6777ef;
            border: 1px solid #dee2e6;
            padding: 0.5rem 0.75rem;
        }

        .pagination .page-link:hover {
            color: #394eea;
            background-color: #e9ecef;
            border-color: #dee2e6;
        }

        .pagination .page-item.active .page-link {
            background-color: #6777ef;
            border-color: #6777ef;
            color: #fff;
        }

        .pagination .page-item.disabled .page-link {
            color: #6c757d;
            pointer-events: none;
            background-color: #fff;
            border-color: #dee2e6;
        }
    </style>
@endsection
