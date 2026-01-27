<?php

namespace App\Http\Controllers;

use App\Models\MutasiAset;
use App\Models\Aset;
use App\Models\Location;
use Illuminate\Http\Request;

class MutasiAsetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mutasiAsets = MutasiAset::with(['aset', 'lokasiAsal', 'lokasiTujuan', 'user'])
            ->latest()
            ->get();
        return view('mutasi_aset.index', compact('mutasiAsets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $asets = Aset::all();
        $lokasis = Location::all();
        return view('mutasi_aset.create', compact('asets', 'lokasis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'aset_id' => 'required|exists:aset,id',
            'lokasi_asal_id' => 'required|exists:locations,id',
            'lokasi_tujuan_id' => 'required|exists:locations,id|different:lokasi_asal_id',
            'tanggal_mutasi' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $validated['user_id'] = auth()->id();

        MutasiAset::create($validated);

        return redirect()->route('mutasi_aset.index')->with('success', 'Mutasi aset berhasil dicatat');
    }

    /**
     * Display the specified resource.
     */
    public function show(MutasiAset $mutasiAset)
    {
        return view('mutasi_aset.show', compact('mutasiAset'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MutasiAset $mutasiAset)
    {
        $asets = Aset::all();
        $lokasis = Location::all();
        return view('mutasi_aset.edit', compact('mutasiAset', 'asets', 'lokasis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MutasiAset $mutasiAset)
    {
        $validated = $request->validate([
            'aset_id' => 'required|exists:aset,id',
            'lokasi_asal_id' => 'required|exists:locations,id',
            'lokasi_tujuan_id' => 'required|exists:locations,id|different:lokasi_asal_id',
            'tanggal_mutasi' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $mutasiAset->update($validated);

        return redirect()->route('mutasi_aset.index')->with('success', 'Mutasi aset berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MutasiAset $mutasiAset)
    {
        $mutasiAset->delete();
        return redirect()->route('mutasi_aset.index')->with('success', 'Mutasi aset berhasil dihapus');
    }
}
