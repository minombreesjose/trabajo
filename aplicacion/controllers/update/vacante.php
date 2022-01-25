<?php error_reporting(0); ?>
<?php 
include('../../bd/conexion.php');

$id_vacante = $_POST['id_vacante'];
$vacante = $_POST['vacante'];
$descripcion = $_POST['descripcion'];


$sql = ("UPDATE vacante SET vacante='$vacante',descripcion='$descripcion' WHERE id_vacante='$id_vacante'");
//die($sql);
    if (mysqli_query(conexion::con(), $sql)) {
               header("Location:../../views/admin/consultar_vacantes.php?msj=update"); 
           }else{
               header("Location:../../views/admin/consultar_vacantes.php?msj=error_guardar"); 
        }
 
?>