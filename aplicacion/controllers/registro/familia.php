<?php 
include('../../bd/conexion.php');
//print_r($_POST)

$dni = $_POST['dni_f'];
$id_empleado = $_POST['id_empleado'];
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$parentesco = $_POST['parentesco'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$fecha_registro= date("Y-m-d");

$sql = ("INSERT INTO familia(id_empleado,dni,nombre,apellido,fecha_nacimiento,parentesco) VALUES ('$id_empleado','$dni','$nombre','$apellidos','$fecha_nacimiento','$parentesco')");
//die($sql);
    if (mysqli_query(conexion::con(), $sql)) {
               header("Location:../../views/admin/consulta_empleado.php?msj=exito"); 
           }else{
               header("Location:../../views/admin/consulta_empleado.php?msj=error_guardar"); 
        }
  
?>