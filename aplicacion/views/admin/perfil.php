<?php require_once("nabvar.php"); ?>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Mi Perfil</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="home.php">Inicio</a></li>
									<li class="breadcrumb-item active" aria-current="profile.php">Mi Perfil</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
						<div class="pd-20 card-box height-50-p">
							<div class="profile-photo">
								<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar" title="Cambiar Foto"><i class="fa fa-pencil"></i></a>
								<?php 
									$foto_emplead = ("SELECT * FROM foto_usuario WHERE id_usuario = '$id'");
									$result=mysqli_query(conexion::con(), $foto_emplead);
									foreach ($result as $foto_perfil) {
								?>
								<div class="img-container">
									<img src="../../controllers/registro/foto/<?php echo $foto_perfil['foto'] ?>">
								</div>
								<?php } ?>
								<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
									<div class="modal-dialog modal-dialog-centered" role="document">
										<div class="modal-content">
											<div class="modal-header">
								                <h4><p align="center" title="Detalles del Activo">Cambiar Foto</p></h4>
								                <button type="button" class="close" data-dismiss="modal">&times;</button>
								            </div>
											<div class="modal-body pd-5">
											  <form action="../../controllers/registro/cambiar_foto_perfil_admin.php" method="POST" enctype="multipart/form-data">
							                     <input type="hidden" name="id_usuario" value="<?php echo $id; ?>">
							                     <input type="file" name="fileToUpload" id="fileToUpload" class="form-control"  required><br>
							                     <p align="right"><button type="submit" class="btn btn-primary">Actualizar</button></p>
							                  </form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php 
							    $empleado = ("SELECT * FROM usuario WHERE id_usuario = '$id'");
								$result=mysqli_query(conexion::con(), $empleado);
								foreach ($result as $detalles) {
							?>
							<div class="profile-info">
								<h5 class="mb-20 h5 text-blue">Información</h5>
								<ul>
									<li>
										<?php echo $detalles['usuario']; ?>
									</li>
								</ul>
							</div>
						    <?php } ?>
						</div>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="card-box height-50-p overflow-hidden">
							<div class="profile-tab height-50-p">
								<div class="tab height-50-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Cambiar Contraseña</a>
										</li>
									</ul>
									<div class="tab-content">
										<!-- Timeline Tab start -->
										<div class="tab-pane fade show active" id="timeline" role="tabpanel">
											<div class="pd-20">
												<div class="profile-timeline">
													<div class="profile-timeline-list">
													  <?php require_once("../alertas/alert.php"); ?>
													  <form id="reg-form" method="POST" action="../../controllers/update/cambio_password_admin.php" autocomplete="off">
											              <label>Contraseña Actual</label>
											              <input type="hidden" name="id_usuario" value="<?php echo $id; ?>">
											              <input type="password" name="password_actual" class="form-control input-md" required="">
											              <label>Nueva Contraseña</label>
											              <input type="password" name="nuevo_password" minlength="8" id="pass_1" class="form-control input-md" required>
											              <label>Confirmar la Nueva Constraseña</label>
											              <input type="password" name="repita_password" minlength="8" id="pass_2"  class="form-control input-md" required>
											              <br>
											              <button type="submit" class="btn btn-primary">Guardar Cambios</button>
											           </form>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

<?php require_once("footer.php"); ?>