<?php 
include('../../bd/conexion.php');
//print_r($_POST)

$id_boleta = $_POST['id_boleta'];//
$id_empleado = $_POST['id_empleado'];//
$periodo = $_POST['periodo'];
$dias_laborados = $_POST['dias_laborados'];
$dias_no_laborados = $_POST['dias_no_laborados'];
$dias_subsidiados = $_POST['dias_subsidiados'];
$condicion = $_POST['condicion'];
$jo_total_horas = $_POST['jo_total_horas'];
$jo_minutos = $_POST['jo_minutos'];
$s_horas = $_POST['s_horas'];
$s_minutos = $_POST['s_minutos'];
$tipo = $_POST['tipo'];
$motivo = $_POST['motivo'];
$n_dias = $_POST['n_dias'];
$otros_empleadores = $_POST['otros_empleadores'];
$sueldo = $_POST['sueldo'];
$fecha= date("Y-m-d");

$sql = ("INSERT INTO boletas_pago(id_empleado,periodo,dias_laborados,dias_no_laborados,dias_subsidiados,condicion,jo_total_horas,jo_minutos,s_horas,s_minutos,tipo,motivo,n_dias,otros_empleadores,sueldo,fecha) VALUES ('$id_empleado','$periodo','$dias_laborados','$dias_no_laborados','$dias_subsidiados','$condicion','$jo_total_horas','$jo_minutos','$s_horas','$s_minutos','$tipo','$motivo','$n_dias','$otros_empleadores','$sueldo','$fecha')");
    if (mysqli_query(conexion::con(), $sql)) { 
        header("Location:../../views/admin/consulta_de_boletas.php?msj=exito"); 
    }else{
        header("Location:../../views/admin/consulta_de_boletas.php?msj=error_guardar"); 
    }     	

?>