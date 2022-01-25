
<?php 
  require_once('nabvar.php'); 
  $mail=$_GET['mail']; // leo la variable q estoy enviando
  ?>

<div class="main-container">
    <div class="pd-ltr-20 xs-pd-20-10">
        <div class="min-height-200px">
        <!-- tabla  -->
            <div class="pd-20 card-box">
           
           <a href="#"><i class="icon-copy fa fa-mail-reply" aria-hidden="true"></i> <b>Vacantes Disponibles</b></a>
           <a href="vacantes_cerradas.php"><i class="icon-copy fa fa-mail-reply" aria-hidden="true"></i> <b>Vacantes Cerradas</b></a>
           <!--Tabla de Consulta de Usuario -->
            <h4>Nuevas vacantes</h4><br>
            
             <table class="data-table table stripe hover nowrap">
              <thead>
             	<tr>
             		<th>Vacante</th>
                <th>Descripción</th>
             		<th>Fecha y Hora de Publicación</th>
                <th>Acciones</th>
             	</tr>
             </thead>
             <tbody>

             	<?php
             	   $sql = ("SELECT * FROM vacante WHERE status='0'"); 
             	   $result=mysqli_query(conexion::con(), $sql);
             	   foreach ($result as $usuario) {
             	?>
             	<tr>
             		<td><?php echo $usuario['vacante']; ?></td>
                <td><?php echo $usuario['descripcion'];?></td>
                <td><?php echo $usuario['fecha_publicacion']; ?> <?php echo $usuario['hora']; ?></td>
             		<td>
                  <a href="javascript:void(0)" onclick="editar_vacante('<?php echo $usuario['id_vacante']; ?>')" class="btn btn-success" title="Editar"><i class="icon-copy fa fa-edit" aria-hidden="true"></i></a>
             			<?php if ($usuario['status']=='1') {?>
             				<a href='../../controllers/bloquear/habilitar_empleado.php?id_empleado=<?php echo $usuario["id_empleado"]; ?>' class="btn btn-success">Habilitar</a>
             			<?php }elseif ($usuario['status']=='0') {?>
             				<a href="../../controllers/eliminar/cerrar_vacante.php?id_vacante=<?php echo $usuario["id_vacante"]; ?>" class="btn btn-danger">Cerrar</a>
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
              function editar_vacante(id) {
                  var ruta = 'mostrar/editar_vacante.php?id_vacante=' + id;
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