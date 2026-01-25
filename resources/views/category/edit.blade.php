@extends('layouts.app')

@section('title')
    Category Edit - {{ $category->nama_kategori }}
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Edit Category</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Category Form</h4>
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


                    <form action="{{ route('category.update', $category->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="nama_kategori">Nama Kategori</label>
                            <input type="text" name="nama_kategori" class="form-control" id="nama_kategori"
                                value="{{ $category->nama_kategori }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
