<?php 
include('../../bd/conexion.php');
//print_r($_GET)

$id_registro = $_POST['id_registro'];
$alerta = $_POST['alerta'];

$sql = ("INSERT INTO alertas(id_registro,alerta) VALUES ('$id_registro','$alerta')");
//die($sql);
    if (mysqli_query(conexion::con(), $sql)) {
               header("Location:../../views/admin/home.php?msj=exito"); 
           }else{
               header("Location:../../views/admin/home.php?msj=error"); 
        }

?>