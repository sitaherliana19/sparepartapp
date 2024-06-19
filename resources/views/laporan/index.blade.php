@extends('layouts.app')
@extends('Admin.admin')

@section('content')

{{-- Laporan barang Masuk --}}
<div class="row justify-content-md-center">
    <div class="col-md-12">
        <div class="my-2 offset-md-2">
            <div style="margin-left: 8px; font-size: 18px; font-weight: bold;  margin-top: 26px;">
                <h4>
                    <i class="fas fa-file"></i> Laporan Data Barang Masuk
                </h4>
            </div>
        </div>
    </div>
</div>
<div class="container">
   
    <div class="row justify-content-md-center">
        <div class="col-md-12">
            <div class="my-2 p-3 bg-body rounded shadow-sm offset-md-2">
                <div class="table-responsive">
                    <table id="tableBarangMasuk" class="table table-striped" style="text-align: center;">
                        <thead>
                            <tr>
                                <th class="col-md-1">No</th>
                                <th class="col-md-2">Tanggal Masuk</th>
                                <th class="col-md-2">Kode Barang</th>
                                <th class="col-md-2">Nama Barang</th>
                                <th class="col-md-1">Stok Masuk</th>
                                <th class="col-md-1">Jumlah Stok Masuk</th>
                                <th class="col-md-2">Harga Satuan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataBarangMasuk as $barangMasuk)
                            <tr>
                                <td>{{ $barangMasuk->id }}</td>
                                <td>{{ $barangMasuk->tanggal_masuk }}</td>
                                <td>{{ $barangMasuk->kode_barang }}</td>
                                <td>{{ $barangMasuk->nama_barang}}</td>
                                <td>{{ $barangMasuk->jumlah_masuk }}</td>
                                <td>{{ $barangMasuk->jumlah_stock }}</td>
                                <td>Rp. {{ $barangMasuk->harga_satuan }}.000</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-md-center">
    <div class="col-md-12">
        <div class="my-2 offset-md-2">
            <div style="margin-left: 8px; font-size: 18px; font-weight: bold;  margin-top: 26px;">
                <h4>
                    <i class="fas fa-file"></i> Laporan Data Barang Keluar
                </h4>
            </div>
        </div>
    </div>
</div>


{{-- Laporan barang keluar --}}
<div class="container">
   
    <div class="row justify-content-md-center">
        <div class="col-md-12">
            <div class="my-2 p-3 bg-body rounded shadow-sm offset-md-2">
                <div class="table-responsive">
                    <table id="tableBarangKeluar" class="table table-striped" style="text-align: center;">
                        <thead>
                            <tr>
                                <th class="col-md-1">No</th>
                                <th class="col-md-1">Nama</th>
                                <th class="col-md-2">Tanggal Keluar</th>
                                <th class="col-md-1">Kode Barang</th>
                                <th class="col-md-1">Nama Barang</th>
                                <th class="col-md-1">Stok Keluar</th>
                                <th class="col-md-1">Total Belanja</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataBarangKeluar as $barangKeluar)
                            <tr>
                                <td>{{ $barangKeluar->id }}</td>
                                <td>{{ $barangKeluar->nama }}</td>
                                <td>{{ $barangKeluar->tanggal_keluar }}</td>
                                <td>{{ $barangKeluar->kode_barang }}</td>
                                <td>{{ $barangKeluar->nama_barang}}</td>
                                <td>{{ $barangKeluar->stock_keluar }}</td>
                                <td>Rp. {{ $barangKeluar->total_belanja }}00</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CSS untuk DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css">

<!-- CSS untuk Button DataTables -->
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.5/css/buttons.dataTables.min.css">

<!-- JavaScript untuk jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- JavaScript untuk DataTables -->
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>

<!-- JavaScript untuk Button DataTables -->
<script src="https://cdn.datatables.net/buttons/2.3.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.5/js/buttons.print.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>

<!-- JavaScript untuk inisialisasi DataTables -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // DataTable data barang masuk
        $('#tableBarangMasuk').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Export to Excel',
                    title: 'Laporan Data Barang Masuk'
                },
                {
                    extend: 'pdfHtml5',
                    text: 'Export to PDF',
                    title: 'Laporan Data Barang Masuk'
                }
            ]
        });

        // DataTable data barang keluar
        $('#tableBarangKeluar').DataTable({
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    text: 'Export to Excel',
                    title: 'Laporan Data Barang Keluar'
                },
                {
                    extend: 'pdfHtml5',
                    text: 'Export to PDF',
                    title: 'Laporan Data Barang Keluar'
                }
            ]
        });
    });
</script>

@endsection
