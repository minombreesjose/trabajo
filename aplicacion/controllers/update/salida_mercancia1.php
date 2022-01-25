<?php 
include('../../bd/conexion.php');
//print_r($_POST)

$id_mercancia = $_POST['id_mercancia'];
$id_salida_mercancia = $_POST['id_salida_mercancia'];
$cantidad_salida = $_POST['cantidad_salida'];
$precio_unidad = $_POST['precio_unidad'];

$total_pagar=$cantidad_salida*$precio_unidad;

$con2=("SELECT SUM(cant_ent) AS suma_entrada FROM historial_entrada WHERE id_mercancia='$id_mercancia'");
$res2=mysqli_query(conexion::con(), $con2);
    foreach ($res2 as $key2) {
$con1=("SELECT SUM(cantidad_salida) AS suma_salida FROM salida_mercancia WHERE id_mercancia='$id_mercancia'");
$res1=mysqli_query(conexion::con(), $con1);
    foreach ($res1 as $key1) {
    $s=$key2['suma_entrada']-$key1['suma_salida'];
        
}}

if ($cantidad_salida>$s) {
   header("Location:../../views/user/salida_mercancia.php?msj=sobre_girado"); 
}elseif ($cantidad<=$s) {

$sql = ("UPDATE salida_mercancia SET cantidad_salida='$cantidad_salida',total_pagar='$total_pagar' WHERE id_salida_mercancia='$id_salida_mercancia'");    
        if (mysqli_query(conexion::con(), $sql)) {
               header("Location:../../views/user/salida_mercancia.php?msj=actualizado"); 
           }else{
               header("Location:../../views/user/salida_mercancia.php?msj=error_update"); 
        }
}
?>