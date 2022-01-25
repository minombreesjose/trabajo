<?php 
include('../../bd/conexion.php');
//print_r($_GET)

$id_tipo = $_POST['id_tipo'];
$tipo = $_POST['tipo'];

$sql = ("UPDATE tipo SET tipo='$tipo' WHERE id_tipo='$id_tipo'");
//die($sql);
    if (mysqli_query(conexion::con(), $sql)) {
               header("Location:../../views/admin/marca.php?msj=update"); 
           }else{
               header("Location:../../views/admin/marca.php?msj=error"); 
        }

?>