<?php 
include('../../bd/conexion.php');
//print_r($_POST);

$tipo =$_POST['tipo'];

$sql = ("INSERT INTO tipo(tipo) VALUES ('$tipo')");
if (mysqli_query(conexion::con(), $sql)) {
            header("Location:../../views/admin/marca.php?msj=exito_tipo");
           }else{
            header('location:../../views/admin/marca.php?msj=error_guardar');
        }

?>