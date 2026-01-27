@extends('layouts.app')

@section('title', 'Detail User')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item"><a href="{{ route('user.index') }}">User</a></div>
                <div class="breadcrumb-item active">Detail</div>
            </div>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4>Informasi User</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>ID</label>
                                <input type="text" class="form-control" value="{{ $user->id }}" disabled>
                            </div>

                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" class="form-control" value="{{ $user->name }}" disabled>
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" value="{{ $user->email }}" disabled>
                            </div>

                            <div class="form-group">
                                <label>Role</label>
                                <div>
                                    @if ($user->role === 'admin')
                                        <span class="badge badge-danger" style="font-size: 16px;">Admin</span>
                                    @else
                                        <span class="badge badge-primary" style="font-size: 16px;">Petugas</span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Terdaftar Sejak</label>
                                <input type="text" class="form-control" value="{{ $user->created_at->format('d M Y H:i') }}" disabled>
                            </div>

                            <div class="form-group">
                                <label>Terakhir Diubah</label>
                                <input type="text" class="form-control" value="{{ $user->updated_at->format('d M Y H:i') }}" disabled>
                            </div>

                            <div class="form-group">
                                <a href="{{ route('user.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left"></i> Kembali
                                </a>
                                <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus user ini?')">
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
