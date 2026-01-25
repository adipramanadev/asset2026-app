<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //index category
        $categories = Category::paginate(10);
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //redirect to create category form
        return view('category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validate request
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);
        //create category
        Category::create([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect()->route('category.index')->with('success', 'Kategori berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //halaman show category
        $category = Category::findOrFail($category->id);
        return view('category.show', compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        //halaman edit category
        $category = Category::findOrFail($category->id);
        return view('category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        //validate request
        $request->validate([
            'nama_kategori' => 'required|string|max:100',
        ]);
        //update category
        $category->update([
            'nama_kategori' => $request->nama_kategori,
        ]);
        return redirect()->route('category.index')->with('success', 'Kategori berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //delete category
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Kategori berhasil dihapus.');
    }
}
