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
 <form action='{{ url('products/'.$data->product_code) }}' method='post'>
@csrf
@method('PUT')
<div class="my-3 p-3 bg-body rounded shadow-sm offset-md-3">
     <div class="my-3 p-3 bg-body rounded shadow-sm">
         <div class="mb-3 row">
             <label for="Id" class="col-sm-2 col-form-label">Id</label>
             <div class="col-sm-10">
                <input type="number" class="form-control" name="id" value= "{{ $data->id}}" id="id">
             </div>
         </div>
         <div class="mb-3 row">
             <label for="nama" class="col-sm-2 col-form-label">Nama Barang</label>
             <div class="col-sm-10">
                 <input type="text" class="form-control" name='title' value= "{{ $data->title}}" id="title">
             </div>
         </div>
         <div class="mb-3 row">
             <label for="harga" class="col-sm-2 col-form-label">Harga Barang</label>
             <div class="col-sm-10">
                 <input type="integer" class="form-control" name='price' value= "{{ $data->price}}" id="price">
             </div>
         </div>
         <div class="mb-3 row">
             <label for="kode" class="col-sm-2 col-form-label">Product_kode</label>
             <div class="col-sm-10" >
                {{ $data->product_code }}
             </div>
         </div>
         <div class="mb-3 row">
            <label for="stock" class="col-sm-2 col-form-label">Stok</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='stock' value= "{{ $data->stock}}" id="stock">
            </div>
        </div>
         <div class="mb-3 row">
             <label for="deskripsi" class="col-sm-2 col-form-label">Deskripsi</label>
             <div class="col-sm-10">
                 <input type="text" class="form-control" name='description' value= "{{ $data->description}}" id="description">
             </div>
         </div>
         <div class="mb-3 row">
            <div class="col-sm-2 d-flex justify-content-end"></div>
            <div class="col-sm-2 ">
                <button type="button" class="btn btn-secondary" onclick="window.history.back()">KEMBALI</button>
            </div>
            <div class="col-sm-1 text-end">
                <button type="submit" class="btn btn-primary" name="submit">SIMPAN</button>
            </div>
        </div>
         
       </form>
     </div>
@endsection 