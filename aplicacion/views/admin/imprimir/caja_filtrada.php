<?php include("../../../models/autenticado.php"); ?>
<?php 
    include('../../../bd/conexion.php');
?>
<?php 
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
            <h3 align="center"><b>Detalles de Venta</b></h3><p>
        </div>
        <div class="col-xs-2"> </div>
    </div>
    
    <div class="row">
      <b>Desde:</b> <?php echo $fecha1; ?> <b>Hasta:</b>  <?php echo $fecha2; ?>
        <div class="col-xs-12"><br><br>
              <table class="table">
                <thead>
                <tr>
                  <th>Descripción</th>
                  <th>Cantidad</th>
                  <th>Precio Compra</th>
                  <th>Precio Venta</th>
                  <th>Total Venta</th>
                  <th>Ganancía</th>
                  <th>Fecha de Salida</th>
                </tr>
                  </thead>
                  <?php 
                      $hoy=date("Y-m-d");
                        $con=("SELECT *FROM salida_mercancia INNER JOIN mercancia ON salida_mercancia.id_mercancia=mercancia.id_mercancia INNER JOIN tipo ON mercancia.id_tipo_mercancia=tipo.id_tipo INNER JOIN marca ON mercancia.id_marca_mercancia=marca.id_marca WHERE salida_mercancia.fecha_salida>='$fecha1' AND salida_mercancia.fecha_salida<='$fecha2'");
                        //die($con);
                          $res=mysqli_query(conexion::con(), $con);
                          $num=$res->num_rows;
                          $total_venta = [];
                          $total_ganancia = [];
                          foreach ($res as $key) {
                          $total_venta[]=$key['precio_venta']*$key['cantidad_salida'];
                          $total_ganancia1[]=($key['precio_unidad']-$key['precio_c'])*$key['cantidad_salida'];
                    ?>
                        <tr>
                           <td><?php echo $key['descripcion']; ?> <b>Talla:</b> <?php echo $key['talla_calzado']; ?></td>
                           <td><?php echo $key['cantidad_salida']; ?></td>
                           <td><font color="red"><?php echo number_format($key['precio_c'],2); ?>$</font></td>
                           <td><font color="green"><b><?php echo number_format($key['precio_unidad'],2); ?>$</b></font></td>
                           <td><b><?php echo number_format($key['precio_unidad']*$key['cantidad_salida'],2); ?>$</b></td>
                           <td><b><?php echo number_format(($total_ganancia[]=$key['precio_unidad']-$key['precio_c'])*$key['cantidad_salida'],2); ?>$</b></td>
                           <td><?php echo $key['fecha_salida']; ?></td>
                       </tr>
                      <?php } ?>
                      <tr>
                        <th colspan="4"><p align="right">Total de Venta / Ganacía</p></th>
                        <td bgcolor="#40d3a7">
                          <?php 
                             $con=("SELECT SUM(total_pagar) AS total_venta FROM salida_mercancia WHERE fecha_salida>='$fecha1' AND fecha_salida<='$fecha2'");
                             $res=mysqli_query(conexion::con(), $con);
                             
                              foreach ($res as $key) {
                                echo number_format($key['total_venta'],2);
                                echo "$";
                              }
                          ?>
                        </td>
                        <td bgcolor="#24b9ce">
                          <?php 
                          //print_r($total_ganancia1);
                          $total_g=0;
                              foreach ($total_ganancia1 as $value1) {
                                  $total_g+=$value1;
                              }
                          echo number_format($total_g,2);
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