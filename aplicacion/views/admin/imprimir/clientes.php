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
    <title>Nuestros Clientes Registrados</title>
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
            <h3 align="center"><b>Lista de Clientes Registrados</b></h3><p>
        </div>
        <div class="col-xs-2"></div>
    </div>
    
    <div class="row">
        <div class="col-xs-12"><br><br>
             <table class="data-table table stripe hover nowrap">
                <thead>
                <tr bgcolor="#031e23">
                  <th><font color="white">Cedula</font></th>
                  <th><font color="white">Nombre Completo</font></th>
                  <th><font color="white">Telefono</font></th>
                  <th><font color="white">Correo</font></th>
                  <th><font color="white">Dirección</font></th>
                </tr>
                  </thead>
                <?php 
                      $con=("SELECT *FROM beneficiario ORDER BY id_beneficiario DESC");
                        $res=mysqli_query(conexion::con(), $con);
                        foreach ($res as $key) {                        
                  ?>
                     <tr>
                         <td><?php echo $key['cedula_beneficiario']; ?></td>
                         <td><?php echo $key['nombre_beneficiario']; ?> <?php echo $key['apellido_beneficiario']; ?></td>
                         <td><?php echo $key['telefono_beneficiario']; ?></td>
                         <td><?php echo $key['correo_beneficiario']; ?></td>
                         <td><?php echo $key['direccion_beneficiario']; ?></td>
                     </tr>            

                    <?php } ?>                
              </table>  
            
        </div>
    </div>
</div>



</body>
</html>