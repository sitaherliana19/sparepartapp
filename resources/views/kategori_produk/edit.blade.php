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
<form action="{{ url('kategori_produk/'.$data->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm offset-md-3">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="nama_kategori" class="col-sm-2 col-form-label">Nama Kategori</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama_kategori' 
                    value= "{{ $data->nama_kategori}}" id="nama_kategori">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="kode_tag_kategori" class="col-sm-2 col-form-label">
                    Kode Tag Kategori</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='kode_tag_kategori' 
                    value= "{{ $data->kode_tag_kategori}}" id="kode_tag_kategori">
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
