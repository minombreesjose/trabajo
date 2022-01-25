<?php include("aplicacion/views/validaciones/validaciones.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Derivados Mineros (Dermica)- Bienvenido</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="plantilla/assets/img/favicon.png" rel="icon">
  <link href="plantilla/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="plantilla/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="plantilla/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="plantilla/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="plantilla/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="plantilla/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="plantilla/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="plantilla/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Eterna - v4.7.0
  * Template URL: https://bootstrapmade.com/eterna-free-multipurpose-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Top Bar ======= -->
  <section id="topbar" class="d-flex align-items-center">
    <div class="container d-flex justify-content-center justify-content-md-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope d-flex align-items-center"><a href="mailto:contact@example.com">contact@example.com</a></i>
        <i class="bi bi-phone d-flex align-items-center ms-4"><span>+1 5589 55488 55</span></i>
      </div>
      <div class="social-links d-none d-md-flex align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </section>

  <!-- ======= Header ======= -->
  <header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between align-items-center">

      <div class="logo">
        <h1><a href="index.html">Derivados Mineros (Dermica)</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="active" href="index.php">Inicio</a></li>
          <li><a href="about.html">Acerca de Nosotros</a></li>
          <li><a href="vacantes.php">Vacantes</a></li>
          <li><a href="#" data-bs-toggle="modal" data-bs-target="#myModal">Subir mi CV</a></li>
          <li><a href="login.php">Acceder Administrador</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->


  <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Subir mi CV</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form action="aplicacion/controllers/registro/enviar_cv.php" method="POST" enctype="multipart/form-data">
          <div class="row">
              <div class="col-lg-6">
                <label>Cedula</label>
                <input type="number" name="cedula" class="form-control" required="">
              </div>
              <div class="col-lg-6">
                <label>Nombres</label>
                <input type="text" name="nombres" onkeypress="return validar(event,this)" class="form-control" required="">
              </div>
              <div class="col-lg-6">
                <label>Apellido</label>
                <input type="text" name="apellido" class="form-control" required="">
              </div>
              <div class="col-lg-6">
                <label>Telefono</label>
                <input type="text" name="telefono" class="form-control" required="">
              </div>
              <div class="col-lg-12">
                <label>Correo</label>
                <input type="email" name="correo" class="form-control" required="">
              </div>
              <div class="col-lg-12">
                <label>Ajuntar CV en PDF</label>
                <input type="file" name="fileToUpload" id="fileToUpload" class="form-control"  required>              
              </div>
          </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Enviar</button>
        </form>
      </div>

    </div>
  </div>
</div>