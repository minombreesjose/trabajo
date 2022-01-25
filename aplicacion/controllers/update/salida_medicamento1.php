<?php 
include('../../bd/conexion.php');
//print_r($_POST)

$id_salida_medicamentos = $_POST['id_salida_medicamentos'];
$cantidad_salida = $_POST['cantidad_salida'];

$sql = ("UPDATE salida_medicamentos SET cantidad_salida='$cantidad_salida' WHERE id_salida_medicamentos='$id_salida_medicamentos'");    
        if (mysqli_query(conexion::con(), $sql)) {
               header("Location:../../views/user/salida_medicamentos.php?msj=actualizado"); 
           }else{
               header("Location:../../views/user/salida_medicamentos.php?msj=error_update"); 
        }

?>