<?php 
include('../../bd/conexion.php');
//print_r($_POST)


// leo las variables q envia mi formulario
$codigo = $_POST['codigo'];
$id_beneficiario = $_POST['id_beneficiario'];
$id_empleado = $_POST['id_empleado'];
$fecha = date('Y-m-d');
// fin


// ejecuto la consulta
$sql = ("UPDATE salida_mercancia SET status='1' WHERE status='0'");  
        if (mysqli_query(conexion::con(), $sql)) {

        	$sql1 = ("INSERT INTO codigo_salida(id_cliente,id_empleado,cod_salid,estatus,fecha_salida) VALUES ('$id_beneficiario','$id_empleado','$codigo','1','$fecha')");
                    if (mysqli_query(conexion::con(), $sql1)) {
               header("Location:../../views/admin/salida_mercancia.php?msj=fin"); 
           }else{
               header("Location:../../views/admin/salida_mercancia.php?msj=error_finalizar"); 
        }
}
//fin
?>