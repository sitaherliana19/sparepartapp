<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Ansonika">
    <title>Admin dashboard</title>

   <!-- Favicons-->
   <link rel="stylesheet" href="/font2/css/all.min.css">

    <!-- FONT -->
    <link href="/login/font-bunny.css" rel="stylesheet">

    <!-- Bootstrap core CSS-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link href="/admin_style/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Main styles -->
    <link href="/login/admin.css" rel="stylesheet">
    <!-- Icon fonts-->
    <link href="/admin_style/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- Plugin styles -->
    <link href="/admin_style/vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Your custom styles -->
    <link href="/admin_style/css/custom.css" rel="stylesheet">
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body class="fixed-nav sticky-footer" id="page-top">
     <!-- Navigation-->
     <nav class="navbar navbar-expand-lg navbar-dark bg-default fixed-top" id="mainNav">
         <style>
             .navbar-brand img {
                 margin-right: 10px; 
                 
             }
             .navbar-nav.ml-auto .nav-link {
                 color: black; /* Mengubah warna teks menjadi hitam */
             }
         </style>
         <a class="navbar-brand"><img src="/img/logo-navbar.png" alt="" width="60" height="36">Bengkel Arilla</a>
         <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
             data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
             aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarResponsive">
             <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
                 <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Beranda">
                     <a class="nav-link" href="/admin-dashboard">
                         <i class="fas fa-fw fa-house"></i>
                         <span class="nav-link-text">Beranda</span>
                     </a>
                 </li>
                 <li class="nav-item" data-toggle="tooltip" data-placement="right" title="DataPelanggan">
                     <a class="nav-link" href="Data Pelanggan">
                         <i class="fa-solid fa-fw fa-clipboard-list"></i> 
                         <span class="nav-link-text">Data Pelanggan</span>
                     </a>
                 </li>
                 <li class="nav-item" data-toggle="tooltip" data-placement="right" title="product">
                     <a class="nav-link" href="/products">
                         <i class="fa-solid fa-fw fa-box"></i> 
                         <span class="nav-link-text">Product</span>
                     </a>
                 </li>
                 
                 <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Laporan">
                     <a class="nav-link" href="/inventory_reports">
                         <i class="fa fa-fw fa-chart-bar"></i> 
                         <span class="nav-link-text">Laporan</span>
                     </a>
                 </li>
                 <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Logout">
                    <a class="nav-link" href="/log" data-toggle="modal" data-target="#logoutModal">
                        <i class="fa fa-fw fa-sign-out-alt"></i> 
                        <span class="nav-link-text">Logout</span>
                    </a>
                </li>
             </ul>
             
         </div>
     </nav>
     <div class="contain">
          @yield('contain')
</div>
</body>

</html>