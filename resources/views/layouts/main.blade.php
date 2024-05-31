<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="/img/logotitle.png">
    {{-- Bootsrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    {{-- CSS --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="/login/style.css">
    
</head>

<body>

    {{-- navbar-beranda --}}
    <nav class="navbar navbar-expand-lg shadow p-3 navbar-dark" style="background-color: #804343">
     <style>
          .navbar-brand img {
              margin-right: 10px; 
              
          }
        </style>
        <div class="container">
            <a class="navbar-brand" href="/halaman-utama">
                <img src="/img/logo-navbar.png" alt="" width="60" height="43" alt="Logo">Bengkel Arilla
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Beranda">
                        <a class="nav-link" href="/halamanutama">
                            <span class="nav-link-text">Beranda</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="product">
                        <a class="nav-link" href="/produk">
                            <span class="nav-link-text">Produk</span>
                        </a>
                    </li>
                    <li class="nav-item" data-toggle="tooltip" data-placement="right" title="product">
                        <a class="nav-link" href="/contact">
                            <span class="nav-link-text">Hubungi Kami</span>
                        </a>
                    </li>
                    @guest
                        <!-- Menampilkan tombol login dan register jika pengguna belum login -->
                        <li class="nav-item">
                            <button class="btn btn-outline-light mr-2" style="background-color: #804343; color: white;" onclick="window.location.href='/log'">Login</button>
                            <button class="btn btn-light" style="background-color: #804343; color: white;" onclick="window.location.href='/register'">Register</button>
                            <style>
                                .btn:hover {
                                    transform: scale(1.05); /* Memperbesar tombol saat dihover */
                                }
                            </style>
                        </li>
                    @endguest
                    @auth
                        <!-- Menampilkan dropdown jika pengguna sudah login -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->is('logout') ? 'active' : '' }}" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                                <i class="fa fa-user"></i> {{ Auth::user()->name }}
                            </a>                            
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out-alt"></i> Logout
                                    </a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('cart') ? 'active' : '' }}" href="{{ route('cart.index') }}">
                                <i class="fas fa-shopping-cart"></i>
                                <span class="badge badge-pill badge-primary">{{ Auth::user()->cart ? Auth::user()->cart->sum('quantity') : 0 }}</span>
                            </a>                            
                        </li>
                        <style>
                            .dropdown-menu.show {
                                --bs-dropdown-link-active-bg: #dc3545;
                            }
                        </style>
                        
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    {{-- Akhir Navbar --}}

    <div class="">
        @yield('container')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    @yield('scripts')
</body>

</html>

