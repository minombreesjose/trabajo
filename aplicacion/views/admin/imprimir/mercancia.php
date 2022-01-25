<?php include("../../../models/autenticado.php"); ?>
<?php 
    include('../../../bd/conexion.php');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="stylesheet" href="./bs3.min.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Mercancia</title>
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
            <h3 align="center"><b>Listado de Productos</b></h3><p>
        </div>
        <div class="col-xs-2"></div>
    </div>
    
    <div class="row">
        <div class="col-xs-12"><br><br>
              <table class="data-table table stripe hover nowrap">
                <thead>
                <tr bgcolor="#031e23">
                  <th><font color="white">Producto</font></th>
                  <th><font color="white">Marca</font></th>
                  <th><font color="white">Categoría</font></th>
                  <th><font color="white">Precio Compra</font></th>
                </tr>
                  </thead>
                <?php 
                      $con=("SELECT *FROM mercancia INNER JOIN tipo ON mercancia.id_tipo_mercancia=tipo.id_tipo INNER JOIN marca ON mercancia.id_marca_mercancia=marca.id_marca ORDER BY mercancia.id_mercancia DESC");
                        $res=mysqli_query(conexion::con(), $con);
                        foreach ($res as $key) {                        
                  ?>
                     <tr>
                         <td><?php echo $key['descripcion']; ?> <b>Talla:</b> <?php echo $key['talla_calzado']; ?></td>
                         <td><?php echo $key['marca']; ?></td>
                         <td><?php echo $key['tipo']; ?></td>
                         <td><?php echo number_format($key['precio_compra'],2); ?>$</td>
                        
                     </tr>            

                    <?php } ?>                
                  </table>
            
        </div>
    </div>
</div>



</body>
</html>