<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>@yield('tittle')</title>
    <link rel="icon" type="image/png" href="../../dist/img/logoizin.png" />
    <link rel="stylesheet" href="../../dist/css/style.css" />

    <!-- Theme style -->
    <link rel="stylesheet" href="../../dist/css/adminlte.min.css" />

    <!-- Select2 -->
    <link rel="stylesheet" href="../../plugins/select2/css/select2.min.css" />
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
  <body class="hold-transition layout-top-nav">
        
      @include('template.nav') 
      @yield('content') 

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
      const imageInput2 = document.querySelector("#image2");
      var wVideo2 = document.querySelector("#webcamVideo2");
      var wCanvas2 = document.querySelector("#webcamCanvas2");

      async function startCamera2() {
        var stream = null;
        try {
          stream = await navigator.mediaDevices.getUserMedia({
            video: true,
            audio: false,
          });
        } catch (error) {
          alert(error);
          return;
        }

        wVideo2.srcObject = stream;
      }

      function ambilGambar2() {
        wCanvas2.getContext("2d").drawImage(wVideo2, 0, 0, 200, 300);
        var imageData2 = wCanvas2.toDataURL("image/jpg");
        console.log(imageData2);

        const dataUrl = wCanvas2.toDataURL("image/jpg");
        imageInput2.value = dataUrl;
      }

      const imageInput = document.querySelector("#image");
      var wVideo = document.querySelector("#webcamVideo");
      var wCanvas = document.querySelector("#webcamCanvas");

      async function startCamera() {
        var stream = null;
        try {
          stream = await navigator.mediaDevices.getUserMedia({
            video: true,
            audio: false,
          });
        } catch (error) {
          alert(error);
          return;
        }

        wVideo.srcObject = stream;
      }

      function ambilGambar() {
        wCanvas.getContext("2d").drawImage(wVideo, 0, 0, 200, 300);
        var imageData = wCanvas.toDataURL("image/jpg");
        console.log(imageData);

        const dataUrl = wCanvas.toDataURL("image/jpg");
        imageInput.value = dataUrl;
      }

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
          });
        });

        //Initialize Select2 Elements
        $(".select2").select2({
          theme: "bootstrap4",
        });

        const loginText = document.querySelector(".title-text .login");
        const loginForm = document.querySelector("form.login");
        const loginBtn = document.querySelector("label.login");
        const signupBtn = document.querySelector("label.signup");
        const signupLink = document.querySelector("form .signup-link a");
        signupBtn.onclick = () => {
          loginForm.style.marginLeft = "-50%";
          loginText.style.marginLeft = "-50%";
        };
        loginBtn.onclick = () => {
          loginForm.style.marginLeft = "0%";
          loginText.style.marginLeft = "0%";
        };
        signupLink.onclick = () => {
          signupBtn.click();
          return false;
        };
      });
    </script>
  </body>
</html>
