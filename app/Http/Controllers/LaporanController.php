<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Aset;
use App\Models\Category;
use App\Exports\LaporanExport;
use Maatwebsite\Excel\Facades\Excel;
use PDF;

class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $kategori = $request->input('kategori');
        $periode = $request->input('periode');
        $query = Aset::query();

        if ($kategori) {
            $query->where('kategori_id', $kategori);
        }
        if ($periode) {
            [$start, $end] = explode(' - ', $periode);
            $query->whereBetween('created_at', [$start, $end]);
        }

        $assets = $query->with('kategori')->get();
        $kategoris = Category::all();

        return view('laporan.index', compact('assets', 'kategoris', 'kategori', 'periode'));
    }

    public function exportExcel(Request $request)
    {
        return Excel::download(new LaporanExport($request), 'laporan.xlsx');
    }

    public function exportPdf(Request $request)
    {
        $kategori = $request->input('kategori');
        $periode = $request->input('periode');
        $query = Aset::query();

        if ($kategori) {
            $query->where('kategori_id', $kategori);
        }
        if ($periode) {
            [$start, $end] = explode(' - ', $periode);
            $query->whereBetween('created_at', [$start, $end]);
        }

        $assets = $query->with('kategori')->get();

        $pdf = PDF::loadView('laporan.pdf', compact('assets', 'kategori', 'periode'));
        return $pdf->download('laporan.pdf');
    }
}
