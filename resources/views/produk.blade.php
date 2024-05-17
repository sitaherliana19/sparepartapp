@extends('layouts.main')
@section('container')

    {{-- Akhir  --}}
    <section class="produk" id="produk">
        <div class="container">
            <div class="row text-center">
                <div class="col mb-3 mt-4">
                    <h1>Sparepart</h1>
                </div>
            </div>
            <div class="row">
                @foreach($pr as $product)
                <div class="col-md-4 mb-3 mt-3">
                    <a href="#" class="card shadow-sm" style="width: 23rem;">
                        <div >
                            <img src="/img/spring.jpg" class="card-img-top">
                            <div class="card-body">
                                <h5 class="card-title text-center">{{ $product->title}}</h5>
                                <p class="card-text">{{   $product->description}}</p>
                            </div>
                        </div>
                    </a>
                </div>

                @endforeach
                
                <div class="col-md-4 mb-3 mt-3">
                    <div class="card shadow-sm" style="width: 23rem;">
                        <img src="/img/balancer.png" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">Balancer Crankshaft</h5>
                            <p class="card-text">Balancer Crankshaft TDR merupakan balancer yang dibuat dengan bahan berkualitas tinggi dan didesain dengan presisi sehingga 
                              dapat membantu meningkatkan ketahanan gigi dan peningkatan performa maksimal motor Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3 mt-3">
                    <div class="card shadow-sm" style="width: 23rem;">
                        <img src="/img/karet-vacum.jpg" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">Karet Vacum</h5>
                            <p class="card-text">Karet Vakum berfungsi untuk mengangkat skep naik untuk membuka lubang venturi. 
                              karet vakum merupakan bagian yang penting pada sistem karburator. apabila karet vakum rusak maka 
                              karburator akan terganggu. Oleh karena itu, dibutuhkan karet vakum yang berkualitas agar motor tetap berada pada performa yang optimal.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card shadow-sm" style="width: 23rem;">
                        <img src="/img/pir-klip.jpg" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-center">Per Klep (Valve) Big-Small </h5>
                            <p class="card-text">Per klep atau yang biasanya dikenal dengan spring valve mempunyai peran sebagai penahan 
                              valve dalam kondisi membuka. Selain itu, per klep juga bertugas untuk mengembalikan valve (klep) ke posisi semula. oleh karena itu, peran spring valve menjadi sangat vital. 
                              Per Klep TDR hadir sebagai jawaban dari masalah tersebut.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card shadow-sm" style="width: 23rem;">
                        <img src="/img/pinion.jpg" class="card-img-top" alt=>
                        <div class="card-body">
                            <h5 class="card-title text-center">Pinion Gear Kick</h5>
                            <p class="card-text">Pinion gear atau per kick berfungsi untuk membawa side gear untuk berputar bersama-sama dengan differential case dalam kecepatan putaran yang sama. Kedua komponen yang berputar bersamaan akan 
                              menggerakkan as roda dan membuat roda berputar. Oleh karena itu, Pinion gear merupakan komponen penting yang harus diperhatikan kualitasnya. 
                              Pinion Gear STR dibuat dengan teknologi terkini yang telah melalui berbagai uji dan riset.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card shadow-sm" style="width: 23rem;">
                        <img src="/img/van-belt.jpg" class="card-img-top" alt=>
                        <div class="card-body">
                            <h5 class="card-title text-center">Van Belt (V-Tech) </h5>
                            <p class="card-text">CVT Belt adalah komponen motor yang sangat penting. 
                              CVT Belt atau yang biasa disebut Drive belt merupakan komponen yang berfungsi sebagai penghubung antara pulley depan, 
                              dan pulley belakang. Jika van belt atau tali kipas motor mengalami masalah, tentunya tarikan gas akan menjadi sangat berat. 
                              Oleh karena itu, CVT Belt yang kuat, dan awet sangat diperlukan untuk menjaga motor tetap pada performa maksimal.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{--  AKhir  --}}

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
