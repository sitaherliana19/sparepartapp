@extends('.Admin.admin')
@section('contain')


<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin-dashboard">Dashboard</a>
            </li>
        </ol>
        <div class="contain">
            <div style="margin-left: 8px; font-size: 18px; font-weight: bold;">
                <p>Selamat Datang Di Bengkel Arilla</p>
                <span style="font-size: 14px; font-weight: normal;">
                    Hai, Selamat datang di halaman Administrator
                    Silahkan klik menu dibawah untuk mengelola
                    website.  
                </span>
            </div>
            <div class="row mt-4">
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="card-title">Data Pelanggan</h5>
                                    <p class="card-text">Klik untuk mengelola data pelanggan</p>
                                </div>
                                <div>
                                    <i class="fa-solid fa-fw fa-clipboard-list fa-3x"></i>
                                </div>
                            </div>
                            <a class="btn mt-3" style="background-color: #804343; color: white;"  href="/data_pelanggan">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="card-title">Produk</h5>
                                    <p class="card-text">Klik untuk mengelola produk</p>
                                </div>
                                <div>
                                    <i class="fas fa-boxes fa-3x"></i>
                                </div>
                            </div>
                            <a class="btn mt-3" style="background-color: #804343; color: white;" href="/products">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="card-title">Barang Masuk</h5>
                                    <p class="card-text">Klik untuk mengelola barang masuk</p>
                                </div>
                                <div>
                                    <i class="bi bi-arrow-left fa-3x"></i>
                                </div>
                            </div>
                            <a class="btn mt-3" style="background-color: #804343; color: white;" href="/barang_masuk">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="card-title">Barang Keluar</h5>
                                    <p class="card-text">Klik untuk mengelola barang keluar</p>
                                </div>
                                <div>
                                    <i class="bi bi-arrow-right fa-3x"></i>
                                </div>
                            </div>
                            <a class="btn mt-3" style="background-color: #804343; color: white;" href="/barang_keluar">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="card-title">Data Pesanan</h5>
                                    <p class="card-text">Klik untuk mengelola data pesanan</p>
                                </div>
                                <div>
                                    <i class="fas fa-shipping-fast fa-3x"></i>
                                </div>
                            </div>
                            <a class="btn mt-3" style="background-color: #804343; color: white;" href="/data_pesanan">Lihat Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h5 class="card-title">Laporan</h5>
                                    <p class="card-text">Klik untuk mengelola laporan masuk dan laporan keluar</p>
                                </div>
                                <div>
                                    <i class="bi bi-bar-chart fa-3x"></i>
                                </div>
                            </div>
                            <a class="btn mt-3" style="background-color: #804343; color: white;" href="/laporan">Lihat Detail</a>
                        </div>
                    </div>
                </div>
            </div> 
            <footer class="sticky-footer">
                <div class="container">
                    <div class="text-center">
                        <small>Copyright © </small>
                    </div>
                </div>
            </footer>
@endsection

