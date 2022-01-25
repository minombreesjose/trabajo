<?php
  require_once("../../../bd/conexion.php");
?>

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"> 
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">            
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Editar Datos del Empleado</h4>
                <button type="button" class="close" data-dismiss="modal" title="Cerrar">&times;</button>
            </div>

            <div class="modal-body">
              <div class="text">
                <div class="container">
                  <?php
                    $id_empleado = $_REQUEST['id_empleado'];
                    $sql=("SELECT * FROM empleado INNER JOIN sueldo ON empleado.id_empleado=sueldo.id_empleado WHERE empleado.id_empleado='$id_empleado'");
                    $res=mysqli_query(conexion::con(), $sql); 
                    foreach ($res as $k) {
                  ?>
                  <form action="../../controllers/update/empleado.php" method="POST" autocomplete="on">
                    <div class="row">
                        <div class="col-md-4">
                            <label><b>DNI</b></label>
                            <input type="text" name="ci" id="ci" onBlur="comprobardniEmpleado()" minlength="6" maxlength="8" value="<?php echo $k['ci']; ?>" class="form-control" required>
                            <span id="estadodniempledo"></span>
                        </div>
                        <div class="col-md-4">
                            <label><b>Nombre</b></label>
                            <input type="hidden" name="id_empleado" value="<?php echo $id_empleado; ?>">
                            <input type="text" name="nombre" value="<?php echo $k['nombre']; ?>" class="form-control" required="">
                        </div>
                        <div class="col-md-4">
                            <label><b>Apellido</b></label>
                            <input type="text" name="apellido" value="<?php echo $k['apellido']; ?>" class="form-control" required="">
                        </div>
                        <div class="col-md-4">
                            <label><b>Fecha de Nacimiento</b></label>
                            <input type="date" name="fecha_nacimiento" value="<?php echo $k['fecha_nacimiento']; ?>" class="form-control" required="">
                        </div>
                        <div class="col-md-4">
                            <label><b>Estado Civil</b></label>
                            <select name="estado_civil" class="form-control" required="">
                              <option value="<?php echo $k['estado_civil']; ?>"><?php echo $k['estado_civil']; ?></option>
                              <option value="Casado(a)">Casado(a)</option>
                              <option value="Conviviente">Conviviente</option>
                              <option value="Viudo(a)">Viudo(a)</option>
                              <option value="Soltero(a)">Soltero(a)</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label><b>Fecha de Ingreso</b></label>
                            <input type="date" name="fecha_ingreso" value="<?php echo $k['fecha_ingreso']; ?>" class="form-control" required="">
                        </div>
                        <div class="col-md-4">
                            <label><b>Telefono</b></label>
                            <input type="text" name="telefono" value="<?php echo $k['telefono']; ?>" class="form-control" required="">
                        </div>
                        <div class="col-md-4">
                            <label><b>Correo</b></label>
                            <input type="email" name="correo" id="correo" value="<?php echo $k['correo']; ?>" onBlur="comprobarCorreo()" class="form-control" required>
                            <span id="estadocorreo"></span>
                        </div>
                        <div class="col-md-4">
                            <label><b>Sueldo Base</b></label>
                            <input type="text" name="sueldo" value="<?php echo $k['sueldo']; ?>" class="form-control" required="">
                        </div>
                    </div>
                    
                    <label><b>Dirección</b></label>
                    <textarea class="form-control" name="direccion" required=""><?php echo $k['direccion']; ?></textarea>
                    
                    <br><button type="submit" class="btn btn-primary">Actualizar</button>
                  </form>
                  <?php } ?>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
       
