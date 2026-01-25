@extends('layouts.app')

@section('title')
    Category Detail - {{ $category->nama_kategori }}
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Category Detail</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Detail of Category: {{ $category->nama_kategori }}</h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th>ID</th>
                            <td>{{ $category->id }}</td>
                        </tr>
                        <tr>
                            <th>Nama Kategori</th>
                            <td>{{ $category->nama_kategori }}</td>
                        </tr>
                    </table>
                    <a href="{{ route('category.index') }}" class="btn btn-secondary">Back to Category List</a>
                </div>
            </div>
        </div>
    </section>
@endsection
