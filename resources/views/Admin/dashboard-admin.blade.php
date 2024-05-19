@extends('.Admin.admin')
@section('contain')

    <!-- /Navigation-->
    <div class="content-wrapper">
        <div class="container-fluid">
            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">My Dashboard</li>
            </ol>
            <div>
                <a href="hallo"></a>
            </div>
    <!-- /.container-wrapper-->
     <!-- Footer -->
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
              <a href="{{ route('logout') }}" class="btn btn-danger" href="#0">Logout</a>
          </div>
      </div>
  </div>
</div>
    
@endsection


</body>

</html>
