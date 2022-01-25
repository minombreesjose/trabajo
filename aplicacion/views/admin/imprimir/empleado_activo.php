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
    <title>Empleados</title>
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
        <div class="col-xs-3">
            <img src="../../img/logo/logo.png">
        </div>
        <div class="col-xs-6"><br>
            <br>
            <h3 align="center"><b>Lista de Empleados Activos</b></h3><p>
        </div>
        <div class="col-xs-3"></div>
    </div>
    
    <div class="row">
        <div class="col-xs-12"><br><br>
            <table class="data-table table stripe hover nowrap">
              <thead>
              <tr>
                <th>C.I.</th>
                <th>Nombre Completo</th>
                <th>Telefono</th>
                <th>Fecha Ingreso</th>
                <th>Correo</th>
                <th>Estatus</th>
              </tr>
             </thead>
             <tbody>

              <?php
                 $sql = ("SELECT * FROM empleado WHERE status='0'"); 
                 $result=mysqli_query(conexion::con(), $sql);
                 foreach ($result as $usuario) {
              ?>
              <tr>
                <td><?php echo $usuario['ci']; ?></td>
                <td><?php echo $usuario['nombre'];?> <?php echo $usuario['apellido'];?></td>
                <td><?php echo $usuario['telefono']; ?></td>
                <td><?php echo $usuario['fecha_ingreso']; ?></td>
                <td><?php echo $usuario['correo']; ?></td>
                <td><?php if ($usuario['status']=='0') {
                  echo "Activo";
                }elseif ($usuario['status']=='1') {
                  echo "Inhabilitado";
                } ?></td>
              </tr>
                <?php } ?>
             </tbody>
             </table>            
        </div>
    </div>
</div>



</body>
</html>