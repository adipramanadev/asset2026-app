<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //tampilkan seeder category 10 data category 
        $categories = [
            ['nama_kategori' => 'Elektronik'],
            ['nama_kategori' => 'Furniture'],
            ['nama_kategori' => 'Kendaraan'],
            ['nama_kategori' => 'Alat Tulis Kantor'],
            ['nama_kategori' => 'Peralatan Dapur'],
            ['nama_kategori' => 'Peralatan Kebersihan'],
            ['nama_kategori' => 'Peralatan Keamanan'],
            ['nama_kategori' => 'Peralatan Komputer'],
            ['nama_kategori' => 'Peralatan Jaringan'],
            ['nama_kategori' => 'Peralatan Audio Visual'],
        ];
        foreach ($categories as $category) {
            \App\Models\Category::create($category);
        }
    }
}
