<?php
require_once("../../bd/conexion.php");

$id_placa = $_POST["id_placa"]; // leo mi variable

$consulta=("SELECT * FROM placa WHERE id_placa='$id_placa'");
$res=mysqli_query(conexion::con(), $consulta);
foreach ($res as $key) {
   $numero_lotte=$key['numero_lotte'];
}

$sql = ("DELETE FROM placa WHERE id_placa='$id_placa'");
         if (mysqli_query(conexion::con(), $sql)) {
                header("location:../../views/admin/lotes.php?numero_lotte=$numero_lotte&msj=borrado");
             }else{
                header('location:../../views/admin/lotes.php?numero_lotte=$numero_lotte&msj=error');
             }

?>