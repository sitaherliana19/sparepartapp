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

    <h2>Detail Produk</h2>
    <table id="cart_summary" class="table table-bordered stock-management-on notranslate">
        <thead>
            <tr>
                <th class="cart_product first_item">Gambar Produk</th>
                <th class="cart_description item">Produk</th>
                <th class="cart_unit item">Harga Satuan</th>
                <th class="cart_quantity item">Jumlah</th>
                <th class="cart_total item">Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cartItems as $index => $item)
            @php
            $quantity = $item->quantity; 
            $subtotal = $item->product->price * $quantity;
            $totalHargaProduk = $subtotal;
            @endphp
            <tr id="product_{{ $item->product->id }}" class="cart_item">
                <td class="cart_product" style="text-align: center;">
                    @if ($item->product->image)
                        <img src="{{ asset('storage/' . $item->product->image) }}" alt="Gambar Produk" width="80" height="80" style="display: block; margin: auto;">
                    @endif
                </td>
                <td class="cart_description">
                    <p class="product-name">{{ $item->product->title }}</p>
                    <small class="cart_ref">Kode Produk : {{ $item->product->product_code }}</small>
                </td>
                <td class="cart_unit" data-title="Harga Satuan">
                    <span class="price">Rp. {{$item->product->price}}.000</span>
                </td>
                <td class="cart_quantity" data-title="Jumlah">
                    <span>{{ $quantity }}</span>
                </td>
                <td class="cart_total item" id="total_price_container" data-title="Total">
                    Rp. {{ $subtotal }}.000
                </td>                
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="row">
        <div class="col-xs-12 col-md-5 pull-right">
            <div class="totaltable">
                <table class="table notranslate">
                    <tbody>
                        @php
                            // Menghitung total harga produk
                            $totalHargaProduk = 0;
                            foreach ($cartItems as $item) {
                                $subtotal = $item->quantity * $item->product->price;
                                $totalHargaProduk += $subtotal;
                            }
                            // Menghitung total ongkos kirim sebagai 10% dari total harga produk
                            $totalOngkosKirim = $totalHargaProduk * 0.1;
                            // Menghitung grand total
                            $grandtotal = $totalHargaProduk + $totalOngkosKirim;
                        @endphp
                    
                        <tr class="cart_total_price">
                            <td class="text-right">Total Harga Produk</td>
                            <td class="price notranslate" id="total_product">
                                Rp. {{ ($totalHargaProduk) }}.000
                            </td>
                        </tr>
                        <tr class="cart_total_price">
                            <td class="text-right">Total Ongkos Kirim</td>
                            <td class="price text-right" id="total_shipping">Rp. {{($totalOngkosKirim) }}00</td>
                        </tr>
                        <tr class="cart_total_price">
                            <td class="total_price_container text-right"><span>SubTotal</span></td>
                            <td class="price text-right" id="total_price_container">Rp. {{ ($grandtotal) }}00</td>
                        </tr>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
    <h2>Alamat Pengiriman</h2>
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="address">Alamat:</label>
            <div class="box-info-produk" style="background-color: #f7f7f7; border: 2px solid #b0afaf; padding: 15px;" readonly>{{ $user->alamat}}</div>
            <input type="hidden" name="address" value="{{ $user->alamat}}">
        </div>
        {{-- <div class="form-group">
            <img src="{{ asset('path/to/qris_image.png') }}" alt="QRIS Image" width="200">
        </div> --}}
        <button type="submit" class="btn btn-light mt-2" style="background-color: #804343; color: white;">Bayar</button>
    </form>
</div>
@endsection




