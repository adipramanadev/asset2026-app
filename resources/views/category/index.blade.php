@extends('layouts.app')

@section('title', 'Category List')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Category List</h1>
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
                    <a href="{{ route('category.create') }}" class="btn btn-primary">Add Category</a>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Kategori</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{ $category->id }}</td>
                                    <td>{{ $category->nama_kategori }}</td>
                                    <td>
                                        <a href="{{ route('category.show', $category->id) }}"
                                            class="btn btn-info btn-sm">View</a>
                                        <a href="{{ route('category.edit', $category->id) }}"
                                            class="btn btn-warning btn-sm">Edit</a>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="POST"
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
                @if($categories->hasPages())
                <div class="card-footer">
                    <div class="d-flex justify-content-center">
                        {{ $categories->links() }}
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>
@endsection
