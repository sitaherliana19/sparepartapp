@extends('layouts.main')

@section('container')
<div class="container mt-3">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <h2 class="mb-4">Pesanan Saya</h2>
    <div class="row" id="orders-container">
        @foreach ($transaksis as $transaksi)
            <div class="col-md-6 mb-4">
                <div class="card border-1 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Nomor Pesanan : {{ $transaksi->no_transaksi }}</h5>
                        <p><strong><i class="fas fa-map-marker-alt"></i> Alamat Pengiriman :</strong> {{ $user->name }}, {{ $user->nomor_handphone }}, {{ $transaksi->alamat }}</p>
                        <hr>
                        <!-- Menampilkan detail produk -->
                        @foreach ($transaksi->detailTransaksi as $detailTransaksi)
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    @if ($detailTransaksi->product && $detailTransaksi->product->image)
                                    <div class="d-flex justify-content-center align-items-center" style="height: 100px;">
                                        <img src="{{ asset('storage/' . $detailTransaksi->product->image) }}" alt="Gambar Produk" class="img-fluid rounded" style="max-width: 100px;">
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-8">
                                    <h6>{{ $detailTransaksi->nama_produk }}</h6>
                                    <p><strong>QTY :</strong> {{ $detailTransaksi->jumlah }}</p>
                                </div>
                            </div>
                            <hr>
                        @endforeach
                        <p><strong><i class="fas fa-coins"></i> Total Pesanan :</strong> Rp. {{ $transaksi->total }}00</p>
                        <p><strong><i class="fas fa-barcode"></i> No. Resi :</strong> <span class="order-tracking-number">{{ $detailTransaksi->tracking_number ? $detailTransaksi->tracking_number : 'Belum Tersedia' }}</span></p>
                        <p><strong><i class="fas fa-shipping-fast"></i> Status :</strong> <span class="order-status">{{ $detailTransaksi->status }}</span></p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
