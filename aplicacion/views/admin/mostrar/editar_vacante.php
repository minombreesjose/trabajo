<?php
  require_once("../../../bd/conexion.php");
?>

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"> 
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">            
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Editar Vacante</h4>
                <button type="button" class="close" data-dismiss="modal" title="Cerrar">&times;</button>
            </div>

            <div class="modal-body">
              <div class="text">
                <div class="container">
                  <?php
                    $id_vacante = $_REQUEST['id_vacante'];
                    $sql=("SELECT * FROM vacante WHERE id_vacante='$id_vacante'");
                    $res=mysqli_query(conexion::con(), $sql); 
                    foreach ($res as $k) {
                  ?>
                  <hr>
                  <form action="../../controllers/update/vacante.php" method="POST" autocomplete="on">
                    <div class="row">
                        <div class="col-md-12">
                            <label><b>Vacante</b></label>
                            <input type="hidden" name="id_vacante" value="<?php echo $id_vacante; ?>">
                            <input type="text" name="vacante" value="<?php echo $k['vacante']; ?>" class="form-control" required>
                        </div>
                        <div class="col-md-12">
                            <label><b>Descripción</b></label>
                            <textarea name="descripcion" class="form-control" required=""><?php echo $k['descripcion']; ?></textarea>
                        </div>
                    </div>
                    <?php } ?>
                    <br>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                  </form>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
       
