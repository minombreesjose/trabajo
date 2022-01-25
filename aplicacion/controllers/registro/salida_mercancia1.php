<?php 
include('../../bd/conexion.php');
//print_r($_POST)

$id_registro = $_POST['id_registro'];
$codigo = $_POST['codigo'];
$id_mercancia = $_POST['id_mercancia'];
$cantidad = $_POST['cantidad'];
$precio_unidad=$_POST['precio_unidad'];
$total_pagar=$precio_unidad*$cantidad;
$fecha_salida= date("Y-m-d");

$con5=("SELECT *FROM mercancia WHERE id_mercancia='$id_mercancia'");
$res5=mysqli_query(conexion::con(), $con5);
foreach ($res5 as $key5) {
	$precio_c=$key5['precio_compra'];
	
}


$con2=("SELECT SUM(cant_ent) AS suma_entrada FROM historial_entrada WHERE id_mercancia='$id_mercancia'");
$res2=mysqli_query(conexion::con(), $con2);
    foreach ($res2 as $key2) {
$con1=("SELECT SUM(cantidad_salida) AS suma_salida FROM salida_mercancia WHERE id_mercancia='$id_mercancia'");
$res1=mysqli_query(conexion::con(), $con1);
    foreach ($res1 as $key1) {
    $s=$key2['suma_entrada']-$key1['suma_salida'];
        
}}

if ($cantidad>$s) {
   header("Location:../../views/user/salida_mercancia.php?msj=sobre_girado"); 
}elseif ($cantidad<=$s) {

$sql = ("INSERT INTO salida_mercancia(id_registro,cod_salida,id_mercancia,cantidad_salida,precio_c,precio_unidad,total_pagar,status,fecha_salida) VALUES ('$id_registro','$codigo','$id_mercancia','$cantidad','$precio_c','$precio_unidad','$total_pagar','0','$fecha_salida')");
    if (mysqli_query(conexion::con(), $sql)) {
               header("Location:../../views/user/salida_mercancia.php?msj=agregado"); 
           }else{
               header("Location:../../views/user/salida_mercancia.php?msj=error_guardar"); 
        }
}
?>