<?php error_reporting(0); ?>


<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>Autenticación de Usuario</title>

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="aplicacion/plantilla/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="aplicacion/plantilla/vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="aplicacion/plantilla/vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>	
<style type="text/css">
	body {

    }
</style>
<body class="login-page">
	<div class="login-header box-shadow">
		<div class="container-fluid d-flex justify-content-between align-items-center">
			<div class="brand-logo">
				<a href="index.php">
					
				</a>
			</div>
		</div>
	</div>
	<div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-md-3">
				</div>
				<div class="col-md-6 col-lg-5">
					<div class="login-box bg-white box-shadow border-radius-10">
						<div class="login-title">
							<center><b>Derivados Mineros, C.A</b></center><br>
							<h2 class="text-center text-primary">Autenticación de Usuario</h2>
							<center><a href="index.php">Volver al Inicio</a></center>
						</div>
						<?php require_once("aplicacion/views/alertas/alert.php"); ?>
						<form method="POST" action="aplicacion/controllers/autenticar.php" class="form">
							<div class="input-group custom">
								<input type="email" name="usuario" class="form-control form-control-lg" placeholder="Username" required="">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
								</div>
							</div>
							<div class="input-group custom">
								<input type="password" name="pass" class="form-control form-control-lg" placeholder="*********" required="">
								<div class="input-group-append custom">
									<span class="input-group-text"><i class="dw dw-padlock1"></i></span>
								</div>
							</div>
							<div class="row pb-30">
								<div class="col-4">
								</div>
								<div class="col-8">
									<!--<div class="forgot-password"><a href="forgot-password.html">Olvidastes mi Password</a></div>-->
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<div class="input-group mb-0">
										<button type="submit" class="btn btn-primary btn-lg btn-block" >Acceder</button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="aplicacion/plantilla/vendors/scripts/core.js"></script>
	<script src="aplicacion/plantilla/vendors/scripts/script.min.js"></script>
	<script src="aplicacion/plantilla/vendors/scripts/process.js"></script>
	<script src="aplicacion/plantilla/vendors/scripts/layout-settings.js"></script>
</body>
</html>



	
