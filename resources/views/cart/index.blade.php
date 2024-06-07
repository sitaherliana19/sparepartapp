@extends('layouts.main')

@section('container')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (!is_null($cartItems) && !$cartItems->isEmpty())
    <form action="{{ route('cart.update') }}" method="POST">
        @csrf
        <table id="cart_summary" class="table table-bordered stock-management-on notranslate">
            <thead>
                <tr>
                    <th class="cart_product first_item">Gambar Produk</th>
                    <th class="cart_description item">Produk</th>
                    <th class="cart_unit item">Harga Satuan</th>
                    <th class="cart_quantity item">Jumlah</th>
                    <th class="cart_total item">Total</th>
                    <th class="cart_delete last_item">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cartItems as $index => $item)
                <tr id="product_{{ $item->product->id }}" class="cart_item">
                    <td class="cart_product">
                        @if ($item->product->image)
                            <img src="{{ asset('storage/' . $item->product->image) }}" alt="Gambar Produk" width="80" height="80" style="display: block; margin: auto;">
                        @else
                            <img src="{{ asset('images/default.png') }}" alt="Gambar Produk Default" width="98" height="98">
                        @endif
                    </td>
                    <td class="cart_description">
                        <p class="product-name">
                            <a href="{{ route('products.show', $item->product->id) }}">{{ $item->product->title }}</a>
                        </p>
                        <small class="cart_ref">Kode Produk : {{ $item->product->product_code }}</small>
                    </td>
                    <td class="cart_unit" data-title="Harga Satuan">
                        <span class="price">Rp. {{$item->product->price}}.000</span>
                    </td>
                    <td class="cart_quantity" data-title="Jumlah">
                        <div class="input-group">
                            <input type="number" name="quantity[]" value="{{ $item->quantity }}" min="0" class="form-control quantity-input" data-index="{{ $index }}" data-product-id="{{ $item->product->id }}">
                            <div class="input-group-prepend">
                                <button type="button" class="btn btn-outline-secondary quantity-button" data-action="minus">-</button>
                            </div>
                            <div class="input-group-append">
                                <button type="button" class="btn btn-outline-secondary quantity-button" data-action="plus">+</button>
                            </div>
                        </div>
                    </td>
                    <td class="price" id="total_price_container">
                        Rp. {{ $item->quantity * $item->product->price}}.000
                    </td>
                    <td class="cart_delete text-center" data-title="Hapus">
                        <a href="{{ route('cart.remove', $item->product->id) }}" class="cart_quantity_delete"><i class="fas fa-trash-alt"></i></a>
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
                                    Rp. {{ $cartItems->sum('quantity') * $cartItems->avg('product.price')}}.000
                                </td>
                            </tr>                  
                        </tbody>
                    </table>
                    <div class="text-right mt-3">
                        <a href="{{ route('checkout.index') }}" class="btn btn-light" style="background-color: #804343; color: white;">Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @else
        <p>Keranjang anda kosong.</p>
    @endif
</div>
@endsection


@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const quantityInputs = document.querySelectorAll('.quantity-input');
        const quantityButtons = document.querySelectorAll('.quantity-button');
        
        quantityInputs.forEach(input => {
            input.addEventListener('input', function() {
                updateSubtotalAndTotal();
            });
        });
        
        quantityButtons.forEach(button => {
            button.addEventListener('click', function() {
                const action = this.getAttribute('data-action');
                const input = this.closest('.input-group').querySelector('.quantity-input');
                let newValue = parseInt(input.value);

                if (action === 'plus') {
                    newValue++;
                } else if (action === 'minus' && newValue > 0) {
                    newValue--;
                }

                input.value = newValue;
                updateSubtotalAndTotal();
            });
        });

        function updateSubtotalAndTotal() {
            let totalHargaProduk = 0;
            quantityInputs.forEach(input => {
                const cartItem = input.closest('.cart_item');
                const quantity = parseInt(input.value);
                const priceString = input.closest('.cart_item').querySelector('.cart_unit .price').innerText.replace('Rp. ', '');
                const price = parseFloat(priceString.replace('.', '').replace(',', '.'));
                const subtotal = quantity * price;
                totalHargaProduk += subtotal;
                 // Perbarui subtotal 
                const subtotalElement = document.getElementById('total_price_container');
                subtotalElement.innerText = 'Rp. ' + formatRupiah(subtotal);
            });

            // Perbarui totalproduk
            const totalProductElement = document.getElementById('total_product');
            totalProductElement.innerText = 'Rp. ' + formatRupiah(totalHargaProduk);

        }

        function formatRupiah(angka) {
            var number_string = angka.toString(),
                sisa = number_string.length % 3,
                rupiah = number_string.substr(0, sisa),
                ribuan = number_string.substr(sisa).match(/\d{3}/g);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            return rupiah;
        }
    });
</script>

@endsection
