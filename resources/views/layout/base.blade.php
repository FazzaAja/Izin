<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('tittle')</title>

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

    <style>
      .image-128x128 {
        width: 120px;
        height: 120px;
      }
    </style>
  
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
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- Select2 -->
<script src="../../plugins/select2/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="../../plugins/moment/moment.min.js"></script>
<script src="../../plugins/inputmask/jquery.inputmask.min.js"></script>
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
          if ($("#addMurid").length) {
            Toast.fire({
              icon: "success",
              title: "Sukses Menambah Murid.",
            });
          }
          if ($("#editMurid").length) {
            Toast.fire({
              icon: "success",
              title: "Sukses Mengubah Murid.",
            });
          }
          if ($("#deleteMurid").length) {
            Toast.fire({
              icon: "success",
              title: "Sukses Menghapus Murid.",
            });
          }
          if ($("#importMurid").length) {
            Toast.fire({
              icon: "success",
              title: "Sukses Mengimport Murid.",
            });
          }
          if ($("#addJurusan").length) {
            Toast.fire({
              icon: "success",
              title: "Sukses Menambah Jurusan.",
            });
          }
          if ($("#editJurusan").length) {
            Toast.fire({
              icon: "success",
              title: "Sukses Mengubah Jurusan.",
            });
          }
          if ($("#deleteJurusan").length) {
            Toast.fire({
              icon: "success",
              title: "Sukses Menghapus Jurusan.",
            });
          }
        });
      });
  
    //Page specific script
    $("#example1")
      .DataTable({
        responsive: true,
        lengthChange: false,
        autoWidth: false,
        buttons: ["pdf", "csv"],
      })
      .buttons()
      .container()
      .appendTo("#example1_wrapper .col-md-6:eq(0)");

    //Initialize Select2 Elements
    $('.select2').select2({
          theme: "bootstrap4",
        })
      
    //Money Euro
    $("[data-mask]").inputmask();


  });
</script>
</body>
</html>