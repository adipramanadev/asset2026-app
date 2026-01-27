@extends('layouts.app')

@section('title', 'Lokasi List')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Daftar Lokasi</h1>
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
                    <a href="{{ route('location.create') }}" class="btn btn-primary">Tambah Lokasi</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Lokasi</th>
                                <th>Alamat</th>
                                <th>Deskripsi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($locations as $location)
                                <tr>
                                    <td>{{ $location->id }}</td>
                                    <td>{{ $location->nama_lokasi }}</td>
                                    <td>{{ $location->alamat ?? '-' }}</td>
                                    <td>{{ Str::limit($location->deskripsi, 50) ?? '-' }}</td>
                                    <td>
                                        <a href="{{ route('location.show', $location->id) }}"
                                            class="btn btn-info btn-sm">Lihat</a>
                                        <a href="{{ route('location.edit', $location->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('location.destroy', $location->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"
                                                onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        {{ $locations->links() }}
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
