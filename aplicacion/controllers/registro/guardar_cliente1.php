<?php 
include('../../bd/conexion.php');
//print_r($_POST)

$id_registro = $_POST['id_registro'];
$cedula_beneficiario = $_POST['cedula_beneficiario'];
$nombre_beneficiario = $_POST['nombre_beneficiario'];
$apellido_beneficiario = $_POST['apellido_beneficiario'];
$telefono_beneficiario = $_POST['telefono_beneficiario'];
$correo_beneficiario = $_POST['correo_beneficiario'];
$direccion_beneficiario = $_POST['direccion_beneficiario'];
$fecha_registro= date("Y-m-d");

$sql = ("INSERT INTO beneficiario(id_registro,cedula_beneficiario,nombre_beneficiario,apellido_beneficiario,telefono_beneficiario,correo_beneficiario,direccion_beneficiario,fecha_registro) VALUES ('$id_registro','$cedula_beneficiario','$nombre_beneficiario','$apellido_beneficiario','$telefono_beneficiario','$correo_beneficiario','$direccion_beneficiario','$fecha_registro')");
    if (mysqli_query(conexion::con(), $sql)) {
               header("Location:../../views/user/clientes.php?msj=guardado"); 
           }else{
               header("Location:../../views/user/clientes.php?msj=error_guardar"); 
        }

?>