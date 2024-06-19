<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Product</title>
   
    <!-- CSS -->
    <link rel="stylesheet" href="/font2/css/all.min.css">

    <!-- FONT -->
    <link href="/login/font-bunny.css" rel="stylesheet">
    <link href="/login/admin.css" rel="stylesheet">

    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda Yakin?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih "Logout" untuk mengakhiri sesi Anda saat ini</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a href="/logout" class="btn btn-danger" href="#0">Logout</a>
          </div>
        </div>
      </div>
    </div>
  </head>
  <footer class="sticky-footer">
    <div class="container">
      <div class="text-center">
        <small>Copyright © </small>
      </div>
    </div>
  </footer>
  <body class="bg-light">
    <main class="container">
      @if (Session::has('success'))
      <div class="pt-3">
        <div class="alert alert-success">
          {{ Session::get('sucess') }}
        </div>
      </div>
      @endif
      @yield('content')
    </main>
  </body>
</html>