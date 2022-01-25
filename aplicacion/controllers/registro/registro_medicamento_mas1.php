<?php 
include('../../bd/conexion.php');

$id_medicamentos = $_POST['id_medicamentos'];
$nombre_medicamento = $_POST['nombre_medicamento'];
$cantidad_entrada = $_POST['cantidad_entrada'];
$fecha_venci = $_POST['fecha_venci'];
$tipo_medicamento = $_POST['tipo_medicamento'];
$fecha_registro = date('Y-m-d');
$fecha_hora= date('Y-m-d H:i:s');

$sql = ("INSERT INTO historial_entrada(id_medicamento,fecha_venci,cant_ent,fecha_reg_entrada
) VALUES ('$id_medicamentos','$fecha_venci','$cantidad_entrada','$fecha_hora')");
       if (mysqli_query(conexion::con(), $sql)) {
               header("Location:../../views/user/consulta_medicamentos.php?msj=añadido");       
        }else{
               header("Location:../../views/user/consulta_medicamentos.php?msj=error_al_añadir"); 
        }

?>