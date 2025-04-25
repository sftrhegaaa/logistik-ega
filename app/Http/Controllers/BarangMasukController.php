<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangMasuk;

class BarangMasukController extends Controller
{
    public function index()
    {
        $barangMasuks = BarangMasuk::with('barang')->latest()->get();
        $barangs = Barang::all();

        return view('barang_masuk_index', compact('barangMasuks', 'barangs'));
    }

    // Form input barang masuk
    public function create()
    {
        $barangs = Barang::all();
        return view('barang_masuk_create', compact('barangs'));
    }

    // Simpan barang masuk
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'quantity' => 'required|integer|min:1',
            'origin' => 'required|string',
            'tanggal_masuk' => 'required|date',
        ]);

        BarangMasuk::create($request->all());

        // Update stok barang
        $barang = Barang::find($request->barang_id);
        $barang->stok += $request->quantity;
        $barang->save();

        return redirect('/barang-masuk')->with('success', 'Data berhasil disimpan.');
    }
}
