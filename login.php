<?php
require 'controller/koneksi.php';

session_start();
if (isset($_SESSION["id"])) {
     header("Location:index.php");
}

$login = new Login();

if (isset($_POST["submit"])) {
     $result = $login->login($_POST["usernameemail"], $_POST["password"]);

     if ($result == 1) {
          $_SESSION["login"] = true;
          $_SESSION["id"] = $login->idUser();
          header("Location:index.php");
     } elseif ($result == 10) {
          echo
          "<script> alert('Password Salah'); </script>";
     } elseif ($result == 100) {
          echo
          "<script> alert('User belum register'); </script>";
     }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>LOGIN</title>

     <!-- Google Font: Source Sans Pro -->
     <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
     <!-- icheck bootstrap -->
     <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
     <!-- Theme style -->
     <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page ">
     <div class="login-box">
          <!-- /.login-logo -->
          <div class="card card-outline card-primary">
               <div class="card-header text-center">
                    <a class="h1 text-primary"><b>LOGIN</b></a>
               </div>
               <div class="card-body">
                    <p class="login-box-msg">Login Untuk Akses Halaman Admin</p>

                    <form method="post">
                         <div class="input-group mb-3">
                              <input type="text" class="form-control" placeholder="Masukan Username Atau Email" name="usernameemail">
                              <div class="input-group-append">
                                   <div class="input-group-text">
                                        <span class="fas fa-user"></span>
                                   </div>
                              </div>
                         </div>
                         <div class="input-group mb-3">
                              <input type="password" class="form-control" placeholder="Masukan Password" name="password">
                              <div class="input-group-append">
                                   <div class="input-group-text">
                                        <span class="fas fa-lock"></span>
                                   </div>
                              </div>
                         </div>
                         <div class="row">
                              <div class="col-8">
                               Belum Punya Akun?    <a href="regis.php " class="text-primary">daftar disini</a> 
                              </div>
                              <!-- /.col -->
                              <div class="col-4">
                                   <button type="submit" class="btn btn-primary btn-block" name="submit">Masuk</button>
                              </div>
                              <!-- /.col -->
                         </div>
                    </form>


                    <!-- /.social-auth-links -->




               </div>
               <!-- /.card-body -->
          </div>
          <!-- /.card -->
     </div>
     <!-- /.login-box -->

     <!-- jQuery -->
     <script src="plugins/jquery/jquery.min.js"></script>
     <!-- Bootstrap 4 -->
     <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
     <!-- AdminLTE App -->
     <script src="dist/js/adminlte.min.js"></script>
</body>

</html>