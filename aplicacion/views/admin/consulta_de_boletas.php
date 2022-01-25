<?php require_once("nabvar.php"); ?>

<div class="main-container">
  <div class="pd-ltr-20">
    <div class="card-box pd-20 height-50-p mb-30">
      <div class="row align-items-center">
        <div class="col-md-12">
          <?php require_once("../alertas/alert.php"); ?>
          <h4>Consulta de Boleta de Pago Generadas</h4>
          <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#Medium-modal" type="button">
            Consulta Filtrada     
          </a><hr>
          

          <table class="data-table table stripe hover nowrap">
              <thead>
             	<tr>
             	<th>Numero de Boleta</th>
             	<th>DNI</th>
                <th>Nombre Completo</th>
                <th>Fecha de la Boleta</th>
                <th>Acciones</th>
             	</tr>
             </thead>
             <tbody>
             	<?php
             	   $sql = ("SELECT * FROM boletas_pago INNER JOIN empleado ON boletas_pago.id_empleado=empleado.id_empleado ORDER BY boletas_pago.id_boletas_pago DESC"); 
             	   $result=mysqli_query(conexion::con(), $sql);
             	   foreach ($result as $usuario) {
             	?>
             	<tr>
             		<td><?php echo $usuario['id_boletas_pago']; ?></td>
             		<td><?php echo $usuario['dni']; ?></td>
             		<td><?php echo $usuario['nombre_completo']; ?></td>
             		<td><?php echo $usuario['periodo']; ?></td>
             		<td>
             			<a class="btn btn-secondary" href="#" onclick="window.open('imprimir/boleta_pago.php?id_boletas_pago=<?php echo $usuario['id_boletas_pago']; ?>', 'Boleta de Pago', 'width=700, height=505, ');"><i class="icon-copy fi-print"></i></a>

                        <a href="javascript:void(0)" onclick="eliminar_boleta('<?php echo $usuario['id_boletas_pago']; ?>')" class="btn btn-danger" title="Editar"><i class="icon-copy fa fa-trash" aria-hidden="true"></i></a>
			        </td>
             	</tr>
                <?php } ?>
             </tbody>
         </table>
        </div>
      </div>
    </div>


<div class="modal fade" id="Medium-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myLargeModalLabel">Consulta Filtrada de Boletas por Fecha</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                      <form action="consulta_de_boletas_fecha.php" method="POST">
                        <label><b>Desde</b></label>
                        <input type="date" name="fecha1" class="form-control" required="">
                        <label><b>Hasta</b></label>
                        <input type="date" name="fecha2" class="form-control" required="">
                        <br>
                        <button type="submit" class="btn btn-primary">Consultar</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

<!-- Editar Campo a traves de un Modal -->
<div id="divModal"></div>
          <script>
              function eliminar_boleta(id) {
                  var ruta = 'eliminar/eliminar_boleta.php?id_boletas_pago=' + id;
                  $.get(ruta, function (data) {
                      $('#divModal').html(data);
                      $('#myModal').modal('show');
                  });
              }
          </script>
<!-- Fin -->
<?php require_once("footer.php"); ?>