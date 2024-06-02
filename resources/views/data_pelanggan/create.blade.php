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

<form action='{{ url('data_pelanggan') }}' method='post'>
     @csrf
     <div class="my-3 p-3 bg-body rounded shadow-sm offset-md-3">
          <div class="mb-3 row">
               <label for="nama" class="col-sm-2 col-form-label">Nama Pelanggan</label>
               <div class="col-sm-10">
                    <input type="text" class="form-control" name='nama' 
                    value= "{{ Session::get ('nama')}}" id="nama">
               </div>
          </div>
          <div class="mb-3 row">
               <label for="email" class="col-sm-2 col-form-label">
                    Email</label>
               <div class="col-sm-10">
                    <input type="text" class="form-control" name='email' 
                    value= "{{ Session::get ('email')}}" id="email">
               </div>
          </div>
          <div class="mb-3 row">
               <label for="alamat" class="col-sm-2 col-form-label">
                    Alamat</label>
               <div class="col-sm-10">
                    <input type="text" class="form-control" name='alamat' 
                    value= "{{ Session::get ('alamat')}}" id="alamat">
               </div>
          </div>
          <div class="mb-3 row">
               <label for="no_handphone" class="col-sm-2 col-form-label">
                    No Handphone</label>
               <div class="col-sm-10">
                    <input type="text" class="form-control" name='no_handphone' 
                    value= "{{ Session::get ('no_handphone')}}" id="no_handphone">
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
