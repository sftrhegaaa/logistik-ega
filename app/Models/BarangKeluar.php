<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    public function barang()
{
    return $this->belongsTo(Barang::class);
}

protected $fillable = [
    'barang_id',
    'quantity',
    'destination',
    'tanggal_keluar',
];
}
