@extends('layouts.main')
@section('container')

<div class="container">
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

    <h2>Pesanan Saya</h2>
    <div class="row">
        @foreach ($orders as $order)
        <table id="cart_summary" class="table table-bordered stock-management-on notranslate">
            <div class="col-md-6">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title">Nomor Pesanan : {{ $order->id }}</h5>
                        <p class="card-text">Alamat Pengiriman : {{ $order->address }}, {{ $order->city }}, {{ $order->postal_code }}</p>
                        <p class="card-text">Total Harga : Rp. {{ number_format(floatval($order->total_price), 3, ',', '.') }}</p>
                        <p class="card-text">Status: {{ $order->status }}</p>
                        <!-- Menampilkan detail produk -->
                        <ul class="list-group list-group-flush">
            </div>
        </table>
        @endforeach
        
    </div>
</div>

@endsection
