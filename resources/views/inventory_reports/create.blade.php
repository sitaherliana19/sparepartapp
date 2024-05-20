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
 <form action='{{ url('inventory_reports') }}' method='post'>
@csrf
     <div class="my-3 p-3 bg-body rounded shadow-sm offset-md-3">
         <div class="mb-3 row">
             <label for="Id" class="col-sm-2 col-form-label">Id</label>
             <div class="col-sm-10">
                 <input type="number" class="form-control" name="id" value= "{{ Session::get ('id')}}" id="id">
             </div>
         </div>
         <div class="mb-3 row">
             <label for="tanggal" class="col-sm-2 col-form-label">Tanggal</label>
             <div class="col-sm-10">
                 <input type="text" class="form-control" name='title' value= "{{ Session::get ('tanggal')}}" id="tanggal">
             </div>
         </div>
         <div class="mb-3 row">
             <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
             <div class="col-sm-10">
                 <input type="integer" class="form-control" name='nama_barang'  value= "{{ Session::get ('nama_barang')}}" id="harga_barang">
             </div>
         </div>
         <div class="mb-3 row">
             <label for="harga" class="col-sm-2 col-form-label">Harga</label>
             <div class="col-sm-10">
                 <input type="number" class="form-control" name='harga'  value= "{{ Session::get ('harga')}}" id="harga">
             </div>
         </div>
         <div class="mb-3 row">
            <label for="total_barang" class="col-sm-2 col-form-label">Total Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name='total_barang'  value= "{{ Session::get ('total_barang')}}"  id="total_barang">
            </div>
        </div>
         <div class="mb-3 row">
             <label for="total_harga" class="col-sm-2 col-form-label">Total Harga</label>
             <div class="col-sm-10">
                 <input type="text" class="form-control" name='total_harga'  value= "{{ Session::get ('total_harga')}}"  id="total_harga">
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
         
       </form>
     </div>
@endsection 