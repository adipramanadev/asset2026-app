<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;
use App\Models\Category;
use App\Models\Location;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        // Admin gets full dashboard
        if ($user->role === 'admin') {
            // Get statistics
            $totalAset = Aset::count();
            $totalKategori = Category::count();
            $totalLokasi = Location::count();

            // Asset condition statistics
            $asetBaik = Aset::where('kondisi', 'baik')->count();
            $asetRusak = Aset::where('kondisi', 'rusak')->count();
            $asetMaintenance = Aset::where('kondisi', 'maintenance')->count();

            // Total quantity of assets
            $totalJumlah = Aset::sum('jumlah') ?? 0;

            // Recent assets (latest 5)
            $recentAset = Aset::with(['kategori', 'lokasi'])
                ->latest()
                ->limit(5)
                ->get();

            // Asset by category
            $asetByKategori = Aset::join('categories', 'aset.kategori_id', '=', 'categories.id')
                ->select('categories.nama_kategori', 'categories.id')
                ->selectRaw('COUNT(*) as total')
                ->groupBy('categories.id', 'categories.nama_kategori')
                ->limit(5)
                ->get();

            // Asset by condition for chart
            $kondisiData = [
                'baik' => $asetBaik,
                'rusak' => $asetRusak,
                'maintenance' => $asetMaintenance
            ];

            return view('home', compact(
                'totalAset',
                'totalKategori',
                'totalLokasi',
                'totalJumlah',
                'asetBaik',
                'asetRusak',
                'asetMaintenance',
                'recentAset',
                'asetByKategori',
                'kondisiData'
            ));
        }

        // Petugas gets limited dashboard
        if ($user->role === 'petugas') {
            $totalAset = Aset::count();
            $asetBaik = Aset::where('kondisi', 'baik')->count();
            $asetRusak = Aset::where('kondisi', 'rusak')->count();
            $asetMaintenance = Aset::where('kondisi', 'maintenance')->count();
            $totalJumlah = Aset::sum('jumlah') ?? 0;

            // Recent assets (latest 10)
            $recentAset = Aset::with(['kategori', 'lokasi'])
                ->latest()
                ->limit(10)
                ->get();

            return view('home', compact(
                'totalAset',
                'totalJumlah',
                'asetBaik',
                'asetRusak',
                'asetMaintenance',
                'recentAset'
            ));
        }

        return redirect('/');
    }
}
