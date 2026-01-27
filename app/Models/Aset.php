<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aset extends Model
{
    use HasFactory;

    protected $table = 'aset';

    protected $fillable = [
        'kode_aset',
        'nama_aset',
        'kategori_id',
        'lokasi_id',
        'kondisi',
        'jumlah',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Get the kategori that owns the aset
     */
    public function kategori()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    /**
     * Get the lokasi that owns the aset
     */
    public function lokasi()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }

    /**
     * Scope untuk filter berdasarkan kondisi
     */
    public function scopeByKondisi($query, $kondisi)
    {
        return $query->where('kondisi', $kondisi);
    }

    /**
     * Scope untuk filter berdasarkan kategori
     */
    public function scopeByKategori($query, $kategoriId)
    {
        return $query->where('category_id', $kategoriId);
    }

    /**
     * Scope untuk filter berdasarkan lokasi
     */
    public function scopeByLokasi($query, $lokasiId)
    {
        return $query->where('location_id', $lokasiId);
    }
}
