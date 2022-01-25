<?php include("../../../models/autenticado.php"); ?>
<?php 
    include('../../../bd/conexion.php');
?>
<?php $tipo=$_GET['tipo']; ?>

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
            <h3 align="center"><b>Inventario</b></h3><p>
        </div>
        <div class="col-xs-2"></div>
    </div>
    
    <div class="row">
        <div class="col-xs-12"><br><br>
              <table class="table table-hover" width="100%">
                <thead>
                <tr bgcolor="#031e23">
                  <th width="40%"><font color="white">Codigo</font></th>
                  <th width="40%"><font color="white">Producto</font></th>
                  <th width="20%"><font color="white">Marca</font></th>
                  <th width="10%"><font color="white">Precio Compra</font></th>
                  <th width="20%"><font color="white">Categoría</font></th>
                  <th width="10%"><font color="white">Talla</font></th>
                  <th width="10%"><center><font color="white">Stock</font></center></th>
                </tr>
                  </thead>
                <?php 
                      $con=("SELECT *FROM mercancia INNER JOIN tipo ON mercancia.id_tipo_mercancia=tipo.id_tipo INNER JOIN marca ON mercancia.id_marca_mercancia=marca.id_marca WHERE tipo.id_tipo='$tipo'");
                        $res=mysqli_query(conexion::con(), $con);
                        $total_invertido=[];
                        foreach ($res as $key) {
                            $id_mercancia=$key['id_mercancia'];
                            $con2=("SELECT SUM(cant_ent) AS suma_entrada FROM historial_entrada WHERE id_mercancia='$id_mercancia'");
                            $res2=mysqli_query(conexion::con(), $con2);
                            foreach ($res2 as $key2) {
                            $con1=("SELECT SUM(cantidad_salida) AS suma_salida FROM salida_mercancia WHERE id_mercancia='$id_mercancia'");
                            $res1=mysqli_query(conexion::con(), $con1);
                            foreach ($res1 as $key1) {
                            $total_invertido[]=$key['precio_compra']*($key2['suma_entrada']-$key1['suma_salida']);
                  ?>
                     <tr>
                         <td><?php echo $key['codigo']; ?></td>
                         <td><?php echo $key['descripcion']; ?></td>
                         <td><?php echo $key['marca']; ?></td>
                         <td><?php echo number_format($key['precio_compra'],2); ?> $</td>
                         <td><?php echo $key['tipo']; ?></td>
                         <td><?php echo $key['talla_calzado']; ?></td>
                         <td><center><?php echo $key2['suma_entrada']-$key1['suma_salida']; ?></center></td>
                     </tr>
                    <?php }}} ?>  
                     <tr>
                            <td colspan="3" align="right"><b>Total en Inversión</b></td>
                            <td bgcolor="#24b9ce">
                          <?php 
                          //print_r($total_ganancia1);
                          $total_Inv=0;
                              foreach ($total_invertido as $total1) {
                                  $total_Inv+=$total1;
                              }
                          echo number_format($total_Inv,2);
                          echo "$";
                          ?>
                        </td>
                   </tr>              
                  </table>
            
        </div>
    </div>
</div>



</body>
</html>