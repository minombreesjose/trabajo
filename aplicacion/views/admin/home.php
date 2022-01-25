<?php require_once("nabvar.php"); ?>

	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">

			<div class="title pb-20">
				<h2 class="h3 mb-0">Sistema WEB - Derivados Mineros, C.A</h2>
			</div>

			<div class="row pb-10">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						    <br>
							<div class="row">
								<div class="col-md-1"></div>
								<div class="col-md-3">
									<img src="../img/iconos/personal.png">
								</div>
								<div class="col-md-7">
									<center>
										<?php 
										   $sql=("SELECT * FROM empleado");
										   $res=mysqli_query(conexion::con(), $sql);
										   $cant_benef=$res->num_rows;
										?>
										<span class="badge badge-pill badge-success">
											<?php echo $cant_benef; ?>
										</span>
										<h5><b>Empleados</b></h5>
									</center>
									<center><a href="consulta_empleado.php">Ver</a></center>
								</div>
							</div>
							<br>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						    <br>
							<div class="row">
								<div class="col-md-1"></div>
								<div class="col-md-3">
									<img src="../img/iconos/usuario.png">
								</div>
								<div class="col-md-7">
									<center>
										<?php 
										   $sql=("SELECT * FROM usuario");
										   $res=mysqli_query(conexion::con(), $sql);
										   $cant_user=$res->num_rows;
										?>
										<span class="badge badge-pill badge-success">
											<?php echo $cant_user; ?>
										</span>
										<h5><b>Usuarios</b></h5>
									</center>
									<center><a href="consultar_usuario.php">Ver</a></center>
								</div>
							</div>
							<br>
					</div>
				</div>
			</div>
<center>
	<img src="../img/perfil-cinco-principales-companias-mineras-Canada-7950.jpg" class="rounded" width="100%">
</center>
<br>


			

<?php require_once("footer.php"); ?>