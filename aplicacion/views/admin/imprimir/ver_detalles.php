<?php include("../../../models/autenticado.php"); ?>
<?php 
    include('../../../bd/conexion.php');
?>
<?php 
 $id_empleado=$_GET['id_empleado']; 
 $fecha1=$_GET['fecha1'];
 $fecha2=$_GET['fecha2'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="./bs3.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventario</title>
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
        <div class="col-xs-2">
            
        </div>
        <div class="col-xs-8">
            <h3 align="center"><b>Detalles de lo que Vendío el Empleado</b></h3><p>
        </div>
        <div class="col-xs-2"></div>
    </div>
    
    <div class="row">
        <div class="col-xs-12"><br><br>
          <?php 
                      $conn=("SELECT * FROM empleado WHERE id_empleado='$id_empleado' ");
                      $resu=mysqli_query(conexion::con(), $conn);
                      foreach ($resu as $empl) {
          ?>
                   <b>Empleado:</b> <?php echo $empl['cedula_empleado']; ?> <?php echo $empl['nombre_completo']; ?>
        <?php } ?>
        <br><br>
        <table class="table table-hover">
                  <tr>
                    <th>Producto</th>
                    <th>Unidades Vendidas</th>
                    <th>Total en Venta</th>
                    <th>Fecha de Salida</th>
                  </tr>
                  <?php
                    $hoy=date("Y-m-d");
                    $con2=("SELECT * FROM salida_mercancia INNER JOIN codigo_salida ON salida_mercancia.cod_salida=codigo_salida.cod_salid INNER JOIN mercancia ON salida_mercancia.id_mercancia=mercancia.id_mercancia WHERE salida_mercancia.fecha_salida>='$fecha1' AND salida_mercancia.fecha_salida<='$fecha2' AND codigo_salida.id_empleado='$id_empleado'");
                    $res=mysqli_query(conexion::con(), $con2);
                    foreach ($res as $k) {
                  ?>
                  <tr>
                    <td><?php echo $k['descripcion']; ?></td>
                    <td><?php echo $k['cantidad_salida']; ?></td>
                    <td><?php echo number_format($k['total_pagar'],2); ?> $</td>
                    <td><?php echo $k['fecha_salida']; ?></td>
                  </tr>
                  
                  <?php } ?>
                  <tr>
                        <th colspan="2"><p align="right">Total en Ventas</p></th>
                        <td bgcolor="#40d3a7">
                          <?php 
                              $con2=("SELECT * FROM salida_mercancia INNER JOIN codigo_salida ON salida_mercancia.cod_salida=codigo_salida.cod_salid INNER JOIN mercancia ON salida_mercancia.id_mercancia=mercancia.id_mercancia WHERE salida_mercancia.fecha_salida>='$fecha1' AND salida_mercancia.fecha_salida<='$fecha2' AND codigo_salida.id_empleado='$id_empleado'");
                                $res2=mysqli_query(conexion::con(), $con2);
                                $total_venta_empleado = [];
                                foreach ($res2 as $key2) {
                                $total_venta_empleado[]=$key2['total_pagar'];
                                }                     
                          ?>
                          <?php 
                               $total=0;
                               foreach ($total_venta_empleado as $value) {
                                 $total+=$value;
                               }
                               echo number_format($total,2);
                               echo "$";
                          ?>
                        </td>
                        <td></td>
                  </tr>
                </table>
              
            
        </div>
    </div>
</div>



</body>
</html>