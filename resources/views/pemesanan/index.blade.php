@extends('layouts.app')
@extends('Admin.admin')

@section('content')
<div class="container">
    <div class="row justify-content-md-center"> <!-- Menengahkan konten -->
        <div class="col-md-12"> <!-- Mengatur lebar konten -->
        <div class="my-3 p-3 bg-body rounded shadow-sm offset-md-2">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                  <form class="d-flex" action="{{ url('products') }}" method="get">
                      <input class="form-control me-1" type="search" name="katakunci" value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" aria-label="Search">
                      <button class="btn btn-secondary" type="submit">Cari</button>
                  </form>
                </div>
                
                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                  <a href='{{ url('') }}' class="btn btn-primary">+ Tambah Data</a>
                </div>
          
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-md-1">Id</th>
                            <th class="col-md-2">Nama</th>
                            <th class="col-md-2">Harga</th>
                            <th class="col-md-2">Product_kode</th>
                            <th class="col-md-3">Deskripsi</th>
                            <th class="col-md-2">Action</th>
                        </tr>
                    </thead>
                    
                </table>
               
        </div>
@endsection 