<?php
require_once("../../bd/conexion.php");

$id_salida_mercancia = $_POST["id_salida_mercancia"]; // leo mi variable

$sql = ("DELETE FROM salida_mercancia WHERE id_salida_mercancia='$id_salida_mercancia'");
//die($sql);
         if (mysqli_query(conexion::con(), $sql)) {
                header("location:../../views/user/salida_mercancia.php?msj=borrado");
             }else{
                header('location:../../views/user/salida_mercancia.php?msj=error');
             }

?>