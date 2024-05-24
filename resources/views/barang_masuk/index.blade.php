@extends('layouts.app')
@extends('Admin.admin')

@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-12">
        <div class="my-2 offset-md-2">
            <div style="margin-left: 8px; font-size: 18px; font-weight: bold;  margin-top: 26px;">
                <h4>
                    <i class="bi bi-arrow-left"></i> Data Barang Masuk
                </h4>
            </div>
        </div>
    </div>
</div>
<div class="container">
   
    <div class="row justify-content-md-center">
        <div class="col-md-12">
            <div class="my-2 p-3 bg-body rounded shadow-sm offset-md-2">
                <div class="pb-3">
                    <a href='{{ url('barang_masuk/create') }}' class="btn btn-primary">+ Tambah Data Barang Masuk</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="col-md-1">Id</th>
                                <th class="col-md-2">Tanggal Masuk</th>
                                <th class="col-md-2">Kode Barang</th>
                                <th class="col-md-2">Nama Barang</th>
                                <th class="col-md-2">Stock Masuk</th>
                                <th class="col-md-2">Jumlah Stock Masuk</th>
                                <th class="col-md-2">Harga Satuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = $data->firstItem();
                            @endphp
                            @foreach ($data as $item)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $item->tanggal_masuk }}</td>
                                    <td>{{ $item->kode_barang }}</td>
                                    <td>{{ $item->nama_barang}}</td>
                                    <td>{{ $item->jumlah_masuk }}</td>
                                    <td>{{ $item->jumlah_stock }}</td>
                                    <td>{{ $item->harga_satuan }}</td>
                                </tr>
                                @php
                                    $i++;
                                @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $data->withQueryString()->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
