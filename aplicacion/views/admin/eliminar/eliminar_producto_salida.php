<?php
  require_once("../../../bd/conexion.php");
?>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
     <div class="modal-dialog">
        <div class="modal-content">
            <?php  
                   $id_salida_mercancia = $_REQUEST['id_salida_mercancia'];
            ?>
            <div class="modal-body">
                <div class="modal-body text-center font-18">
                      <h4 class="padding-top-30 mb-30 weight-500">Deseas realmente eliminar este registro?</h4>
                      <div class="padding-bottom-30 row" style="max-width: 170px; margin: 0 auto;">
                        <div class="col-6">
                          <button type="button" class="btn btn-danger border-radius-100 btn-block confirmation-btn" data-dismiss="modal"><i class="fa fa-times"></i></button>
                          NO
                        </div>
                        <div class="col-6">
                          <form action="../../controllers/eliminar/eliminar_producto_salida.php" method="POST">
                              <input type="hidden" name="id_salida_mercancia" value="<?php echo $id_salida_mercancia; ?>">
                          
                          <button type="submit" class="btn btn-success border-radius-100 btn-block confirmation-btn"><i class="fa fa-check"></i></button>
                          SI
                          </form>
                        </div>
                      </div>
                    </div>
            </div>
            </div>
        </div>
    </div>
</div>

