<?php error_reporting(0); ?>
<?php include("../../../models/autenticado.php"); ?>
<?php 
    include('../../../bd/conexion.php');
    $id_empleado=$_GET['id_empleado'];
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="./bs3.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>
<script type="text/javascript">
            function imprimir() {
                if (window.print) {
                    window.print();
                } else {
                    alert("La función de impresion no esta soportada por su navegador.");
                }
            }
</script>
<style>
        @page{
         size:  auto;   /* auto es el valor inicial */
         margin: 5mm;  /* afecta el margen en la configuración de impresión */
        }
</style>
<body onload="imprimir();"><br>
<div class="container-fluid">
        <div class="row">
            <div class="row">
            <div class="col-xs-3">
                <img src="../../img/logo/logo.png">
            </div>
            <div class="col-xs-6"><br>
                <h3 align="center"><b>Boleta de Pago</b></h3><p>
            </div>
            <div class="col-xs-3"></div>
        </div>
        <br><br>
        <div class="col-xs-12">
        <?php 
          $consulta=("SELECT *FROM boletas_pago INNER JOIN empleado ON boletas_pago.id_empleado=empleado.id_empleado WHERE boletas_pago.id_boletas_pago='$id_boleta'");
          $resultado=mysqli_query(conexion::con(), $consulta);
          foreach ($resultado as $array) {
              $dni=$array['dni'];
              $nombre_completo=$array['nombre_completo'];
              $fecha_ingreso=$array['fecha_ingreso'];
              $sistema_pensiones=$array['sistema_pensiones'];
              $codigo_CUSPP=$array['codigo_CUSPP'];
              $dias_laborados=$array['dias_laborados'];
              $dias_no_laborados=$array['dias_no_laborados'];
              $dias_subsidiados=$array['dias_subsidiados'];
              $horas_total_ordinaria=$array['jo_total_horas'];
              $minutos_ordinaria=$array['jo_minutos'];
              $hora_sobretiempo=$array['s_horas'];
              $minutos_sobretiempo=$array['s_minutos'];
              $tipo=$array['tipo'];
              $motivo=$array['motivo'];
              $n_dias=$array['n_dias'];
              $empleadores=$array['empleadores'];
              $sueldo=$array['sueldo'];

          }
        ?>
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
                        <td>09/2021</td>
                      </tr>
                      <tr>
                        <th>PDT Planilla Electrónica - PLAME</th>
                        <td>Número de Orden: <?php echo $id_boleta; ?></td>
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
                        <th rowspan="2">Dias Laborados</th>
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
                      <form action="../../controllers/registro/ingresos1.php" method="POST">
                        <td>
                          <?php echo $dias_laborados; ?>
                        </td>
                        <td>
                          <?php echo $dias_no_laborados; ?>
                        </td>
                        <td>
                          <?php echo $dias_subsidiados; ?>
                        </td>
                        <td>Domiciliado</td>
                        <td>
                          <?php echo $horas_total_ordinaria; ?>
                        </td>
                        <td>
                          <?php echo $minutos_ordinaria; ?>
                        </td>
                        <td>
                          <?php echo $hora_sobretiempo; ?>
                        </td>
                        <td>
                          <?php echo $minutos_sobretiempo; ?>
                        </td>
                      </tr>
                      <tr align="center" bgcolor="#aeccf3">
                        <td colspan="6">Motivo de Suspensión de Labores</td>
                        <td colspan="2" rowspan="2">Otros empleadores por renta de 5ta categoria</td>
                      </tr>
                      <tr align="center" bgcolor="#aeccf3">
                        <td colspan="1">Tipo</td>
                        <td colspan="4">Notivo</td>
                        <td colspan="1">Nº Dias</td>
                      </tr>
                      <tr align="center">
                        <td colspan="1">
                          <?php echo $tipo; ?>
                        </td>
                        <td colspan="4">
                          <?php echo $motivo; ?>
                        </td>
                        <td colspan="1">
                          <?php echo $n_dias; ?>
                        </td>
                        <td colspan="2">
                          <?php echo $empleadores; ?>
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
                        <td colspan="7">Ingresos</td>
                      </tr>                      
                      <tr>
                        <td>0121</td>
                        <td>REMUNERACIÓN O JORNAL BÁSICO</td>
                        <td>
                         <?php echo number_format(($sueldo),2) ?>
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
            
        </div>
    </div>
</div>



</body>
</html>