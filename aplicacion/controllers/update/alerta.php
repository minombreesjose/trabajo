<?php 
include('../../bd/conexion.php');
//print_r($_GET)

$id_alertas = $_POST['id_alertas'];
$alerta = $_POST['alerta'];

$sql = ("UPDATE alertas SET alerta='$alerta' WHERE id_alertas='$id_alertas'");
//die($sql);
    if (mysqli_query(conexion::con(), $sql)) {
               header("Location:../../views/admin/home.php?msj=update"); 
           }else{
               header("Location:../../views/admin/home.php?msj=error"); 
        }

?>