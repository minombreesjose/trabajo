<?php
  require_once("../../../bd/conexion.php");
?>

<!-- Modal -->
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true"> 
    <div class="modal-dialog">
        <div class="modal-content">            
            <div class="modal-header">
                <h4 class="modal-title" id="myLargeModalLabel">Editar Password</h4>
                <button type="button" class="close" data-dismiss="modal" title="Cerrar">&times;</button>
            </div>

            <div class="modal-body">
              <div class="text">
                <div class="container">
                  <?php
                    $id_usuario = $_REQUEST['id_usuario'];
                    $sql=("SELECT * FROM usuario WHERE id_usuario='$id_usuario'");
                    $res=mysqli_query(conexion::con(), $sql); 
                    foreach ($res as $k) {
                  ?>
                  <form action="../../controllers/update/usu_pass.php" method="POST">
                       <div class="row">
                           <div class="col-md-12">
                             <label>Actualizar Password</label>
                             <input type="hidden" name="id_usuario" value="<?php echo $id_usuario; ?>">
                             <input type="text" name="pass" class="form-control" required="">
                           </div>
                           <div class="col-md-12"><br>
                             <p align="right"><button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-refresh" aria-hidden="true"></i> Actualizar</button></p>
                           </div>                           
                       </div>
                  </form>
                  <?php } ?>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
       
