<?php
require_once("../../bd/conexion.php");

$id_empleado = $_GET["id_empleado"]; // leo mi variable
$id_ingreso = $_GET["id_ingreso"]; 

$sql = ("DELETE FROM ingresos_boleta WHERE id_ingreso='$id_ingreso'");
         if (mysqli_query(conexion::con(), $sql)) {
                header("location:../../views/admin/boletas_pago.php?id_empleado=$id_empleado&msj=borrado");
             }else{
                header('location:../../views/admin/boletas_pago.php?id_empleado=$id_empleado&msj=error');
             }

?>