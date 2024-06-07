@extends('layouts.main')
@section('container')

<div class="container mt-5">
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
    <div class="row">
        @foreach ($orders as $order)
            <div class="col-md-6 mb-4">
                <div class="card border-1 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">Nomor Pesanan : {{ $order->id }}</h5>
                        <p class="card-text"><i class="bi bi-geo-alt"></i> Alamat Pengiriman : {{ $user->name }}, {{ $user->nomor_handphone }}, {{ $order->address }}</p>
                        <hr>
                        <!-- Menampilkan detail produk -->
                        <div class="row">
                            <div class="col-md-4">
                                @if ($order->product && $order->product->image)
                                    <img src="{{ asset('storage/' . $order->product->image) }}" alt="Gambar Produk" class="img-fluid rounded" style="max-width: 100px;">
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h6>{{ $order->product->title }}</h6>
                                <p><strong>Jumlah :</strong> {{ $order->quantity }}</p>
                                <p><strong>No. Resi :</strong> </p>
                            </div>
                        </div>
                        <hr>
                        <p class="card-text"><i class="bi bi-currency-dollar"></i> Total Pesanan : Rp. {{ $order->total_price }}00</p>
                        <p class="card-text"><i class="bi bi-clock"></i> Status : {{ ucfirst($order->status) }}</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
