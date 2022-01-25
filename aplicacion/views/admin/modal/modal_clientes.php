<div class="modal fade" id="cliente" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myLargeModalLabel">Registro de Clientes</h4>
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <form action="../../controllers/registro/guardar_cliente.php" method="POST">
                       <div class="row">
                           <div class="col-md-4">
                             <label>Cedula</label>
                             <input type="hidden" name="id_registro" value="<?php echo $id; ?>">
                             <input type="text" name="cedula_beneficiario" minlength="6" maxlength="8" onkeypress="return soloNumeros(event)" id="cedula_beneficiario" onBlur="comprobarCedula()" class="form-control" required="">
                             <span id="estadocedula"></span>
                           </div>
                           <div class="col-md-4">
                             <label>Nombre</label>
                             <input type="text" name="nombre_beneficiario" minlength="3" maxlength="100" onkeypress="return soloLetras(event)" class="form-control" required="">
                           </div>
                           <div class="col-md-4">
                             <label>Apellido</label>
                             <input type="text" name="apellido_beneficiario" minlength="3" maxlength="100" onkeypress="return soloLetras(event)" class="form-control" required="">
                           </div>
                           <div class="col-md-4">
                             <label>Telefono</label>
                             <input type="text" name="telefono_beneficiario" minlength="11" maxlength="11" onkeypress="return soloNumeros(event)" class="form-control">
                           </div>
                           <div class="col-md-8">
                             <label>Correo</label>
                             <input type="text" name="correo_beneficiario" id="correo_beneficiario" onBlur="comprobarCorreo()" class="form-control">
                             <span id="estadocorreo"></span>
                           </div>
                           <div class="col-md-12">
                             <label>Dirección</label>
                             <textarea name="direccion_beneficiario" class="form-control" rows="3"></textarea>
                           </div>
                       </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-save" aria-hidden="true"></i> Guargar</button>
                    </div>
                    </form>
      <div>
          </div>
      </div>
    </div>
  </div>
</div>


