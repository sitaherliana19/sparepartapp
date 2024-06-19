@extends('layouts.app')
@extends('Admin.admin')

@section('content')
<div class="container">
    <div class="row justify-content-md-center"> 
        <div class="col-md-12"> 
            <div class="my-3 p-3 bg-body rounded shadow-sm offset-md-2">
                <div class="pb-3">
                    <form class="d-flex" action="{{ url('data_pelanggan') }}" 
                    method="get">
                        <input class="form-control me-1" type="search" name="katakunci" 
                        value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" 
                        aria-label="Search">
                        <button class="btn btn-secondary" type="submit">Cari</button>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped" style="text-align: center;">
                        <thead>
                            <tr>
                                <th class="col-md-1">No</th>
                                <th class="col-md-2">Nama Pelanggan</th>
                                <th class="col-md-1">Email</th>
                                <th class="col-md-2">Alamat</th>
                                <th class="col-md-2">No Handphone</th>
                                <th class="col-md-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $data->firstItem()?>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $item ->nama }}</td>
                                <td>{{ $item ->email }}</td>
                                <td>{{ $item ->alamat }}</td>
                                <td>{{ $item ->no_handphone }}</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah Anda yakin akan menghapus data ini?')" 
                                        class='d-inline' action="{{ url('data_pelanggan/'.$item->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" name="submit" class="btn btn-danger btn-sm mb-2" 
                                        style="min-width: 60px;">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            <?php $i++?>
                            @endforeach
                    </table>
                </div>

                <!-- ANGKA NEXT -->
               {{ $data->withQueryString()->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
