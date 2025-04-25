<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class BarangMasuk extends Model
{
    public function barang()
    {
        return $this->belongsTo(Barang::class);
    }

    use HasFactory;

    protected $fillable = [
        'barang_id',
        'quantity',
        'origin',
        'tanggal_masuk',
    ];
}



