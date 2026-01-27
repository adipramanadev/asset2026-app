<?php

namespace App\Http\Controllers;

use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $locations = Location::paginate(10);
        return view('lokasi.index', compact('locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('lokasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_lokasi' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string|max:255',
        ]);

        Location::create([
            'nama_lokasi' => $request->nama_lokasi,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('location.index')->with('success', 'Lokasi berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        return view('lokasi.show', compact('location'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        return view('lokasi.edit', compact('location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Location $location)
    {
        $request->validate([
            'nama_lokasi' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'alamat' => 'nullable|string|max:255',
        ]);

        $location->update([
            'nama_lokasi' => $request->nama_lokasi,
            'deskripsi' => $request->deskripsi,
            'alamat' => $request->alamat,
        ]);

        return redirect()->route('location.index')->with('success', 'Lokasi berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        $location->delete();
        return redirect()->route('location.index')->with('success', 'Lokasi berhasil dihapus.');
    }
}
