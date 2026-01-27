@extends('layouts.app')

@section('title', 'Daftar User')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Manajemen User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item">User</div>
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
                    <h4>Daftar Semua User</h4>
                    <div class="card-header-action">
                        <a href="{{ route('user.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah User
                        </a>
                    </div>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr class="bg-light">
                                    <th style="width: 5%;">ID</th>
                                    <th style="width: 25%;">Nama</th>
                                    <th style="width: 30%;">Email</th>
                                    <th style="width: 15%;">Role</th>
                                    <th style="width: 25%;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td>
                                            <strong>{{ $user->id }}</strong>
                                        </td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->role === 'admin')
                                                <span class="badge badge-danger">Admin</span>
                                            @else
                                                <span class="badge badge-primary">Petugas</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('user.show', $user->id) }}" class="btn btn-info btn-sm">
                                                <i class="fas fa-eye"></i> Detail
                                            </a>
                                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('user.destroy', $user->id) }}" method="POST"
                                                style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                    onclick="return confirm('Yakin ingin menghapus user ini?')">
                                                    <i class="fas fa-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted py-4">
                                            <i class="fas fa-inbox"></i> Belum ada user
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
