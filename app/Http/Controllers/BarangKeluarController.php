<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\BarangKeluar;

class BarangKeluarController extends Controller
{
    public function index()
    {
        $BarangKeluars = BarangKeluar::with('barang')->latest()->get();
        $barangs = Barang::all();

        return view('barang_keluar', compact('BarangKeluars', 'barangs'));
    }

    // Form input barang keluar
    public function create()
    {
        $barangs = Barang::all();
        return view('barang_keluar_create', compact('barangs'));
    }

    // Simpan barang masuk
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'quantity' => 'required|integer|min:1',
            'destination' => 'required|string',
            'tanggal_keluar' => 'required|date',
        ]);

        BarangKeluar::create($request->all());

        // Update stok barang
        $barang = Barang::find($request->barang_id);
        $barang->stok -= $request->quantity;
        $barang->save();

        return redirect('/barang-keluar')->with('success', 'Data berhasil disimpan.');
    }
}
