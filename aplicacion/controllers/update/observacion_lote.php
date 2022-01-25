<?php 
include('../../bd/conexion.php');
//print_r($_POST)
$numero_lotte = $_POST['numero_lotte'];
$id_placa = $_POST['id_placa'];
$observaciones = $_POST['observaciones'];

$sql = ("UPDATE placa SET observaciones='$observaciones' WHERE id_placa='$id_placa'");   
        if (mysqli_query(conexion::con(), $sql)) {
               header("Location:../../views/admin/lotes.php?numero_lotte=$numero_lotte&msj=update"); 
           }else{
               header("Location:../../views/admin/lotes.php?numero_lotte=$numero_lotte&msj=error_update"); 
        }

?>