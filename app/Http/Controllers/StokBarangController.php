<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class StokBarangController extends Controller
{
    public function index()
        {
            $barangs = Barang::all();
            return view('stok_barang', compact('barangs'));
        }
}
