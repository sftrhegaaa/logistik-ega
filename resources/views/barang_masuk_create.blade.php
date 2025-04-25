@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Form Barang Masuk</h3>
    <form action="/barang-masuk" method="POST">
        @csrf
        <div class="mb-3">
            <label>Kode Barang</label>
            <select name="barang_id" class="form-control">
                @foreach ($barangs as $barang)
                    <option value="{{ $barang->id }}">{{ $barang->kode_barang }} - {{ $barang->nama_barang }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label>Quantity</label>
            <input type="number" name="quantity" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Origin (Asal Barang)</label>
            <input type="text" name="origin" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Tanggal Masuk</label>
            <input type="date" name="tanggal_masuk" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
