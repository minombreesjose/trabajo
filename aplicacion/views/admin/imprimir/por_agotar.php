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
    <title>Mercancía por Agotar</title>
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
            <h3 align="center"><b>Mercancía por Agotar</b></h3><p>
        </div>
        <div class="col-xs-2"></div>
    </div>
    
    <div class="row">
        <div class="col-xs-12"><br><br>
              <table class="table table-hover" width="100%">
                <thead>
                  <tr bgcolor="#031e23">
                    <th width="50%"><font color="white">Producto</font></th>
                    <th width="40%"><font color="white">Marca</font></th>
                    <th width="40%"><font color="white">Categoría</font></th>
                    <th width="40%"><font color="white">Talla</font></th>
                    <th width="10%"><center><font color="white">Stock</font></center></th>
                  </tr>
                  </thead>
                <?php 
                      $con5=("SELECT *FROM alertas");
                        $res5=mysqli_query(conexion::con(), $con5);
                        foreach ($res5 as $alerta) {
                          $alerta=$alerta['alerta'];
                        }
                    ?>
                <?php 
                      $con=("SELECT *FROM mercancia INNER JOIN tipo ON mercancia.id_tipo_mercancia=tipo.id_tipo INNER JOIN marca ON mercancia.id_marca_mercancia=marca.id_marca");
                        $res=mysqli_query(conexion::con(), $con);
                        foreach ($res as $key) {
                            $id_mercancia=$key['id_mercancia'];
                            $con2=("SELECT SUM(cant_ent) AS suma_entrada FROM historial_entrada WHERE id_mercancia='$id_mercancia'");
                            $res2=mysqli_query(conexion::con(), $con2);
                            foreach ($res2 as $key2) {
                            $con1=("SELECT SUM(cantidad_salida) AS suma_salida FROM salida_mercancia WHERE id_mercancia='$id_mercancia'");
                            $res1=mysqli_query(conexion::con(), $con1);
                            foreach ($res1 as $key1) {
                  ?>
                  <?php 
                      $quedan=$key2['suma_entrada']-$key1['suma_salida']; 
                      if ($quedan<=$alerta) { 
                  ?>
                           <tr>
                                 <td><?php echo $key['descripcion']; ?></td>
                                 <td><?php echo $key['marca']; ?></td>
                                 <td><?php echo $key['tipo']; ?></td>
                                 <td><?php echo $key['talla_calzado']; ?></td>
                                 <td align="center"><font><?php echo $quedan; ?></font></td>
                           </tr>
                    <?php }}}} ?>              
                  </table> 
            
        </div>
    </div>
</div>



</body>
</html>