<?php include("../../../models/autenticado.php"); ?>
<?php 
    include('../../../bd/conexion.php');
    $cod_salid = $_GET['cod_salid'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="./bs3.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles de Compra</title>
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
            <h4 align="center"><b>Detalles de la Salida de Mercancía</b></h4><p>
        </div>
        <div class="col-xs-2"></div>
    </div>

    <div class="row">
        <div class="col-xs-12"><br><br>
            <table class="data-table table stripe hover nowrap" border="1">
                    <tr bgcolor="#031e23">
                      <th><font color="white">Cliente</font></th>
                      <th><font color="white">Telefono</font></th>
                    </tr>
                    <tr>
                      <?php  
                        $cod_salid = $_REQUEST['cod_salid'];
                        $sql=("SELECT * FROM salida_mercancia INNER JOIN codigo_salida ON salida_mercancia.cod_salida=codigo_salida.cod_salid INNER JOIN beneficiario ON beneficiario.id_beneficiario=codigo_salida.id_cliente INNER JOIN mercancia ON mercancia.id_mercancia=salida_mercancia.id_mercancia WHERE salida_mercancia.cod_salida='$cod_salid' LIMIT 1");
                        //die($sql);
                        $res=mysqli_query(conexion::con(), $sql);
                        foreach ($res as $key) {                                
                      ?>
                      <tr>
                      <td><?php echo $key['cedula_beneficiario']; ?> <?php echo $key['nombre_beneficiario']; ?> <?php echo $key['apellido_beneficiario']; ?></td>
                      <td><?php echo $key['telefono_beneficiario']; ?></td>
                      </tr>
                    <?php } ?> 
                    
            </table>
            <table class="data-table table stripe hover nowrap" border="1">
                    <tr bgcolor="#031e23">
                      <th><font color="white">Producto</font></th>
                      <th><font color="white"><center>Cantidad</center></font></th>
                    </tr>
                    <?php  
                        $sql=("SELECT * FROM salida_mercancia INNER JOIN codigo_salida ON salida_mercancia.cod_salida=codigo_salida.cod_salid INNER JOIN beneficiario ON beneficiario.id_beneficiario=codigo_salida.id_cliente INNER JOIN mercancia ON mercancia.id_mercancia=salida_mercancia.id_mercancia WHERE salida_mercancia.cod_salida='$cod_salid'");
                        //die($sql);
                        $res=mysqli_query(conexion::con(), $sql);
                        foreach ($res as $key) {                                
                      ?>
                      <tr>
                      <td><?php echo $key['descripcion']; ?> <b>Talla:</b> <?php echo $key['talla_calzado']; ?></td>
                      <td><center><?php echo $key['cantidad_salida']; ?></center></td>
                      </tr>
                    <?php } ?>                   
              </table>
        </div>
    </div>

</div>



</body>
</html>