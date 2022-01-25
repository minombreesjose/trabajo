<?php 
include('../../bd/conexion.php');
//print_r($_POST);

// datos a registrar en la tabla ingresos_boleta
$id_boleta = $_POST['id_boleta'];
$codigo = $_POST['codigo'];
$conceptos = $_POST['conceptos'];
$ingresos = $_POST['ingresos'];
$descuento = $_POST['descuento'];
$tipo_ingreso = $_POST['tipo_ingreso'];
$array_num = count($tipo_ingreso);
// fin

// datos a registrar en la tabla aportes
$cod_num = count($_POST['cod']);
$cod = $_POST['cod'];
$descripcion = $_POST['descripcion'];
$neto = $_POST['neto'];
// fin

// otras variables
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

for ($i = 0; $i < $array_num; ++$i){
$sql = ("INSERT INTO ingresos_boleta(id_boleta,tipo_ingreso,codigo,conceptos,ingresos,descuento) VALUES ('$id_boleta','$tipo_ingreso[$i]','$codigo[$i]','$conceptos[$i]','$ingresos[$i]','$descuento[$i]')");
    if (mysqli_query(conexion::con(), $sql)) {
    }
}

for ($i = 0; $i < $cod_num; ++$i){
$sql = ("INSERT INTO aportes(id_boleta,codigo,descripcion,neto) VALUES ('$id_boleta','$cod[$i]','$descripcion[$i]','$neto[$i]')");
//die($sql);
    if (mysqli_query(conexion::con(), $sql)) {
    	//header("Location:../../views/admin/boletas_pago.php?msj=exito");
    	}else{
              // header("Location:../../views/admin/boletas_pago.php?msj=error_guardar"); 
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
               header("Location:../../views/admin/boletas_pago_copia.php?msj=copiado&id_b=$id_boleta"); 
           }else{
               header("Location:../../views/admin/boletas_pago_copia.php?msj=error_guardar"); 
        }     	
}}}}
?>