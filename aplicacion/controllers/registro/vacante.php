<?php error_reporting(0); ?>
<?php 
include('../../bd/conexion.php');
 //Ejemplo curso PHP aprenderaprogramar.com

$time = time();
$hora = date("H:i:s", $time);
$id_registro = $_POST['id_registro'];
$vacante = $_POST['vacante'];
$descripcion = $_POST['descripcion'];
$fecha_publicacion= date("Y-m-d");

$sql = ("INSERT INTO vacante(id_registro,vacante,descripcion,hora,fecha_publicacion) VALUES ('$id_registro','$vacante','$descripcion','$hora','$fecha_publicacion')");
//die($sql);
    if (mysqli_query(conexion::con(), $sql)) {
               header("Location:../../views/admin/vacante.php?msj=exito"); 
           }else{
               header("Location:../../views/admin/vacante.php?msj=error_guardar"); 
        }
 
?>