<?php
  require_once("../../../bd/conexion.php");
?>

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"> 
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">            
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Agregar Hijos a este Empleado</h4>
                <button type="button" class="close" data-dismiss="modal" title="Cerrar">&times;</button>
            </div>

            <div class="modal-body">
              <div class="text">
                <div class="container">
                  <?php
                    $id_empleado = $_REQUEST['id_empleado'];
                    $sql=("SELECT * FROM empleado WHERE id_empleado='$id_empleado'");
                    $res=mysqli_query(conexion::con(), $sql); 
                    foreach ($res as $k) {
                       echo "<div class='alert alert-success'>";
                       echo "<b>","Empleado:","</b>";
                       echo "&nbsp";
                       echo $k['dni'];
                       echo "&nbsp";
                       echo $k['nombre_completo'];
                       echo "</div>";
                    }
                  ?>
                  <hr>
                  <form action="../../controllers/registro/familia1.php" method="POST" autocomplete="on">
                    <div class="row">
                        <div class="col-md-4">
                            <label><b>DNI</b></label>
                            <input type="text" name="dni_f" id="dni_f" onBlur="comprobardniFamilia()" minlength="6" maxlength="8" class="form-control" required>
                            <span id="estadodnifamilia"></span>
                        </div>
                        <div class="col-md-8">
                            <label><b>Nombres</b></label>
                            <input type="hidden" name="id_empleado" value="<?php echo $id_empleado; ?>">
                            <input type="text" name="nombre" class="form-control" required="">
                        </div>
                        <div class="col-md-8">
                            <label><b>Apellidos</b></label>
                            <input type="text" name="apellidos" class="form-control" required="">
                        </div>
                        <div class="col-md-4">
                            <label><b>Fecha de Nacimiento</b></label>
                            <input type="date" name="fecha_nacimiento" class="form-control" required="">
                        </div>
                        <div class="col-md-12">
                            <label><b>Parentesco</b></label>
                            <select name="parentesco" class="form-control" required="">
                              <option value="Hijo(a)">Hijo(a)</option>
                            </select>
                        </div>
                    </div>
                    
                    <br><button type="submit" class="btn btn-primary">Agregar</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
       
