<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('tittle')</title>
    <link rel="icon" type="image/png" href="../../dist/img/logoizin.png">

    <!-- Google Font: Source Sans Pro -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback"
    />
    <!-- Font Awesome -->
    <link
      rel="stylesheet"
      href="../../plugins/fontawesome-free/css/all.min.css"
    />
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- SweetAlert2 -->
    <link
      rel="stylesheet"
      href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"
    />
    
    <!-- DataTables -->
    <link
      rel="stylesheet"
      href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"
    />
    <link
      rel="stylesheet"
      href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css"
    />
    <link
      rel="stylesheet"
      href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css"
    />
    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css" />

    <!-- Select2 -->
    <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
    <link
      rel="stylesheet"
      href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"
    />
  
  </head>

  <body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
      @include('layout.nav')
      @include('layout.side')
      @yield('content')
    </div>
    <!-- /.content-wrapper -->
    
    @include('layout.footer')

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- SweetAlert2 -->
<script src="../../plugins/sweetalert2/sweetalert2.min.js"></script>

<script>
  $(function () {


    //SweetAlert2 Modal
    $(function () {
        var Toast = Swal.mixin({
          toast: true,
          position: "top-end",
          showConfirmButton: false,
          timer: 3000,
        });

        $(document).ready(function () {
          if ($("#add").length) {
            Toast.fire({
              icon: "success",
              title: "Sukses Menambah Izin.",
            });
          }
          if ($("#edit").length) {
            Toast.fire({
              icon: "success",
              title: "Sukses Mengubah Status Izin.",
            });
          }
          if ($("#delete").length) {
            Toast.fire({
              icon: "success",
              title: "Sukses Menghapus Izin.",
            });
          }
          
        });
      });
  
    //Page specific script
    $("#example1")
      .DataTable({
        "order": [[2, "desc"]],
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["pdf", "excel"],
      })
      .buttons()
      .container()
      .appendTo("#example1_wrapper .col-md-6:eq(0)");

    //Initialize Select2 Elements
    $('.select2').select2({
          theme: "bootstrap4",
        })
  });
</script>
</body>
</html>