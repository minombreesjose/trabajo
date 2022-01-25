<?php
  require_once("../../../bd/conexion.php");
?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog">
        <div class="modal-content">
            <?php  
                   $id_boletas_pago = $_REQUEST['id_boletas_pago'];
            ?>
            <div class="modal-body">
            <div class="modal-header">
                <h4><p align="center" title="Detalles del Activo">¿Estas Seguro de Eliminar este Registro?</p></h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div><br>

            <form action="../../controllers/eliminar/eliminar_boleta.php" method="POST">
            <div class="row">
            <div class="col-md-12">
               <input type="hidden" name="id_boletas_pago" value="<?php echo $id_boletas_pago; ?>">
                <p align="center">
                  <button type="submit" class="btn btn-danger">Si</button>           
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </p>
            </div>
            </form>
          </div>
            </div>
        </div>
    </div>
</div>
