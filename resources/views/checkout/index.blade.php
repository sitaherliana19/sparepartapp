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
                $quantity = intval($item->quantity); // Mengonversi ke integer
                $price = floatval($item->product->price); // Mengonversi ke float
                $total = $quantity * $price;
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
                    <span class="price">{{ $item->product->price}}</span>
                </td>
                <td class="cart_quantity" data-title="Jumlah">
                    <span>{{ $quantity }}</span>
                </td>
                <td class="cart_total item" id="total_price_container" data-title="Total">
                    @php
                    // Menghilangkan karakter non-angka dari harga produk
                    $cleanPrice = preg_replace("/[^0-9]/", "", $item->product->price);
                    // Konversi harga yang telah dibersihkan menjadi tipe data float
                    $price = floatval($cleanPrice);
                    // Mengalikan dengan quantity untuk mendapatkan subtotal
                    $subtotal = $price * $item->quantity;
                    @endphp
                    {{ 'Rp. ' . number_format($subtotal, 0, ',', '.') }}
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
                        <tr class="cart_total_price">
                            <td class="text-right">Total Harga Produk</td>
                            <td class="price notranslate" id="total_product">
                                @php
                                $totalHargaProduk = 0;
                                foreach($cartItems as $item) {
                                    // Menghilangkan karakter non-angka dari harga produk
                                    $cleanPrice = preg_replace("/[^0-9]/", "", $item->product->price);
                                    // Konversi harga yang telah dibersihkan menjadi tipe data float
                                    $price = floatval($cleanPrice);
                                    // Mengalikan dengan quantity untuk mendapatkan subtotal
                                    $subtotal = $price * $item->quantity;
                                    $totalHargaProduk += $subtotal;
                                }
                                // Ubah format ke integer tanpa desimal
                                $totalHargaProduk = intval($totalHargaProduk);
                                // Tampilkan total harga produk dalam format Rupiah
                                echo 'Rp. ' . number_format($totalHargaProduk, 0, ',', '.');
                                @endphp
                            </td>
                        </tr>
                        <tr class="cart_total_price">
                            @php
                            $totalOngkosKirim = $totalHargaProduk * 0.1;
                            @endphp
                            <td class="text-right">Total Ongkos Kirim</td>
                            <td class="price text-right" id="total_shipping">{{ 'Rp. ' . number_format($totalOngkosKirim, 0, ',', '.') }}</td>
                        </tr>
                        <tr class="cart_total_price">
                            @php
                            $grandtotal = $totalHargaProduk + $totalOngkosKirim;
                            @endphp
                            <td class="total_price_container text-right"><span>SubTotal</span></td>
                            <td class="price text-right" id="total_price_container">{{ 'Rp. ' . number_format($grandtotal, 0, ',', '.') }}</td>
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
            <textarea name="address" id="address" class="form-control" required></textarea>
        </div>
        <div class="form-group">
            <label for="city">Kota:</label>
            <input type="text" name="city" id="city" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="postal_code">Kode Pos:</label>
            <input type="text" name="postal_code" id="postal_code" class="form-control" required>
        </div>
        <div class="form-group">
            <img src="{{ asset('path/to/qris_image.png') }}" alt="QRIS Image" width="200">
        </div>
        <button type="submit" class="btn btn-primary">Bayar</button>          
    </form>
</div>
@endsection

