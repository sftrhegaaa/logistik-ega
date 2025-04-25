<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\BarangKeluarController;
use App\Http\Controllers\StokBarangController;

Route::get('/', [BarangMasukController::class, 'index']);


Route::get('/barang-masuk', [BarangMasukController::class, 'index'])->name('barang-masuk');
Route::get('/barang-masuk/create', [BarangMasukController::class, 'create']);
Route::post('/barang-masuk', [BarangMasukController::class, 'store']);

Route::get('/barang-keluar', [BarangKeluarController::class, 'index'])->name('barang-keluar');
Route::get('/barang-keluar/create', [BarangKeluarController::class, 'create']);
Route::post('/barang-keluar', [BarangKeluarController::class, 'store']);

Route::get('/stok-barang', [StokBarangController::class, 'index'])->name('stok-barang');


