@extends('layouts.app')
@extends('Admin.admin')

@section('content')


@if ($errors->any())
<div class="pt-3">
     <div class="alert alert-danger offset-md-3">
          <ul>
               @foreach ($errors->all() as $item)
                   <li>{{ $item }}</li>
               @endforeach
          </ul>
     </div>
</div>
@endif
<div class="container">
    <div class="my-3 p-3 bg-body rounded shadow-sm offset-md-3">
        <form action='{{ url('barang_keluar') }}' method='post'>
            @csrf
            <div class="mb-3 row">
                <label for="tanggal_keluar" class="col-sm-2 col-form-label">Tanggal Keluar</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name='tanggal_keluar' value= "{{ Session::get ('tanggal_keluar')}}" id="tanggal_keluar">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kode_barang" class="col-sm-2 col-form-label">Kode_Barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='kode_barang' value= "{{ Session::get ('kode_barang')}}" id="kode_barang">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama_barang'  value= "{{ Session::get ('nama_barang')}}" id="nama_barang">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="jumlah_keluar" class="col-sm-2 col-form-label">Jumlah Keluar</label>
                <div class="col-sm-10">
                    <input type="integer" class="form-control" name='jumlah_keluar'  value= "{{ Session::get ('jumlah_keluar')}}" id="jumlah_keluar">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="harga_satuan" class="col-sm-2 col-form-label">Harga Satuan</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='harga_satuan'  value= "{{ Session::get ('harga_satuan')}}"  id="harga_satuan">
                </div>
            </div>
            <!-- Add other form inputs here -->
            
            <div class="mb-3 row">
                <div class="col-sm-2"></div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-secondary" onclick="window.history.back()">KEMBALI</button>
                </div>
                <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection 


