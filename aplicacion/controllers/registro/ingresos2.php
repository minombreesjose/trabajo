<?php 
include('../../bd/conexion.php');
//print_r($_POST)

$id_empleado = $_POST['id_empleado'];
$tipo = $_POST['tipo'];
$id_b = $_POST['id_boletas'];
$codigo = $_POST['codigo'];
$concepto = $_POST['concepto'];
$ingreso = $_POST['ingreso'];
$descuento = $_POST['descuento'];
$fecha_registro= date("Y-m-d");

$sql = ("INSERT INTO ingresos_boleta(id_boleta,tipo_ingreso,codigo,conceptos,ingresos,descuento) VALUES ('$id_b','$tipo','$codigo','$concepto','$ingreso','$descuento')");
    if (mysqli_query(conexion::con(), $sql)) {
               header("Location:../../views/admin/boletas_pago_copia.php?msj=añadido&id_b=$id_b"); 
           }else{
               header("Location:../../views/admin/boletas_pago_copia.php?msj=error_guardar"); 
        }
       
?>