
<?php 
  require_once('nabvar.php'); 
  $mail=$_GET['mail']; // leo la variable q estoy enviando
  ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
        <!-- tabla  -->
            <div class="pd-20 card-box">

        	<?php 
              $msj = $_GET['msj'];

              // Mensaje de login
              if ($msj == 'exito') {
              ?>
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                Usuario <strong> <?php echo ("$mail") ?> </strong> Registrado 
              </div>
            <?php } ?>

            <?php 
              $msj = $_GET['msj'];

              // Mensaje de bloqueado
              if ($msj == 'bloqueado') {
              ?>
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                Usuario <strong> Bloqueado</strong>  
              </div>
            <?php } ?>

            <?php 
              $msj = $_GET['msj'];

              // Mensaje de bloqueado
              if ($msj == 'activado') {
              ?>
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                Usuario <strong> Activado</strong>  
              </div>
            <?php } ?>

            <?php 
              $msj = $_GET['msj'];

              // Mensaje de bloqueado
              if ($msj == 'actualizado') {
              ?>
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                <strong>Exito</strong> Password Actualizado 
              </div>
            <?php } ?>
           

           <!--Tabla de Consulta de Usuario -->
            <h4>Usuarios del Sistema</h4><br>
            <p align="right"><a href="#" data-toggle="modal" data-target="#user" class="btn btn-primary"><i class="icon-copy fa fa-user-circle" aria-hidden="true"></i> Crear</a></p>
             <table class="data-table table stripe hover nowrap">
              <thead>
             	<tr>
             		<th>Usuario</th>
                 <th>Nombre y Apellido</th>
             		<th>Rol</th>
             		<th>Estado</th>
             	</tr>
             </thead>
             <tbody>

             	<?php
             	   $sql = ("SELECT * FROM usuario INNER JOIN empleado ON usuario.id_empleado=empleado.id_empleado"); 
             	   $result=mysqli_query(conexion::con(), $sql);
             	   foreach ($result as $usuario) {
             	?>
             	<tr>
             		<td><?php echo $usuario['usuario']; ?></td>
                <td><?php echo utf8_encode($usuario['nombre_completo']);?></td>
             		<td><?php if ($usuario['tipo']=='1') {
             			echo "Administrador";
             		}elseif ($usuario['tipo']=='2') {
             			echo "Operador";
             		} ?></td>
             		<td>
                    <a href="javascript:void(0)" onclick="editar('<?php echo $usuario['id_usuario']; ?>')" class="btn btn-primary" title="Añadir"><i class="icon-copy fa fa-edit" aria-hidden="true"></i></a>
             			<?php if ($usuario['estatus']=='1') {?>
             				<a href='../../controllers/bloquear/bloquear_usuario.php?id_usuario=<?php echo $usuario["id_usuario"]; ?>' class="btn btn-success"><i class="icon-copy fa fa-unlock" aria-hidden="true"></i></a>
             			<?php }elseif ($usuario['estatus']=='0') {?>
             				<a href="../../controllers/activar/activar_usuario.php?id_usuario=<?php echo $usuario["id_usuario"]; ?>" class="btn btn-danger"><i class="icon-copy fa fa-lock" aria-hidden="true"></i></a>
             			<?php } ?>
             		</td>
             	</tr>
                <?php } ?>
             </tbody>
             </table>

           <!--Fin de Tabla de Consulta de Usuario -->


        </div>
      </div>
    
<br>

<!-- Modal Consulta -->
<div class="modal fade" id="user" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myLargeModalLabel">Registro de Usuario</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
       <form method="POST" action="../../controllers/registro/usuario.php">
                  
                <div class="row">
                   <div class="col-md-6">
                    <label>Empleado</label>
                    <select name="id_empleado" class="form-control" required="">
                            <option value="">Seleccione</option>
                            <?php 
                                  $con1   = ("SELECT * FROM usuario");
                                  $resul2 = mysqli_query(conexion::con(), $con1);
                                            
                                  $id_empleado = [];
                                    foreach ($resul2 as $k) {
                                      $id_empleado[]  = $k['id_empleado'];                        
                                    }
                                                                    
                                  ?>

                                <?php 
                                  $con2   = ("SELECT * FROM empleado WHERE id_empleado NOT IN (".implode(",", $id_empleado).")");
                                  $resul3 = mysqli_query(conexion::con(), $con2);
                                            
                                  foreach ($resul3 as $key) { 
                            ?>  
                              <option value="<?php echo $key['id_empleado']; ?>"><?php echo $key['cedula_empleado']; ?> || <?php echo $key['nombre_completo']; ?></option>
                            <?php } ?>
                    </select>
                   </div>
                   <div class="col-md-6">
                    <label>Usuario</label>
                    <input type="email" name="usuario" id="usuario" onBlur="comprobarUsuario()" class="form-control" placeholder="Correo institucional" required="">
                    <span id="estadocorreousuario"></span>
                   </div>  
                 </div>
                 <hr>
                <div class="row">
                  <div class="col-md-6">
                    <label>Password</label>
                    <input type="Password" name="pass" class="form-control" placeholder="***********" required="">
                  </div>
                  <div class="col-md-6">
                    <label>Tipo de Usuario</label> 
                      <select name="tipo" class="form-control" required="">
                        <option value="">-Seleccione!!!-</option>
                        <option value="1">Administrador</option>
                        <!--<option value="2">Operador</option>-->
                      </select>
                  </div>
                </div>
                    <br>
                    <button type="submit" class="btn btn-success">Guardar</button>
                    
                </form>
            </div>
          </div>
      </div>
    </div>
 
<!-- Editar Campo a traves de un Modal -->
  <div id="divModal"></div>
          <script>
              function editar(id) {
                  var ruta = 'mostrar/editar_pass.php?id_usuario=' + id;
                  $.get(ruta, function (data) {
                      $('#divModal').html(data);
                      $('#myModal').modal('show');
                  });
              }
          </script>
<!-- Fin -->
<?php require_once('footer.php'); ?>