<?php 
include('../../bd/conexion.php');
//print_r($_POST);

$id_empleado = $_POST['id_empleado'];
$ci = $_POST['ci'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$estado_civil = $_POST['estado_civil'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$sueldo=$_POST['sueldo'];


$sql = ("UPDATE empleado SET ci='$ci',nombre='$nombre',apellido='$apellido',fecha_nacimiento='$fecha_nacimiento',telefono='$telefono',estado_civil='$estado_civil',fecha_ingreso='$fecha_ingreso',telefono='$telefono',correo='$correo',direccion='$direccion' WHERE id_empleado='$id_empleado'");
//die($sql);
if (mysqli_query(conexion::con(), $sql)) {
$sql1 = ("UPDATE sueldo SET sueldo='$sueldo' WHERE id_empleado='$id_empleado'");
if (mysqli_query(conexion::con(), $sql1)) {
               header("Location:../../views/admin/consulta_empleado.php?msj=actualizado");
               } 
           }else{
               header("Location:../../views/admin/consulta_empleado.php?msj=error_guardar"); 
        }
?>