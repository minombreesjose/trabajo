<?php 
include('../../bd/conexion.php');
//print_r($_POST)


$id_boleta = $_POST['id_boleta'];
$id_empleado = $_POST['id_empleado'];
$dias_laborados = $_POST['dias_laborados'];
$dias_no_laborados = $_POST['dias_no_laborados'];
$dias_subsidiados = $_POST['dias_subsidiados'];
$horas_total_ordinaria = $_POST['horas_total_ordinaria'];
$minutos_ordinaria = $_POST['minutos_ordinaria'];
$hora_sobretiempo = $_POST['hora_sobretiempo'];
$minutos_sobretiempo = $_POST['minutos_sobretiempo'];
$tipo = $_POST['tipo'];
$motivo = $_POST['motivo'];
$dias_suspendidos = $_POST['dias_suspendidos'];
$otrosempleadores = $_POST['otrosempleadores'];
$condicion = $_POST['condicion'];
$fecha_registro= date("Y-m-d");

$array = $_POST['cuotas'];
$fecha_p = $_POST['fecha_p'];
$array_num = count($array);
for ($i = 0; $i < $array_num; ++$i){
    $ss= ("INSERT INTO amortizacion(id_credito,id_cliente,n_cuotas,fecha_pago,monto_credito,interes,monto_total,cuotas,estado) VALUES ('$ultimo','$id_beneficiario','$array[$i]','$fecha_p[$i]','$monto_credito','$interes','$deuda_total','$tramo','0')");
       //die($array);
        if (mysqli_query(conexion::con(), $ss)) {
          header("Location:../../views/admin/tasas_de_pago.php?id_credito=$ultimo&msj=fin");
    }
}

$sql = ("INSERT INTO boletas_pago(id_boleta,id_empleado,dias_laborados,dias_no_laborados,dias_subsidiados,condicion,fecha) VALUES ('$id_boleta','$id_empleado','$dias_laborados','$dias_no_laborados','$dias_subsidiados','$condicion','$fecha_registro')");
    if (mysqli_query(conexion::con(), $sql)) { 
          

$sql1 = ("INSERT INTO  jornada_ordinaria(id_boleta,total_horas,minutos) VALUES ('$id_boleta','$horas_total_ordinaria','$minutos_ordinaria')");
    if (mysqli_query(conexion::con(), $sql1)) {
         

$sql2 = ("INSERT INTO  motivo_suspencion(id_boleta,tipo,motivo,n_dias) VALUES ('$id_boleta','$tipo','$motivo','$dias_suspendidos')");
    if (mysqli_query(conexion::con(), $sql2)) {

$sql3 = ("INSERT INTO  otros_empleadores(id_boleta,empleadores) VALUES ('$id_boleta','$otrosempleadores')");
    if (mysqli_query(conexion::con(), $sql3)) {

$sql4 = ("INSERT INTO  sobre_tiempo(id_boleta,t_horas,min) VALUES ('$id_boleta','$hora_sobretiempo','$minutos_sobretiempo')");
    if (mysqli_query(conexion::con(), $sql4)) {
               header("Location:../../views/admin/boletas_pago.php?msj=exito"); 
           }else{
               header("Location:../../views/admin/boletas_pago.php?msj=error_guardar"); 
        }     	
}}}}

?>