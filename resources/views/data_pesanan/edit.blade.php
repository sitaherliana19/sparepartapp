@extends('layouts.app')
@extends('Admin.admin')

@section('content')

@if ($errors->any())
<div class="pt-3">
     <div class="alert alert-danger">
          <ul>
               @foreach ($errors->all() as $error)
                   <li>{{ $error }}</li>
               @endforeach
          </ul>
     </div>
</div>
@endif

<form action="{{ route('data_pesanan.update', $data->id) }}" method="post">
    @csrf
    @method('PUT')
    <div class="my-3 p-3 bg-body rounded shadow-sm offset-md-3">
        <div class="my-3 p-3 bg-body rounded shadow-sm">
            <div class="mb-3 row">
                <label for="no_resi" class="col-sm-2 col-form-label">No. Resi</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name='no_resi' value="{{ $data->no_resi }}" id="no_resi">
                </div>
            </div>
            
            <div class="mb-3 row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection 
