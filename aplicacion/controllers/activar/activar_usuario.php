<?php
require_once("../../bd/conexion.php");

$id_usuario = $_GET["id_usuario"]; // leo mi variable

$sql = ("UPDATE usuario SET estatus='1' WHERE id_usuario='$id_usuario'");
         if (mysqli_query(conexion::con(), $sql)) {
                header("location:../../views/admin/consultar_usuario.php?msj=activado");
             }else{
                header('location:../../views/admin/consultar_usuario.php?msj=error');
             }

?>