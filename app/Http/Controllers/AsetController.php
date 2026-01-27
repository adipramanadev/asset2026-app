<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use App\Models\Category;
use App\Models\Location;
use Illuminate\Http\Request;

class AsetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Aset::query();

        if ($request->filled('kondisi')) {
            $query->byKondisi($request->kondisi);
        }

        if ($request->filled('kategori_id')) {
            $query->byKategori($request->kategori_id);
        }

        if ($request->filled('lokasi_id')) {
            $query->byLokasi($request->lokasi_id);
        }

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where('kode_aset', 'like', "%{$search}%")
                  ->orWhere('nama_aset', 'like', "%{$search}%");
        }

        $aset = $query->with(['kategori', 'lokasi'])->paginate(15);
        $kategori = Category::all();
        $lokasi = Location::all();

        return view('aset.index', compact('aset', 'kategori', 'lokasi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategori = Category::all();
        $lokasi = Location::all();

        return view('aset.create', compact('kategori', 'lokasi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_aset' => 'required|string|unique:aset|max:50',
            'nama_aset' => 'required|string|max:150',
            'kategori_id' => 'required|exists:categories,id',
            'lokasi_id' => 'required|exists:locations,id',
            'kondisi' => 'required|in:baik,rusak,maintenance',
            'jumlah' => 'required|integer|min:1',
        ]);

        Aset::create($validated);

        return redirect()->route('aset.index')
                        ->with('success', 'Aset berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Aset $aset)
    {
        $aset->load(['kategori', 'lokasi']);

        return view('aset.show', compact('aset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Aset $aset)
    {
        $kategori = Category::all();
        $lokasi = Location::all();

        return view('aset.edit', compact('aset', 'kategori', 'lokasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Aset $aset)
    {
        $validated = $request->validate([
            'kode_aset' => 'required|string|unique:aset,kode_aset,' . $aset->id . '|max:50',
            'nama_aset' => 'required|string|max:150',
            'kategori_id' => 'required|exists:categories,id',
            'lokasi_id' => 'required|exists:locations,id',
            'kondisi' => 'required|in:baik,rusak,maintenance',
            'jumlah' => 'required|integer|min:1',
        ]);

        $aset->update($validated);

        return redirect()->route('aset.index')
                        ->with('success', 'Aset berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Aset $aset)
    {
        $aset->delete();

        return redirect()->route('aset.index')
                        ->with('success', 'Aset berhasil dihapus');
    }
}
