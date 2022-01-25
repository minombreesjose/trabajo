<?php require_once("nabvar.php"); ?>
<?php 
  // consulta en la tabla de empleados
  $dias_l=$_POST['dias_l'];
  $id_empleado=$_POST['id_empleado']; 
  $consulta=("SELECT *FROM empleado WHERE id_empleado='$id_empleado'");
  $result=mysqli_query(conexion::con(), $consulta);
  foreach ($result as $array) {
    $dni=$array['dni'];
    $nombre_completo=$array['nombre_completo'];
    $fecha_ingreso=$array['fecha_ingreso'];
    $sistema_pensiones=$array['sistema_pensiones'];
    $codigo_CUSPP=$array['codigo_CUSPP'];
  }
  // fin de la consulta
?>

<?php 
  $con=("SELECT *FROM boletas_pago");
  $res=mysqli_query(conexion::con(), $con);
  $num=$res->num_rows;
?>

<div class="main-container">
  <div class="pd-ltr-20">
    <div class="card-box pd-20 height-50-p mb-30">
      <div class="row align-items-center">
        <div class="col-md-12">
          <?php require_once("../alertas/alert.php"); ?>
          <h4>Datos de Boleta de Pago</h4><hr>
          <div class="row">
              <div class="col-md-12"><br>
                <form action="../../controllers/registro/boteta_pago.php" method="POST">
                  <table bgcolor="#aeccf3" class="table table-hover">
                      <tr>
                        <th>RUC:</th>
                        <td>20531655835</td>
                      </tr>
                      <tr>
                        <th>Empleador:</th>
                        <td>CLINICA MEDICO OCUPACIONAL CARRION S.A.C.</td>
                      </tr>
                      <tr>
                        <th>Periodo:</th>
                        <td><input type="date" name="periodo" class="form-control" required=""></td>
                      </tr>
                      <tr>
                        <th>PDT Planilla Electrónica - PLAME</th>
                        <td>Número de Orden: <?php echo $num+1; ?></td>
                      </tr>
                  </table>

                  <table  class="table table-hover" border="1">
                      <tr bgcolor="#aeccf3">
                        <th colspan="2"><center>Documento de Identidad</center></th>
                        <th rowspan="2" colspan="4"><center>Nombres y Apellidos</center></th>
                        <th rowspan="2" colspan="2"><center>Situación</center></th>
                      </tr>
                      <tr align="center" bgcolor="#aeccf3">
                        <th>Tipo</th>
                        <th>Número</th>
                      </tr>
                      <tr align="center">
                        <td>DNI</td>
                        <td><?php echo $dni; ?></td>
                        <td colspan="4"><center><?php echo strtoupper($nombre_completo); ?></center></td>
                        <td colspan="2"><center>ACTIVO O SUBSIDIADO</center></td>
                      </tr>
                      <tr align="center" bgcolor="#aeccf3">
                        <th colspan="2">Fecha de Ingreso</th>
                        <th colspan="2">Tipo de Trabajador</th>
                        <th colspan="2">Régimen Pensionario</th>
                        <th colspan="2">CUSPP</th>
                      </tr>
                      <tr align="center">
                        <td colspan="2"><?php echo $fecha_ingreso; ?></td>
                        <td colspan="2">EMPLEADO</td>
                        <td colspan="2"><?php echo strtoupper($sistema_pensiones); ?></td>
                        <td colspan="2"><?php echo strtoupper($codigo_CUSPP); ?></td>
                      </tr>
                      <tr align="center" bgcolor="#aeccf3">
                        <th rowspan="2">
                          Dias Laborados
                          <span class='badge badge-success badge-pill'>
                            <a href="#" data-toggle="modal" data-target="#dias_laborados"><i class="icon-copy fa fa-plus" aria-hidden="true"></i></a>
                          </span>
                        </th>
                        <th rowspan="2">Dias No Laborados</th>
                        <th rowspan="2">Dias Subsidiados</th>
                        <th rowspan="2">Condición</th>
                        <th colspan="2">Jornada Ordinaria</th>
                        <th colspan="2">Sobretiempo</th>
                      </tr>
                      <tr align="center" bgcolor="#aeccf3">
                        <th colspan="">Total Horas</th>
                        <th colspan="">Minutos</th>
                        <th colspan="">Total Horas</th>
                        <th colspan="">Minutos</th>
                      </tr>
                      <tr align="center">
                        <td>
                          <input type="hidden" name="id_empleado" value="<?php echo $id_empleado; ?>">
                          <input type="hidden" name="condicion" value="<?php echo 'Domiciliado'; ?>">
                          <input type="text" class="form-control" size="1" name="dias_laborados" value="<?php echo $dias_l; ?>" readonly="" required="">
                        </td>
                        <td><input type="text" class="form-control" size="1" name="dias_no_laborados" value="<?php echo 30-$dias_l; ?>" required=""></td>
                        <td><input type="text" class="form-control" size="1" name="dias_subsidiados" value="0" required=""></td>
                        <td>Domiciliado</td>
                        <td><input type="text" class="form-control" size="1" name="jo_total_horas" value="<?php echo 6.4*$dias_l; ?>" required=""></td>
                        <td><input type="text" class="form-control" size="1" name="jo_minutos" value="0" required=""></td>
                        <td><input type="text" class="form-control" size="1" name="s_horas" value="0" required=""></td>
                        <td><input type="text" class="form-control" size="1" name="s_minutos" value="0" required=""></td>
                      </tr>
                      <tr align="center" bgcolor="#aeccf3">
                        <td colspan="6">Motivo de Suspensión de Labores</td>
                        <td colspan="2" rowspan="2">Otros empleadores por renta de 5ta categoria</td>
                      </tr>
                      <tr align="center" bgcolor="#aeccf3">
                        <td colspan="1">Tipo</td>
                        <td colspan="4">Motivo</td>
                        <td colspan="1">Nº Dias</td>
                      </tr>
                      <tr align="center">
                        <td colspan="1">
                          <input type="text" name="tipo" class="form-control">
                        </td>
                        <td colspan="4">
                          <input type="text" class="form-control" name="motivo" value="">
                        </td>
                        <td colspan="1">
                          <input type="text" class="form-control" size="1" name="n_dias" value="0" required="">
                        </td>
                        <td colspan="2">
                          <input type="text" class="form-control" size="1" name="otros_empleadores">
                        </td>
                      </tr>
                  </table>


                  
                  <table  class="table table-hover" border="1">
                      <tr bgcolor="#aeccf3">
                        <th>Codigo</th>
                        <th>Conceptos</th>
                        <th>Ingresos S/.</th>
                        <th>Descuentos S/.</th>
                        <th>Neto S/.</th>
                      </tr>
                      <tr bgcolor="#aeccf3">
                        <td colspan="2">Ingresos</td>
                        <td colspan="5">
                          <?php 
                            // consulta de sueldo
                            $consulta=("SELECT *FROM sueldo WHERE id_empleado='$id_empleado'");
                            $result=mysqli_query(conexion::con(), $consulta);
                            foreach ($result as $array) {
                              echo "<span class='badge badge-success badge-pill'>";
                              echo "SUELDO BASE";
                              echo "&nbsp;";
                              echo number_format($salario=$array['sueldo'],2);
                              echo "</span>";
                              $salario_diario=$salario/30;
                            }
                            // fin de la consulta
                          ?>
                        </td>
                      </tr>                      
                      <tr>
                        <td>0121</td>
                        <td>REMUNERACIÓN O JORNAL BÁSICO</td>
                        <td>
                           <?php echo number_format(($sueldo=$salario_diario*$dias_l),2); ?>
                        </td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>0201</td>
                        <td>ASIGNACIÓN FAMILIAR</td>
                        <td>
                          <?php 
                            // consulta de familia
                            $consulta=("SELECT *FROM familia WHERE id_empleado='$id_empleado'");
                            $result=mysqli_query(conexion::con(), $consulta);
                            $numero=$result->num_rows;
                            if ($numero>='1') {
                              foreach ($result as $array) {
                                $fechanacimiento=$array['fecha_nacimiento'];
                              }
                              // fin de la consulta

                              // no estamos ocupando este scrip para MOSTRAR EDAD
                              $fecha_nacimiento = new DateTime($fechanacimiento);
                              $hoy = new DateTime();
                              $edad = $hoy->diff($fecha_nacimiento);
                              $edad=$edad->y; 
                              // FIN

                              if ($edad<='17') {
                                echo number_format((93),2);
                              }
                            }
                          ?>
                        </td>
                        <td></td>
                        <td></td>
                      </tr>
                      <tr bgcolor="#aeccf3">
                        <td colspan="5">Descuentos</td>
                      </tr>
                      <tr bgcolor="#aeccf3">
                        <td colspan="5">Aportes del Trabajador</td>
                      </tr>
                      <tr>
                        <td>0601</td>
                        <td>COMISION AFP PORCENTUAL</td>
                        <td></td>
                        <td>0.00</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>0605</td>
                        <td>RENTA QUINTA CATEGORÍA RETENCIONES</td>
                        <td></td>
                        <td>0.00</td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>0606</td>
                        <td>PRIMA DE SEGURO AFP</td>
                        <td></td>
                        <td><?php echo number_format($afp=($sueldo*0.0174),2) ?></td>
                        <td></td>
                      </tr>
                      <tr>
                        <td>0608</td>
                        <td>SSP - APORTACIÓN OBLIGATORIA</td>
                        <td></td>
                        <td><?php echo number_format($ssp=($sueldo*0.10),2) ?></td>
                        <td></td>
                      </tr>
                      <tr>
                        <th colspan="4"><p align="right">Neto a Pagar:</p></th>
                        <td>
                          <?php echo number_format(($total_neto=$sueldo-$afp-$ssp),2) ?>
                        </td>
                      </tr>
                  </table>
                  
                  
                  <table  class="table table-hover" border="1">
                      <tr bgcolor="#aeccf3">
                        <th colspan="4" width="90%">Aportes de Empleador</th>
                      </tr>                    
                      <tr>
                        <td>0804</td>
                        <td>ESSALUD(REGULAR CBSSP AGRAR/AC)TRAB</td>
                        <td><?php echo number_format(($cbssp=$sueldo*0.09),2); ?></td>
                      </tr>
                  </table>
                  <?php if ($dias_l>='1') {?>
                    <p align="right">                   
                      <input type="hidden" name="sueldo" value="<?php echo $sueldo; ?>">
                      <button type="submit" class="btn btn-primary">Guardar y Terminar</button>                    
                    </p>
                  <?php } ?>
                  </form>
              </div>
          </div>
          
        </div>
      </div>
    </div>


<div class="modal fade" id="dias_laborados" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="myLargeModalLabel">Agregar los Dias Laborados</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    </div>
                    <div class="modal-body">
                      <form action="boletas_pago.php" method="POST">
                        <label>Dias Laborados</label>
                        <input type="hidden" name="id_empleado" value="<?php echo $id_empleado; ?>">
                        <input type="number" name="dias_l" class="form-control" required="">
                    </div>
                    <div class="modal-footer">
                      <button type="submit" class="btn btn-primary">Agregar</button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>

<?php require_once("footer.php"); ?>