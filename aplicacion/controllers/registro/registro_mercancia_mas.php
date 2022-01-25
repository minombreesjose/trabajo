<?php 
include('../../bd/conexion.php');
//print_r($_POST);


$id_mercancia = $_POST['id_mercancia'];
$cantidad = $_POST['cantidad'];
$fecha_registro = date('Y-m-d');

$sql = ("INSERT INTO historial_entrada(id_mercancia,cant_ent,fecha_reg_entrada
) VALUES ('$id_mercancia','$cantidad','$fecha_registro')");
       if (mysqli_query(conexion::con(), $sql)) {
               header("Location:../../views/admin/consulta_mercancia.php?msj=añadido");       
        }else{
               header("Location:../../views/admin/consulta_mercancia.php?msj=error_al_añadir"); 
        }

?>