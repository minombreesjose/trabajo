<?php require_once("nabvar.php"); ?>
<?php $id_empleado=$_GET['id_empleado']; ?>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Detalles del Empleado</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="home.php">Inicio</a></li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
						<div class="pd-20 card-box height-50-p">
							<?php 
							    $foto_emplead = ("SELECT * FROM empleado WHERE id_empleado = '$id_empleado'");
							    //die($foto_emplead);
								$result=mysqli_query(conexion::con(), $foto_emplead);
								foreach ($result as $var) {
						    ?>
								<h5 class="mb-20 h5 text-blue">Información</h5><hr>
								<b>DNI:</b> <?php echo $var['dni']; ?><br>
								<b>Empleado:</b> <?php echo $var['nombre_completo']; ?><br>
								<b>Fecha de Nacimiento:</b> <?php echo $var['fecha_nacimiento']; ?><br>
								<b>Estado Civil:</b> <?php echo $var['estado_civil']; ?><br>
								<b>Fecha de Ingreso:</b> <?php echo $var['fecha_ingreso']; ?><br>
								<b>Telefono:</b> <?php echo $var['telefono_empleado']; ?><br>
								<b>Email:</b> <?php echo $var['correo']; ?><br>
								<b>Dirección:</b> <?php echo $var['direccion_empleado']; ?>
						    <?php } ?>
						</div>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="card-box height-50-p overflow-hidden">
							<div class="profile-tab height-50-p">
								<div class="tab height-50-p">
									<ul class="nav nav-tabs customtab" role="tablist">
										<li class="nav-item">
											<a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">
												Familia
											</a>
										</li>
									</ul>
									<div class="tab-content">
										<!-- Timeline Tab start -->
										<div class="tab-pane fade show active" id="timeline" role="tabpanel">
											<div class="pd-20">
												<p align="right">
													 <a href="javascript:void(0)" onclick="agregar_familia('<?php echo $id_empleado; ?>')" class="btn btn-primary" title="Editar"><i class="icon-copy fa fa-users" aria-hidden="true"></i></a>
												</p>
												<table class="data-table table stripe hover nowrap">
									              <thead>
									             	<tr>
									             		<th>DNI</th>
									                    <th>Nombre Completo</th>
									             		<th>Fecha N.</th>
										                <th>Edad</th>
										                <th>Parentesco</th>
										                <th>Acciones</th>
									             	</tr>
									             </thead>
									             <tbody>
                                                    <?php
									             	   $sql = ("SELECT * FROM familia WHERE id_empleado='$id_empleado'"); 
									             	   $result=mysqli_query(conexion::con(), $sql);
									             	   foreach ($result as $usuario) {
									             	   $fechanacimiento=$usuario['fecha_nacimiento'];
									             	?>
									             	<tr>
									             	<td><?php echo $usuario['dni']; ?></td>
									                <td><?php echo utf8_encode($usuario['nombre']);?> <?php echo utf8_encode($usuario['apellido']);?></td>
									                <td><?php echo $usuario['fecha_nacimiento']; ?></td>
									                <td>
									                	<?php 
									                        $fecha_nacimiento = new DateTime($fechanacimiento);
									                        $hoy = new DateTime();
									                        $edad = $hoy->diff($fecha_nacimiento);
									                        echo $edad=$edad->y; 
									                        echo "&nbsp";
									                        echo "años";
								                         ?>
									                </td>
									                <td><?php echo $usuario['parentesco']; ?></td>
									                <td>
		<a href="../../controllers/eliminar/familia.php?id_familia=<?php echo $usuario['id_familia']; ?>&id_empleado=<?php echo $id_empleado; ?>" class="btn btn-danger"><i class="icon-copy fa fa-minus-circle" aria-hidden="true"></i></a>
									                </td>
									                  
									             	</tr>
									                <?php } ?>
									             </tbody>
									             </table>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

<!-- Editar Campo a traves de un Modal -->
<div id="divModal"></div>
          <script>
              function agregar_familia(id) {
                  var ruta = 'mostrar/familia1.php?id_empleado=' + id;
                  $.get(ruta, function (data) {
                      $('#divModal').html(data);
                      $('#myModal').modal('show');
                  });
              }
          </script>
<!-- Fin -->
<?php require_once("footer.php"); ?>
