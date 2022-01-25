<?php 
include('../../bd/conexion.php');
//print_r($_POST)

$id_empleado = $_POST['id_empleado'];
$id_boleta = $_POST['id_boletas'];
$codigo = $_POST['codigo'];
$descripcion = $_POST['descripcion'];
$neto = $_POST['neto'];
$fecha_registro= date("Y-m-d");

$sql = ("INSERT INTO aportes(id_boleta,codigo,descripcion,neto) VALUES ('$id_boleta','$codigo','$descripcion','$neto')");
//die($sql);
    if (mysqli_query(conexion::con(), $sql)) {
               header("Location:../../views/admin/boletas_pago.php?msj=exito&id_empleado=$id_empleado"); 
           }else{
               header("Location:../../views/admin/boletas_pago.php?msj=error_guardar"); 
        }
      
?>