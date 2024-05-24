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

<form action='{{ url('kategori_produk') }}' method='post'>
     @csrf
     <div class="my-3 p-3 bg-body rounded shadow-sm offset-md-3">
          <div class="mb-3 row">
               <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
               <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama_kategori' 
                    value= "{{ Session::get ('nama_kategori')}}" id="nama_kategori">
               </div>
          </div>
          <div class="mb-3 row">
               <label for="kode_tag_kategori" class="col-sm-2 col-form-label">
                    Kategori Tag Produk</label>
               <div class="col-sm-10">
                    <input type="text" class="form-control" name='kode_tag_kategori' 
                    value= "{{ Session::get ('kode_tag_kategori')}}" id="kode_tag_kategori">
               </div>
          </div>
          <div class="mb-3 row">
               <div class="col-sm-2"></div>
               <div class="col-sm-2">
                    <button type="button" class="btn btn-secondary" 
                    onclick="window.history.back()">KEMBALI</button>
               </div>
               <div class="col-sm-1">
                    <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
               </div>
          </div>
     </div>
</form>
@endsection
