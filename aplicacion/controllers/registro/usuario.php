<?php 
include('../../bd/conexion.php');
//print_r($_POST);

$id_empleado =$_POST['id_empleado'];
$usuario = $_POST['usuario'];
$pass = hash('sha512', $_POST["pass"]);
$tipo = $_POST['tipo'];
$fecha = date('Y-m-d');

$sql = ("INSERT INTO usuario(id_empleado,usuario,pass,tipo,estatus,fecha_reg_user) VALUES ('$id_empleado','$usuario','$pass','$tipo','1','$fecha')");
if (mysqli_query(conexion::con(), $sql)) {
            header("Location:../../views/admin/consultar_usuario.php?msj=exito");
           }else{
            header('location:../../views/admin/home.php?msj=error_guardar');
        }

?>