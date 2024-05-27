@extends('layouts.app')
@extends('Admin.admin')

@section('content')

@if ($errors->any())
<div class="pt-3">
     <div class="alert alert-danger">
          <ul>
               @foreach ($errors->all() as $item)
                   <li>{{ $item }}</li>
               @endforeach
          </ul>
     </div>
</div>
@endif
<form action="{{ url('data_pelanggan/'.$data->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm offset-md-3">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
          <div class="mb-3 row">
               <label for="nama" class="col-sm-2 col-form-label">Nama Pelanggan</label>
               <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' 
                    value= "{{ $data->nama}}" id="nama">
               </div>
          </div>
          <div class="mb-3 row">
               <label for="email" class="col-sm-2 col-form-label">Email</label>
               <div class="col-sm-10">
                    <input type="text" class="form-control" name='email' 
                    value= "{{ $data->email}}" id="email">
               </div>
          </div>
          <div class="mb-3 row">
               <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
               <div class="col-sm-10">
                    <input type="text" class="form-control" name='alamat' 
                    value= "{{ $data->alamat}}" id="alamat">
               </div>
          </div>
          <div class="mb-3 row">
               <label for="no_handphone" class="col-sm-2 col-form-label">No Handphone</label>
               <div class="col-sm-10">
                    <input type="text" class="form-control" name='no_handphone' 
                    value= "{{ $data->no_handphone}}" id="no_handphone">
               </div>
          </div>
          <div class="mb-3 row">
               <label for="jumlah_belanja" class="col-sm-2 col-form-label">Jumlah Belanja</label>
               <div class="col-sm-10">
                    <input type="text" class="form-control" name='jumlah_belanja' 
                    value= "{{ $data->jumlah_belanja}}" id="jumlah_belanja">
               </div>
          </div>
            
          <div class="mb-3 row">
               <div class="col-sm-2 d-flex justify-content-end"></div>
               <div class="col-sm-2 ">
                    <button type="button" class="btn btn-secondary" 
                    onclick="window.history.back()">KEMBALI</button>
               </div>
               <div class="col-sm-1 text-end">
                    <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
               </div>
          </div>
     </form>
</div>
@endsection 
