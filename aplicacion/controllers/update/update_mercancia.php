<?php 
include('../../bd/conexion.php');
//print_r($_POST)

$codigo = $_POST['codigo'];
$id_mercancia = $_POST['id_mercancia'];
$descripcion = $_POST['descripcion'];
$tipo = $_POST['tipo'];
$precio_compra = $_POST['precio_compra'];
//$precio_venta = $_POST['precio_venta'];
$talla_calzado = $_POST['talla_calzado'];
$marca = $_POST['marca'];

$sql = ("UPDATE mercancia SET codigo='$codigo', id_tipo_mercancia='$tipo',id_marca_mercancia='$marca',talla_calzado='$talla_calzado',descripcion='$descripcion',precio_compra='$precio_compra',precio_venta='' WHERE id_mercancia='$id_mercancia'");  
        if (mysqli_query(conexion::con(), $sql)) {
               header("Location:../../views/admin/consulta_mercancia.php?msj=actualizado"); 
           }else{
               header("Location:../../views/admin/consulta_mercancia.php?msj=error_guardar"); 
           }
      
?>