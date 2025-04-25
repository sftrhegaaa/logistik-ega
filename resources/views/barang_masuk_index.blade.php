@extends('layouts.partials.base')

@section('content')
<div class="container">
    <h3>Daftar Barang Masuk</h3>
        <!-- Tombol untuk membuka modal -->
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalBarangKeluar">
            <i class="fa fa-plus"></i> Tambah Barang Masuk
          </button>
      
          @if (session('success'))
              <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                  {{ session('success') }}
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
          @endif
          <!-- Modal -->
          <div class="modal fade" id="modalBarangKeluar" tabindex="-1" aria-labelledby="modalBarangKeluarLabel"
              aria-hidden="true">
              <div class="modal-dialog">
                  <form action="/barang-masuk" method="POST">
                      @csrf
                      <div class="modal-content">
                          <div class="modal-header">
                              <h5 class="modal-title" id="modalBarangKeluarLabel">Input Barang Masuk</h5>
                              <!-- Tombol close -->
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <div class="mb-3">
                                  <label for="barang_id" class="form-label">Pilih Barang</label>
                                  <select name="barang_id" id="barang_id" class="form-control" required>
                                      <option value="" disabled selected>-- Pilih Barang --</option>
                                      @foreach ($barangs as $barang)
                                          <option value="{{ $barang->id }}">
                                              {{ $barang->kode_barang }} - {{ $barang->nama_barang }}
                                          </option>
                                      @endforeach
                                  </select>
                              </div>
                              <div class="mb-3">
                                  <label for="quantity" class="form-label">Jumlah Barang</label>
                                  <input type="number" name="quantity" id="quantity" class="form-control" min="1"
                                      required>
                              </div>
                              <div class="mb-3">
                                  <label for="destination" class="form-label">Origin (Asal Barang)</label>
                                  <input type="text" name="origin" id="origin" class="form-control" required>
                              </div>
                              <div class="mb-3">
                                  <label for="tanggal_keluar" class="form-label">Tanggal Masuk</label>
                                  <input type="date" name="tanggal_masuk" id="tanggal_masuk" class="form-control"
                                      required>
                              </div>
                          </div>
                          <div class="modal-footer">
                              <button type="submit" class="btn btn-primary">Simpan</button>
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                          </div>
                      </div>
                  </form>
              </div>
          </div>
  
        {{-- <a href="/barang-masuk/create" class="btn btn-success">
            <i class="fa fa-plus"></i> Tambah Barang Masuk
        </a> --}}
    
    {{-- <a href="/barang-masuk/create" class="btn btn-success mb-3 float-end"><i class="fa fa-plus"></i> Tambah Barang Masuk</a> --}}
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Quantity</th>
                            <th>Asal</th>
                            <th>Tanggal Masuk</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                     
                        @foreach ($barangMasuks as $data)
                            <tr>
                                <td>{{ $data->barang->kode_barang }}</td>
                                <td>{{ $data->barang->nama_barang }}</td>
                                <td>{{ $data->quantity }}</td>
                                <td>{{ $data->origin }}</td>
                                <td>{{ \Carbon\Carbon::parse($data->tanggal_masuk)->format('d-m-Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>
  <script>
      // Setelah 5 detik, sembunyikan alert
      setTimeout(function() {
          $('#successAlert').alert('close'); // Menutup alert secara otomatis
      }, 5000); // 5 detik
  </script>
@endsection
