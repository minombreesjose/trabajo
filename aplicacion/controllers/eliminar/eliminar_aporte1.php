<?php
require_once("../../bd/conexion.php");

$id_empleado = $_GET["id_empleado"]; // leo mi variable
$id_aportes = $_GET["id_aportes"]; 

$sql = ("DELETE FROM aportes WHERE id_aportes='$id_aportes'");
         if (mysqli_query(conexion::con(), $sql)) {
                header("location:../../views/admin/boletas_pago.php?id_empleado=$id_empleado&msj=borrado");
             }else{
                header('location:../../views/admin/boletas_pago.php?id_empleado=$id_empleado&msj=error');
             }

?>