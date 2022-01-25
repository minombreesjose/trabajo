<?php 
include('../../bd/conexion.php');
//print_r($_POST);

$marca =$_POST['marca'];

$sql = ("INSERT INTO marca(marca) VALUES ('$marca')");
if (mysqli_query(conexion::con(), $sql)) {
            header("Location:../../views/admin/marca.php?msj=exito_marca");
           }else{
            header('location:../../views/admin/marca.php?msj=error_guardar');
        }

?>