<?php 
include('../../bd/conexion.php');
//print_r($_POST)

$id_registro = $_POST['id_registro'];
$codigo = $_POST['codigo'];
$id_medicamento = $_POST['id_medicamento'];
$cantidad = $_POST['cantidad'];
$fecha_salida= date("Y-m-d");

$sql = ("INSERT INTO salida_medicamentos(id_registro,cod_salida,id_medicamento,cantidad_salida,status,fecha_salida) VALUES ('$id_registro','$codigo','$id_medicamento','$cantidad','0','$fecha_salida')");
    if (mysqli_query(conexion::con(), $sql)) {
               header("Location:../../views/user/salida_medicamentos.php?msj=agregado"); 
           }else{
               header("Location:../../views/user/salida_medicamentos.php?msj=error_guardar"); 
        }

?>