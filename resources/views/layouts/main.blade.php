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
          .navbar-nav.ml-auto .nav-link {
              color: black; /* Mengubah warna teks menjadi hitam */
          }
      </style>
        <div class="container">
            <a class="navbar-brand" href="/halaman-utama"><img src="/img/logo-navbar.png" alt="" width="60" height="43" alt="Logo">Bengkel Arilla</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ $title === 'Beranda' ? 'active' : '' }}" href="/halamanutama">Beranda</a>
                    </li>
                    <ul class="navbar-nav ms-auto">
                         <li class="nav-item">
                             <a class="nav-link {{ $title === 'produk' ? 'active' : '' }}" href="/produk">Produk</a>
                         </li>
                    </li>
                  
                        <a class="nav-link {{ $title === 'Kontak' ? 'active' : '' }}" href="/kontak">Hubungi Kami</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle {{ $title === 'User' ? 'active' : '' }}"
                            data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">User</a>
                        <ul class="dropdown-menu">
                            @guest
                                <li><a class="dropdown-item" href="/log">Login</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="/register">Register</a></li>
                            @endguest
                            @auth
                                <li>
                                    <a class="dropdown-item" href="/logout"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                                </li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endauth
                        </ul>
                    </li>                    
                    <style>
                        .dropdown-menu.show {
                            --bs-dropdown-link-active-bg: #dc3545;
                        }
                    </style>
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
</body>

</html>
