<?php
include("../../bd/conexion.php");
//print_r($_POST);
// Variable Enviadas
$id_usuario = $_POST["id_usuario"];
$nuevo_password = hash('sha512', $_POST["nuevo_password"]);
$repita_password = hash('sha512', $_POST["repita_password"]);


if ($nuevo_password == $repita_password) {
$sql=("UPDATE usuario SET  pass ='$nuevo_password'  WHERE id_usuario = '$id_usuario'");
		if (mysqli_query(conexion::con(), $sql)) {
            header("Location:../../views/admin/perfil.php?msj=actualizado");
            }
        }else{
        	header("location:../../views/admin/perfil.php?msj=error_pass");
}
?>
