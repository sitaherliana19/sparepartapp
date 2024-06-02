@extends('layouts.main')

@section('container')
    {{-- Jumbotron --}}
    <section class="jumbotron start-5 justify-content-center jumbotron-fluid">
        <h1 class="display-4 text-white"><b>Selamat Datang <br> di Penjualan Sparepart Bengkel Arilla</b></h1>
        <hr class=" text-white my-4">
        <p class="text-white fs-5">Sparepart motor adalah komponen atau bagian-bagian yang digunakan untuk mengganti atau memperbaiki bagian-bagian tertentu pada sebuah motor. Sparepart ini penting untuk menjaga kinerja dan keandalan motor agar tetap berfungsi dengan baik.
          Sparepart motor dapat beragam, mulai dari komponen kecil seperti sekrup dan mur, hingga komponen besar seperti mesin, transmisi, atau rangka.</p>
        <a class="btn btn-light btn-md" href="/produk" role="button" whidth>Selengkapnya >></a>
    </section>
    {{-- Akhir Jumbotron --}}

    
    <section id="search">
        <div class="search-ppdb">
            <img src="" alt="">
            <div class="header-search text-center fs-5 mb-2">
                <span>
                    <h3>Bengkel Arilla</h3>
                    <p>Pencarian Sparepart Motor terkait</p>
                </span>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Recipient's username"
                        aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="button" id="button-addon2">Cari</button>
                </div>
            </div>
        </div>
    </section>
    
    {{-- Footer --}}
    <footer class="sticky-footer p-3" id="footer">
        <div class="container">
            <div class="text-center text-white">
                <p>Copyright © 
                </p>
            </div>
        </div>
    </footer>
    {{-- Akhir Footer --}}

    {{-- Scroll Up --}}
    <a href="#" class="ignielToTop"></a>
    {{-- Akhir Scroll Up --}}
@endsection


