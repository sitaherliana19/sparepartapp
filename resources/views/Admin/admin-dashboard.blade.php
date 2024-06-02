@extends('.Admin.admin')
@section('contain')

<!-- /Navigation-->
<div class="content-wrapper">
    <div class="container-fluid">
        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="/admin-dashboard">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">My Dashboard</li>
        </ol>
        <div class="contain">
            <div style="margin-left: 8px; font-size: 18px; font-weight: bold;">
                <p>Selamat Datang Di Bengkel Arilla</p>
                <span style="font-size: 14px; font-weight: normal;">
                    Hai, Selamat datang di halaman Administrator
                    Silahkan klik menu pilihan yang berada pada kiri untuk mengelola
                    website.  
                </span>
            </div>
            <!-- /.container-wrapper-->
            <footer class="sticky-footer">
                <div class="container">
                    <div class="text-center">
                        <small>Copyright © </small>
                    </div>
                </div>
            </footer>
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fa fa-angle-up"></i>
            </a>
@endsection

</body>
</html>
