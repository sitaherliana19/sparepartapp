@extends('layouts.app')
@extends('Admin.admin')

@section('content')
<div class="container">
    <div class="row justify-content-md-center"> <!-- Menengahkan konten -->
        <div class="col-md-12"> <!-- Mengatur lebar konten -->
            <div class="my-3 p-3 bg-body rounded shadow-sm offset-md-2">
                <!-- FORM PENCARIAN -->
                <div class="pb-3">
                    <form class="d-flex" action="{{ url('kategori_produk/create') }}" 
                    method="get">
                        <input class="form-control me-1" type="search" name="katakunci" 
                        value="{{ Request::get('katakunci') }}" placeholder="Masukkan kata kunci" 
                        aria-label="Search">
                        <button class="btn btn-secondary" type="submit">Cari</button>
                    </form>
                </div>

                <!-- TOMBOL TAMBAH DATA -->
                <div class="pb-3">
                    <a href='{{ url('kategori_produk/create') }}' 
                    class="btn btn-primary">+ Tambah Data</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th class="col-md-2">Id</th>
                                <th class="col-md-2">Nama Kategori</th>
                                <th class="col-md-2">Kode Tag Kategori</th>
                                <th class="col-md-2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $data->firstItem()?>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $item ->nama_kategori }}</td>
                                <td>{{ $item ->kode_tag_kategori }}</td>
                                <td>
                                    <a href='{{ url('kategori_produk/'.$item->id.'/edit') }}' 
                                        class="btn btn-warning btn-sm mb-2" style="min-width: 60px;">Edit</a>
                                    <form onsubmit="return confirm('Apakah Anda yakin akan menghapus data ini?')" 
                                        class='d-inline' action="{{ url('kategori_produk/'.$item->id) }}" method="post">
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
