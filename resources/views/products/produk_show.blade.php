@extends('layouts.main')

@section('container')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Produk</title>
    <style>
        .product-container {
        padding: 20px;
        margin-bottom: 20px; /* Tambahkan margin bawah agar ada ruang antara kotak produk */
        
    }

    #footer {
        padding: 20px;
    }
        .product-image {
            flex: 1;
            max-width: 200px; /* Ubah sesuai kebutuhan */
        }
        .product-details {
            flex: 2;
            margin-left: 140px; /* Atur jarak antara gambar dan teks */
        }
    </style>
</head>
<body>
    <hr style="border-bottom: 2px solid black; margin-top: 40px; margin-bottom: 20px;"> <!-- Garis pemisah -->
    <div class="product-container">
     <div class="row">
         <div class="col-md-4">
             <div class="card shadow-sm" style="width: 18rem; margin-left: auto;">
                 <img src="/img/balancer.png" class="card-img-top" alt="Gambar Produk">
             </div>
         </div>
         <div class="col-md-6">
             <div class="product-details">
                 <h2>{{ $product->title }}</h2>
                 <p>Harga : {{ $product->price }}</p>
                 <p>Stok  : {{ $product->stock }}</p>
                 <p>Deskripsi  :  {{ $product->description }}</p>
             </div>
         </div>
     </div>
 </div>
 
 </div> 
</body>
</html>
{{-- Footer --}}
<footer class="p-3" id="footer">
     <div class="container">
         <div class="text-center text-white">
             <p>Copyright © 
             </p>
         </div>
     </div>
 </footer>
 {{-- Akhir Footer --}}
 
@endsection
