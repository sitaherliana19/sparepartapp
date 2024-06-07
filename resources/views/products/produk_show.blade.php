@extends('layouts.main')

@section('container')
    <style>
        .product-container {
            padding: 20px;
            margin-bottom: 20px;
        }
        .box-info-produk {
            border: 1px solid #dee2e6;
            border-radius: .25rem;
            padding: 20px;
        }
        #footer {
            padding: 20px;
        }
        .quantity-controls {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        .quantity-controls button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .quantity-controls input {
            width: 60px;
            text-align: center;
            margin: 0 10px;
        }
    </style>
<body>
<hr style="border-bottom: 2px solid black; margin-top: 40px; margin-bottom: 20px;"> <!-- Garis pemisah -->
    <div class="container">
        <div class="row">
            <div class="col-md-4 ">
                <div class="card shadow-sm" style="width: 18rem; margin-left: auto; margin-top: 50px;" >
                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="Gambar Produk" style="margin-top: 20px;">
                </div>
            </div>
            <div class="col-md-6 offset-md-1">
                <div class="product-details">
                    <h2>{{ $product->title }}</h2>
                    <p>Harga: Rp.{{ number_format($product->price, 0, ',', '.') }}.000</p>
                    <p>Stok: {{ $product->stock }}</p>
                    <p>Deskripsi: {{ $product->description }}</p>

                    <form action="{{ route('cart.add') }}" method="post">
                        @csrf
                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                        <div class="box-info-produk" style="background-color: #f7f7f7; border: 2px solid #b0afaf; padding: 15px;">
                            <label for="quantity">Jumlah:</label>
                            <div class="quantity-controls" style="display: flex; align-items: center; margin-bottom: 10px; margin-top: 10px;">
                                <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->stock }}" style="margin-right: 5px;">
                                <button type="button" id="decrement" style="background-color: #804343; color: white; margin-right: 5px;">-</button>
                                <button type="button" id="increment" style="background-color: #804343; color: white;">+</button>
                            </div>
                            <button type="submit" class="btn btn-light" style="background-color: #804343; color: white;">
                                <i class="fas fa-shopping-cart"></i> Tambah Keranjang
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</body>
</html>
{{-- Footer --}}
<footer class="p-3" id="footer" style="margin-top: 70px;">
    <div class="container">
        <div class="text-center text-white">
            <p>Copyright © 
            </p>
        </div>
    </div>
</footer> 
@endsection


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const decrementButton = document.getElementById('decrement');
            const incrementButton = document.getElementById('increment');
            const quantityInput = document.getElementById('quantity');
            const addButton = document.querySelector('button[type="submit"]');

            decrementButton.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                if (currentValue > 1) {
                    quantityInput.value = currentValue - 1;
                }
            });

            incrementButton.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                if (currentValue < parseInt(quantityInput.max)) {
                    quantityInput.value = currentValue + 1;
                }
            });

            // Disable tambah keranjang jika stok 0
            if (parseInt(quantityInput.max) === 0) {
                addButton.disabled = true;
            }

            // Perbarui status button tambah keranjang saat mengubah stok
            quantityInput.addEventListener('input', function() {
                if (parseInt(this.value) > 0) {
                    addButton.disabled = false;
                } else {
                    addButton.disabled = true;
                }
            });
        });
    </script>
