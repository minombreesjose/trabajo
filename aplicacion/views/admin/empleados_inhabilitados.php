
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
              if ($msj == 'Inabilitado') {
              ?>
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                Empleado <strong> Inabilitado</strong>  
              </div>
            <?php } ?>

            <?php 
              $msj = $_GET['msj'];

              // Mensaje de bloqueado
              if ($msj == 'Habilitado') {
              ?>
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
                Empleado <strong> Habilitado</strong>  
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
                Datos <strong> Actualizados</strong>  
              </div>
            <?php } ?>
           
           <a href="consulta_empleado.php"><i class="icon-copy fa fa-mail-reply" aria-hidden="true"></i> <b>Empleados Activos</b></a>
           <p align="right">
              <a class="btn btn-secondary" href="#" onclick="window.open('imprimir/empleado_inhabilitado.php', 'Nuestros Empleados', 'width=700, height=505, ');"><i class="icon-copy fi-print"></i> Imprimir
              </a>
            </p>
           <!--Tabla de Consulta de Usuario -->
            <h4>Nuestros Empleados Inhabilitados</h4><br>
            
             <table class="data-table table stripe hover nowrap">
              <thead>
             	<tr>
             		<th>C.I.</th>
                <th>Nombre Completo</th>
             		<th>Telefono</th>
                <th>Fecha Ingreso</th>
                <th>Correo</th>
                <th>Estatus</th>
                <th>Acciones</th>
             	</tr>
             </thead>
             <tbody>

             	<?php
             	   $sql = ("SELECT * FROM empleado WHERE status='1'"); 
             	   $result=mysqli_query(conexion::con(), $sql);
             	   foreach ($result as $usuario) {
             	?>
             	<tr>
             		<td><?php echo $usuario['ci']; ?></td>
                <td><?php echo $usuario['nombre'];?> <?php echo $usuario['apellido'];?></td>
                <td><?php echo $usuario['telefono']; ?></td>
                <td><?php echo $usuario['fecha_ingreso']; ?></td>
                <td><?php echo $usuario['correo']; ?></td>
             		<td><?php if ($usuario['status']=='0') {
             			echo "Activo";
             		}elseif ($usuario['status']=='1') {
             			echo "Inhabilitado";
             		} ?></td>
             		<td>
                  <a href="javascript:void(0)" onclick="editar_empleado('<?php echo $usuario['id_empleado']; ?>')" class="btn btn-success" title="Editar"><i class="icon-copy fa fa-edit" aria-hidden="true"></i></a>
             			<?php if ($usuario['status']=='1') {?>
             				<a href='../../controllers/bloquear/habilitar_empleado.php?id_empleado=<?php echo $usuario["id_empleado"]; ?>' class="btn btn-success">Habilitar</a>
             			<?php }elseif ($usuario['status']=='0') {?>
             				<a href="../../controllers/activar/inabilitar_empleado.php?id_empleado=<?php echo $usuario["id_empleado"]; ?>" class="btn btn-danger">Inhabilitar</a>
             			<?php } ?>
             		</td>
             	</tr>
                <?php } ?>
             </tbody>
             </table>
           <!--Fin de Tabla de Consulta de Usuario -->
        </div>
      </div>    


<!-- Editar Campo a traves de un Modal -->
<div id="divModal"></div>
          <script>
              function editar_empleado(id) {
                  var ruta = 'mostrar/editar_empleado.php?id_empleado=' + id;
                  $.get(ruta, function (data) {
                      $('#divModal').html(data);
                      $('#myModal').modal('show');
                  });
              }
          </script>
<!-- Fin -->

<!-- Editar Campo a traves de un Modal -->
<div id="divModal"></div>
          <script>
              function agregar_familia(id) {
                  var ruta = 'mostrar/familia.php?id_empleado=' + id;
                  $.get(ruta, function (data) {
                      $('#divModal').html(data);
                      $('#myModal').modal('show');
                  });
              }
          </script>
<!-- Fin -->
<br>
<?php require_once('footer.php'); ?>