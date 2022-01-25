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
    <title>Centro Clinico Municipal</title>
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
            <img src="../../img/logo/logo.png">
        </div>
        <div class="col-xs-8"><br>
            <h5 align="center"><b>República Bolivariana de Venezuela</b></h5><p>
            <h4 align="center"><b>Centro Clicnico Municipal</b></h4><p>
            <h5 align="center"><b>san Juan de los Morros</b></h5><p>
            <h5 align="center"><b>Estado Bolivariano de Guárico</b></h5><p>
            <h5 align="center"><b>G-20009045-6</b></h5><p>
            <br>
            <h3 align="center"><b>BITACORA</b></h3><p>
        </div>
        <div class="col-xs-2"></div>
    </div>
    
    <div class="row">
        <div class="col-xs-12"><br><br>
             <table class="data-table table stripe hover nowrap" border="1">
                <thead>
                <tr>
                  <th>Usuario</th>
                  <th>Acción</th>
                  <th>Fecha y Hora</th>
                </tr>
                  </thead>
                <?php 
                      $con=("SELECT *FROM bitacora INNER JOIN usuario ON bitacora.id_registro = usuario.id_usuario ORDER BY bitacora.id_bitacora DESC");
                        $res=mysqli_query(conexion::con(), $con);
                        $num=$res->num_rows;
                        foreach ($res as $key) {                        
                  ?>
                     <tr>
                         <td><?php echo $key['nom']; ?></td>
                         <td><?php echo $key['accion']; ?></td>
                         <td><?php echo $key['fecha_hora']; ?></td>
                     </tr>

                  

                    <?php } ?>                
                  </table>  
            
        </div>
    </div>
</div>



</body>
</html>