<?php
require_once("../../bd/conexion.php");

$id_boletas_pago = $_POST["id_boletas_pago"]; 

$sql = ("DELETE FROM boletas_pago WHERE id_boletas_pago='$id_boletas_pago'");
         if (mysqli_query(conexion::con(), $sql)) {
                header("location:../../views/admin/consulta_de_boletas.php?msj=borrado");
             }else{
                header('location:../../views/admin/consulta_de_boletas.php?msj=error');
             }

?>