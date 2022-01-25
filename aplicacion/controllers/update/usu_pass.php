<?php
include("../../bd/conexion.php");
//print_r($_POST);
// Variable Enviadas
$id_usuario = $_POST["id_usuario"];
$pass = hash('sha512', $_POST["pass"]);


$sql=("UPDATE usuario SET  pass ='$pass'  WHERE id_usuario = '$id_usuario'");
//die($sql);
		if (mysqli_query(conexion::con(), $sql)) {
            header("Location:../../views/admin/consultar_usuario.php?msj=actualizado");
        }else{
        	header("location:../../views/admin/consultar_usuario.php?msj=error_pass");
        }
?>
