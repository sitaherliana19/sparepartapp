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

<form action='{{ url('products') }}' method='post' enctype="multipart/form-data">
    @csrf
    <div class="my-3 p-3 bg-body rounded shadow-sm offset-md-3">
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='title' value= "{{ Session::get ('title')}}" id="title">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kategori" class="col-sm-2 col-form-label">Kategori Produk</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='category_id' value= "{{ Session::get ('category_id')}}" id="category_id">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="harga" class="col-sm-2 col-form-label">Harga Barang</label>
            <div class="col-sm-10">
                <input type="integer" class="form-control" name='price'  value= "{{ Session::get ('price')}}" id="price">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="kode" class="col-sm-2 col-form-label">Product_kode</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" name='product_code'  value= "{{ Session::get ('product_code')}}" id="product_code">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="stock" class="col-sm-2 col-form-label">Stok</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='stock'  value= "{{ Session::get ('stock')}}"  id="stock">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='description'  value= "{{ Session::get ('description')}}"  id="description">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="gambar" class="col-sm-2 col-form-label">Gambar Produk</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" name='image' id="image">
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-2"></div>
            <div class="col-sm-2">
                <button type="button" class="btn btn-secondary" onclick="window.history.back()">KEMBALI</button>
            </div>
            <div class="col-sm-1">
                <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
            </div>
        </div>
    </div>
</form>

@endsection
