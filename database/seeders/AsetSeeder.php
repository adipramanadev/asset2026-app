<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AsetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $asets = [
            [
                'kode_aset' => 'AST-2026-001',
                'nama_aset' => 'Laptop HP ProBook',
                'kategori_id' => 8,
                'lokasi_id' => 5,
                'kondisi' => 'baik',
                'jumlah' => 3,
            ],
            [
                'kode_aset' => 'AST-2026-002',
                'nama_aset' => 'Meja Kantor',
                'kategori_id' => 2,
                'lokasi_id' => 1,
                'kondisi' => 'baik',
                'jumlah' => 10,
            ],
            [
                'kode_aset' => 'AST-2026-003',
                'nama_aset' => 'Kursi Task',
                'kategori_id' => 2,
                'lokasi_id' => 3,
                'kondisi' => 'baik',
                'jumlah' => 15,
            ],
            [
                'kode_aset' => 'AST-2026-004',
                'nama_aset' => 'Printer Canon LBP6018L',
                'kategori_id' => 1,
                'lokasi_id' => 5,
                'kondisi' => 'baik',
                'jumlah' => 2,
            ],
            [
                'kode_aset' => 'AST-2026-005',
                'nama_aset' => 'Monitor LG 24 inch',
                'kategori_id' => 1,
                'lokasi_id' => 5,
                'kondisi' => 'baik',
                'jumlah' => 5,
            ],
            [
                'kode_aset' => 'AST-2026-006',
                'nama_aset' => 'UPS 3000VA',
                'kategori_id' => 1,
                'lokasi_id' => 5,
                'kondisi' => 'baik',
                'jumlah' => 1,
            ],
            [
                'kode_aset' => 'AST-2026-007',
                'nama_aset' => 'Lemari File',
                'kategori_id' => 2,
                'lokasi_id' => 1,
                'kondisi' => 'baik',
                'jumlah' => 4,
            ],
            [
                'kode_aset' => 'AST-2026-008',
                'nama_aset' => 'Proyektor Epson',
                'kategori_id' => 10,
                'lokasi_id' => 3,
                'kondisi' => 'baik',
                'jumlah' => 1,
            ],
            [
                'kode_aset' => 'AST-2026-009',
                'nama_aset' => 'WiFi Router Cisco',
                'kategori_id' => 9,
                'lokasi_id' => 5,
                'kondisi' => 'baik',
                'jumlah' => 3,
            ],
            [
                'kode_aset' => 'AST-2026-010',
                'nama_aset' => 'Server Dell PowerEdge',
                'kategori_id' => 8,
                'lokasi_id' => 5,
                'kondisi' => 'baik',
                'jumlah' => 1,
            ],
        ];

        foreach ($asets as $aset) {
            \App\Models\Aset::create($aset);
        }
    }
}
