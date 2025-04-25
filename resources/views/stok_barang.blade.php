@extends('layouts.partials.base')

@section('content')
<div class="container">
    <h3>Daftar Stok Barang</h3>
 
  
    {{-- <a href="/barang-keluar/create" class="btn btn-success mb-3">+ Catat Barang Keluar</a> --}}

    <div class="card shadow mb-4">

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Stok</th>
                          
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($barangs as $data)
                        <tr>
                            <td>{{ $data->kode_barang }}</td>
                            <td>{{ $data->nama_barang }}</td>
                            <td>{{ $data->stok }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
   
</div>
@endsection
