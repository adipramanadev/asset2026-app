<?php

namespace App\Exports;

use App\Models\Aset;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Http\Request;

class LaporanExport implements FromView
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function view(): View
    {
        $kategori = $this->request->input('kategori');
        $periode = $this->request->input('periode');
        $query = Aset::query();

        if ($kategori) {
            $query->where('kategori_id', $kategori);
        }
        if ($periode) {
            [$start, $end] = explode(' - ', $periode);
            $query->whereBetween('created_at', [$start, $end]);
        }

        $assets = $query->with('kategori')->get();

        return view('laporan.excel', compact('assets'));
    }
}
