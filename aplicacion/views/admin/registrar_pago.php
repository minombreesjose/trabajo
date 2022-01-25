
<?php 
  require_once('nabvar.php'); 
  $mail=$_GET['mail']; // leo la variable q estoy enviando
  ?>

<div class="main-container">
  <div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
      <div class="pd-20 card-box">
       
        <div class="row">
          <div class="col-lg-6">
            <h4>Registro un Pago</h4><hr>
            <form method="POST" action="../../controllers/registro/pago.php">
              <label>Empleado</label>
                <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                <select name="id_empleado" class="form-control" required="">
                  <option value="">Seleccione</option>
                    <?php 
                      $con2 = ("SELECT * FROM empleado WHERE status='0'");
                      $resul3 = mysqli_query(conexion::con(), $con2);
                        foreach ($resul3 as $key) { 
                    ?>  
                      <option value="<?php echo $key['id_empleado']; ?>"><?php echo $key['ci']; ?> <?php echo $key['nombre']; ?> <?php echo $key['apellido']; ?></option>
                    <?php } ?>
                </select>

                <label>Monto a Cobrar</label>
                <input type="number" name="monto" class="form-control" required="">

                <label>Descripción del Pago</label>
                <textarea name="descripcion" onkeypress="return validar(event,this)" class="form-control" required=""></textarea>
                <hr>
                <p align="right">
                  <button type="submit" class="btn btn-primary">Guardar</button>
                </p>
            </form>
          </div> 
          <div class="col-lg-6">
              <img src="../img/pagos.png">
          </div>
        </div>
      </div>
    </div>
    
<br>

 
<!-- Editar Campo a traves de un Modal -->
  <div id="divModal"></div>
          <script>
              function editar(id) {
                  var ruta = 'mostrar/editar_pass.php?id_usuario=' + id;
                  $.get(ruta, function (data) {
                      $('#divModal').html(data);
                      $('#myModal').modal('show');
                  });
              }
          </script>
<!-- Fin -->
<?php require_once('footer.php'); ?>