<?php
require_once("../../bd/conexion.php");

$id_empleado = $_GET["id_empleado"]; 
$id_familia = $_GET["id_familia"]; 

$sql = ("DELETE FROM familia WHERE id_familia='$id_familia'");
         if (mysqli_query(conexion::con(), $sql)) {
                header("location:../../views/admin/detalles_empleado.php?id_empleado=$id_empleado&msj=borrado");
             }else{
                header('location:../../views/admin/detalles_empleado.php?id_empleado=$id_empleado&msj=error');
             }

?>