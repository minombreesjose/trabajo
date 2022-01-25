<?php 
include('../../bd/conexion.php');

$id_registro = $_POST['id_registro'];
$codigo = $_POST['codigo'];
$marca = $_POST['marca'];
$tipo = $_POST['tipo'];
$cantidad = $_POST['cantidad'];
$descripcion = $_POST['descripcion'];
$talla_calzado = $_POST['talla_calzado'];
$precio_compra = $_POST['precio_compra'];
//$precio_venta = $_POST['precio_venta'];
$fecha_registro = date('Y-m-d');
$fecha_hora= date('Y-m-d H:i:s');



$sql = ("INSERT INTO mercancia(id_registro,codigo,id_tipo_mercancia,id_marca_mercancia,talla_calzado,descripcion,precio_compra,precio_venta) VALUES ('$id_registro','$codigo','$tipo','$marca','$talla_calzado','$descripcion','$precio_compra','')");
//die($sql);
if (mysqli_query(conexion::con(), $sql)) {
                     $consulta = ("SELECT  * FROM mercancia ORDER BY id_mercancia DESC LIMIT 1");
                      $r=mysqli_query(conexion::con(), $consulta);
                      foreach ($r as $key) {
                        $id_ultimo = $key['id_mercancia'];                     
                  }
                }


$sql = ("INSERT INTO historial_entrada(id_mercancia,cant_ent,fecha_reg_entrada
) VALUES ('$id_ultimo','$cantidad','$fecha_registro')");
if (mysqli_query(conexion::con(), $sql)) {
             header("Location:../../views/admin/registro_mercancia.php?msj=exito");
           }else {
             header("Location:../../views/admin/registro_mercancia.php?msj=error_guardar"); 
           } 
        
?>