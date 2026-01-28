<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            ['nama_lokasi' => 'Gudang Utama'],
            ['nama_lokasi' => 'Perpustakaan'],
            ['nama_lokasi' => 'Ruang Rapat'],
            ['nama_lokasi' => 'Kantor Direktur'],
            ['nama_lokasi' => 'Ruang IT'],
            ['nama_lokasi' => 'Lobby'],
            ['nama_lokasi' => 'Dapur'],
            ['nama_lokasi' => 'Ruang Tunggu'],
        ];

        foreach ($locations as $location) {
            \App\Models\Location::create($location);
        }
    }
}
