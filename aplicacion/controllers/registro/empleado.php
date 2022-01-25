<?php 
include('../../bd/conexion.php');
//print_r($_POST)

$id_registro = $_POST['id_registro'];
$ci = $_POST['ci'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$estado_civil = $_POST['estado_civil'];
$fecha_ingreso = $_POST['fecha_ingreso'];
$telefono = $_POST['telefono_empleado'];
$correo = $_POST['correo'];
$direccion = $_POST['direccion'];
$sueldo = $_POST['sueldo'];
$fecha_registro= date("Y-m-d");

$sql = ("INSERT INTO empleado(id_registro,ci,nombre,apellido,fecha_nacimiento,estado_civil,fecha_ingreso,telefono,correo,direccion,fecha_registro,status) VALUES ('$id_registro','$ci','$nombre','$apellido','$fecha_nacimiento','$estado_civil','$fecha_ingreso','$telefono','$correo','$direccion','$fecha_registro','0')");
if (mysqli_query(conexion::con(), $sql)) {
    $consulta = ("SELECT  * FROM empleado ORDER BY id_empleado DESC LIMIT 1");
    $r=mysqli_query(conexion::con(), $consulta);
        foreach ($r as $key) {
            $id_ultimo = $key['id_empleado'];                     
        }
}
 
$sql1 = ("INSERT into sueldo(id_empleado,sueldo) values ('$id_ultimo','$sueldo')");
if (mysqli_query(conexion::con(), $sql1)) {
    header("Location:../../views/admin/empleados.php?msj=register"); 
}else{
    header("Location:../../views/admin/empleados.php?msj=error_guardar"); 
}
        
?>