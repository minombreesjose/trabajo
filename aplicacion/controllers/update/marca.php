<?php 
include('../../bd/conexion.php');
//print_r($_GET)

$id_marca = $_POST['id_marca'];
$marca = $_POST['marca'];

$sql = ("UPDATE marca SET marca='$marca' WHERE id_marca='$id_marca'");
//die($sql);
    if (mysqli_query(conexion::con(), $sql)) {
               header("Location:../../views/admin/marca.php?msj=update"); 
           }else{
               header("Location:../../views/admin/marca.php?msj=error"); 
        }

?>