@extends('layouts.main')
@section('container')
    {{-- Kontak  --}}
    <section class="kontak">
        <div class="container">
            <div class="row">
                <div class="col text-white mt-3">
                    <h1 class="text-center">Hubungi Kami</h1>
                    <div class="contact-area">
                        <div class="container">
                            <div class="col">
                                <div class="contact-from">
                                    <form class="row g-3">
                                        <div class="col-12">
                                            <label for="inputEmail4" class="form-label">Nama :</label>
                                            <input type="email" class="form-control" id="inputEmail">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputAddress" class="form-label">Email :</label>
                                            <input type="text" class="form-control" id="inputAddress">
                                        </div>
                                        <div class="col-12">
                                            <label for="inputAddress" class="form-label">Alamat</label>
                                            <textarea type="text" class="form-control" id="inputAddress"  cols="30"
                                                rows="10"></textarea>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <button type="submit" class="btn btn-primary">SUBMIT</button>
                                        </div>
                                        <div class="col-md-6 col-sm-12 col-xs-12">
                                            <div class="map-area mb-3">
                                                <iframe
                                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.7483514718583!2d111.52119147404655!3d-7.602341775136154!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e79bf0df69b8801%3A0xc194ff1ce8e9d96!2sBENGKEL%20ARILLA!5e0!3m2!1sid!2sid!4v1711564906665!5m2!1sid!2sid" 
                                                    width="1100" height="450" style="border-radius:1cm;"
                                                    allowfullscreen="" loading="lazy"
                                                    referrerpolicy="no-referrer-when-downgrade"></iframe>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- Akhir Kontak  --}}

    {{-- Kontak --}}
    <section class="information">
        <div class="container information-info">
            <div class="row justify-content-center text-center">
                <div class="col mt-3">
                    <p><i class="fa-solid fa-envelope" style="color: #1F4262"></i> Email : <br><a
                            href="">bengkelarilla@gmail.com</a></b>
                    <p><i class="fa-solid fa-location-dot" style="color: #1F4262"></i> Lokasi : <br><a href="">Jl. Puspo Warno No.04, Sogaten, Kec. Manguharjo, 
                         Kota Madiun, Jawa Timur 63129</a></b></p>
                    </p>
                </div>
                <div class="col mt-3">
                    <p><i class="fa-solid fa-link" style="color: #1F4262"></i> Link : <br><a
                            href="">www.bengkelarilla.com</a></p>
                    <p><i class="fa-solid fa-phone" style="color: #1F4262"></i> No Telepon : <br><a href="">085239573655</a></p>
                </div>
            </div>
        </div>
    </section>
    {{-- Akhir Kontak --}}

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
