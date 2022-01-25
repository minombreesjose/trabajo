<?php
require_once("../../bd/conexion.php");

$id_b = $_GET["id_b"]; // leo mi variable
$id_ingreso = $_GET["id_ingreso"]; 

$sql = ("DELETE FROM ingresos_boleta WHERE id_ingreso='$id_ingreso'");
         if (mysqli_query(conexion::con(), $sql)) {
                header("location:../../views/admin/boletas_pago_copia.php?id_b=$id_b&msj=borrado");
             }else{
                header('location:../../views/admin/boletas_pago_copia.php?id_b=$id_b&msj=error');
             }

?>