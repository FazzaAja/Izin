<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <title>@yield('tittle')</title>
    <link rel="icon" type="image/png" href="../../dist/img/logoizin.png">
    <link rel="stylesheet" href="../../dist/css/style.css">
    

    <!-- Theme style -->
   <link rel="stylesheet" href="../../dist/css/adminlte.min.css" />

    <!-- Select2 -->
    <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css">
    <link
      rel="stylesheet"
      href="../../plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css"
    />
    <!-- SweetAlert2 -->
    <link
      rel="stylesheet"
      href="../../plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css"
    />

  
</head>
<body class="hold-transition layout-top-nav ">
  {{-- <div class="wrapper"> --}}
      @include('template.nav')
      @yield('content')
  {{-- </div> --}}
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
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
                  if ($("#gagal").length) {
                     Toast.fire({
                     icon: "error",
                     title: "Login Gagal.",
                     });
                  }
                  })
               });

            //Initialize Select2 Elements
            $('.select2').select2({
                  theme: "bootstrap4",
            })
            
            const loginText = document.querySelector(".title-text .login");
            const loginForm = document.querySelector("form.login");
            const loginBtn = document.querySelector("label.login");
            const signupBtn = document.querySelector("label.signup");
            const signupLink = document.querySelector("form .signup-link a");
            signupBtn.onclick = (()=>{
            loginForm.style.marginLeft = "-50%";
            loginText.style.marginLeft = "-50%";
            });
            loginBtn.onclick = (()=>{
            loginForm.style.marginLeft = "0%";
            loginText.style.marginLeft = "0%";
            });
            signupLink.onclick = (()=>{
            signupBtn.click();
            return false;
            });
         });
  
</script>
</body>
</html>