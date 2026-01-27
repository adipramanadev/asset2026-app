<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MutasiAset extends Model
{
    protected $table = 'mutasi_asets';

    protected $fillable = [
        'aset_id',
        'lokasi_asal_id',
        'lokasi_tujuan_id',
        'tanggal_mutasi',
        'keterangan',
        'user_id',
    ];

    protected $casts = [
        'tanggal_mutasi' => 'date',
    ];

    // Relationships
    public function aset()
    {
        return $this->belongsTo(Aset::class, 'aset_id');
    }

    public function lokasiAsal()
    {
        return $this->belongsTo(Location::class, 'lokasi_asal_id');
    }

    public function lokasiTujuan()
    {
        return $this->belongsTo(Location::class, 'lokasi_tujuan_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
