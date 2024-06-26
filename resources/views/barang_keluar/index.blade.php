@extends('layouts.app')
@extends('Admin.admin')

@section('content')
<div class="row justify-content-md-center">
    <div class="col-md-12">
        <div class="my-2 offset-md-2">
            <div style="margin-left: 8px; font-size: 18px; font-weight: bold;  margin-top: 26px;">
                <h4>
                    <i class="bi bi-arrow-right"></i> Data Barang Keluar
                </h4>
            </div>
        </div>
    </div>
</div>
<div class="container">
   
    <div class="row justify-content-md-center">
        <div class="col-md-12">
            <div class="my-2 p-3 bg-body rounded shadow-sm offset-md-2">
                {{-- <div class="pb-3">
                    <a href='{{ url('barang_keluar/create') }}' class="btn btn-primary">+ Tambah Data Barang Keluar</a>
                </div> --}}
                <div class="table-responsive">
                    <table class="table table-striped" style="text-align: center;">
                        <thead>
                            <tr>
                                <th class="col-md-1">No</th>
                                <th class="col-md-2">Tanggal Keluar</th>
                                <th class="col-md-2">Kode Barang</th>
                                <th class="col-md-2">Nama Barang</th>
                                <th class="col-md-2">Stock Keluar</th>
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
                                    <td>{{ $item->tanggal_keluar }}</td>
                                    <td>{{ $item->kode_barang }}</td>
                                    <td>{{ $item->nama_barang}}</td>
                                    <td>{{ $item->jumlah_keluar }}</td>
                                    <td>Rp. {{ $item->harga_satuan }}.000</td>
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
