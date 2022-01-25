<?php include("../../../models/autenticado.php"); ?>
<?php 
    include('../../../bd/conexion.php');
    $fecha1= $_GET['fecha1'];
    $fecha2= $_GET['fecha2'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="./bs3.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consulta de Entrada</title>
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
            <b><h3 align="center">Consulta de Entrada de Mercancía</h3></b><p>
        </div>
        <div class="col-xs-2"></div>
    </div>
    
    <div class="row">
        <div class="col-xs-12"><br><br>
              <table class="data-table table stripe hover nowrap dataTable no-footer dtr-inline collapsed" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info">
                <thead>
                <tr>
                  <th>Producto</th>
                  <th>Cantidad</th>
                  <th>Marca</th>
                  <th>Categoría</th>
                  <th>Talla</th>
                  <th>Fecha de Entrada</th>
                </tr>
                  </thead>
                <?php 
                      $con=("SELECT *FROM historial_entrada INNER JOIN mercancia ON historial_entrada.id_mercancia=mercancia.id_mercancia INNER JOIN tipo ON mercancia.id_tipo_mercancia=tipo.id_tipo INNER JOIN marca ON mercancia.id_marca_mercancia=marca.id_marca WHERE historial_entrada.fecha_reg_entrada>='$fecha1' AND historial_entrada.fecha_reg_entrada <= '$fecha2'");
                      //die($con);
                        $res=mysqli_query(conexion::con(), $con);
                        $num=$res->num_rows;
                        foreach ($res as $key) {                        
                  ?>
                     <tr>
                         <td><?php echo $key['descripcion']; ?></td>
                         <td><?php echo $key['cant_ent']; ?></td>
                         <td><?php echo $key['marca']; ?></td>
                         <td><?php echo $key['tipo']; ?></td>
                         <td><?php echo $key['talla_calzado']; ?></td>
                         <td><?php echo $key['fecha_reg_entrada']; ?></td>
                     </tr> 
                    <?php } ?>               
              </table>            
        </div>
    </div>
</div>



</body>
</html>