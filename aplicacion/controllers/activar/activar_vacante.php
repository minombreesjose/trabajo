<?php
require_once("../../bd/conexion.php");

$id_vacante = $_GET["id_vacante"]; // leo mi variable

$sql = ("UPDATE vacante SET status='0' WHERE id_vacante='$id_vacante'");
         if (mysqli_query(conexion::con(), $sql)) {
                header("location:../../views/admin/consultar_vacantes.php?msj=activado");
             }else{
                header('location:../../views/admin/consultar_vacantes.php?msj=error');
             }

?>