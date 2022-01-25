<?php require_once("nabvar.php"); ?>

<div class="main-container">
  <div class="pd-ltr-20">
    <div class="card-box pd-20 height-50-p mb-30">
      <div class="row align-items-center">
        <div class="col-md-6">
          <?php require_once("../alertas/alert.php"); ?>
          <h4>Registro de Vacantes</h4><hr>
          <form action="../../controllers/registro/vacante.php" method="POST" autocomplete="on">
            <div class="row">
                <div class="col-md-12">
                    <label><b>Nombre de la Vacante</b></label>
                    <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                    <input type="text" name="vacante" id="vacante" onkeypress="return validar(event,this)" class="form-control" required>
                </div>
                <div class="col-md-12">
                    <label><b>Descripción</b></label>
                    <textarea name="descripcion" onkeypress="return validar(event,this)" class="form-control" required=""></textarea>
                </div>
              </div>
                
            <br><button type="submit" class="btn btn-primary">Guardar</button>
          </form>
        </div>
        <div class="col-md-6">
          <img src="../img/iconos/registro_empleado.png">
        </div>
      </div>
    </div>

<?php require_once("footer.php"); ?>