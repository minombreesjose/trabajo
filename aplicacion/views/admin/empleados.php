<?php require_once("nabvar.php"); ?>

<div class="main-container">
  <div class="pd-ltr-20">
    <div class="card-box pd-20 height-50-p mb-30">
      <div class="row align-items-center">
        <div class="col-md-12">
          <?php require_once("../alertas/alert.php"); ?>
          <h4>Registro de Empleados</h4><hr>
          <form action="../../controllers/registro/empleado.php" method="POST" autocomplete="on">
            <div class="row">
                <div class="col-md-4">
                    <label><b>CI</b></label>
                    <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                    <input type="text" name="ci" id="ci" onBlur="comprobardniEmpleado()" minlength="6" maxlength="8" onkeypress="return soloNumeros(event)" class="form-control" required>
                    <span id="estadodniempledo"></span>
                </div>
                <div class="col-md-4">
                    <label><b>Nombre</b></label>
                    <input type="text" name="nombre" onkeypress="return validar(event,this)" class="form-control" required="">
                </div>
                <div class="col-md-4">
                    <label><b>Apellido</b></label>
                    <input type="text" name="apellido" onkeypress="return validar(event,this)" class="form-control" required="">
                </div>
                <div class="col-md-4">
                    <label><b>Fecha de Nacimiento</b></label>
                    <input type="date" name="fecha_nacimiento" class="form-control" required="">
                </div>
                <div class="col-md-4">
                    <label><b>Estado Civil</b></label>
                    <select name="estado_civil" class="form-control" required="">
                      <option>Seleccione!!!</option>
                      <option value="Casado(a)">Casado(a)</option>
                      <option value="Conviviente">Conviviente</option>
                      <option value="Viudo(a)">Viudo(a)</option>
                      <option value="Soltero(a)">Soltero(a)</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label><b>Fecha de Ingreso</b></label>
                    <input type="date" name="fecha_ingreso" class="form-control" required="">
                </div>
                <div class="col-md-4">
                    <label><b>Telefono</b></label>
                    <input type="text" onkeypress="return soloNumeros(event)" name="telefono_empleado" class="form-control" required="">
                </div>
                <div class="col-md-4">                   
                  <label><b>Correo</b></label>
                  <input type="email" name="correo" id="correo" onBlur="comprobarCorreo()" class="form-control" required>
                  <span id="estadocorreo"></span>
                </div>
                <div class="col-md-4">
                  <label><b>Sueldo Base</b></label>
                  <input type="text" name="sueldo" class="form-control" required="">
                </div>
            </div>
            <label><b>Dirección</b></label>
            <textarea class="form-control" onkeypress="return validar(event,this)" name="direccion" required=""></textarea>

            <br><button type="submit" class="btn btn-primary">Guardar</button>
          </form>
        </div>
      </div>
    </div>

<?php require_once("footer.php"); ?>