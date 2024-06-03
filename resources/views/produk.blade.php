@extends('layouts.main')
@section('container')

    <section class="produk" id="produk">
        <div class="container">
            <div class="row text-center">
                <div class="col mb-3 mt-4">
                    <h1>Sparepart</h1>
                </div>
            </div>
            <div class="row">
                @foreach($pr as $product)
                <div class="col-md-3 mb-3 mt-3">
                <a href="{{ route('products.show', ['id' => $product->id]) }}" class="card shadow-sm" style="width: 16rem; text-decoration: none;">
                    <div>
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="Gambar Produk">
                        <div class="card-body text-center">
                            <h5 class="card-title">{{ $product->title}}</h5>
                            <hr> <!-- Garis pemisah -->
                            <p class="card-text">{{ $product->price }}</p>
                        </div>
                    </div>
                </a>
            </div>
            @endforeach

            </div>
        </div>
    </section>
    {{--  AKhir  --}}

    {{-- Footer --}}
    <footer class="sticky-footer p-3" id="footer" style="margin-top: 20px;">
        <div class="container">
            <div class="text-center text-white">
                <p>Copyright © 
                </p>
            </div>
        </div>
    </footer>

    {{-- Scroll Up --}}
    <a href="#" class="ignielToTop"></a>

@endsection
