<?php
require_once("../../bd/conexion.php");

$id_empleado = $_GET["id_empleado"]; // leo mi variable

$sql = ("UPDATE empleado SET status='1' WHERE id_empleado='$id_empleado'");
         if (mysqli_query(conexion::con(), $sql)) {
                header("location:../../views/admin/consulta_empleado.php?msj=Inabilitado");
             }else{
                header('location:../../views/admin/consulta_empleado.php?msj=error');
             }

?>