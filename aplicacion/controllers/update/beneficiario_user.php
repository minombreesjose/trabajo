<?php 
include('../../bd/conexion.php');
//print_r($_POST)

$id_beneficiario = $_POST['id_beneficiario'];
$nombre_beneficiario = $_POST['nombre_beneficiario'];
$apellido_beneficiario = $_POST['apellido_beneficiario'];
$telefono_beneficiario = $_POST['telefono_beneficiario'];
$direccion_beneficiario = $_POST['direccion_beneficiario'];
$correo_beneficiario = $_POST['correo_beneficiario'];
$fecha_registro= date("Y-m-d");

$sql = ("UPDATE beneficiario SET nombre_beneficiario='$nombre_beneficiario',apellido_beneficiario='$apellido_beneficiario',telefono_beneficiario='$telefono_beneficiario',correo_beneficiario='$correo_beneficiario',direccion_beneficiario='$direccion_beneficiario' WHERE id_beneficiario='$id_beneficiario'");
    if (mysqli_query(conexion::con(), $sql)) {
               header("Location:../../views/user/clientes.php?msj=actualizado"); 
           }else{
               header("Location:../../views/user/clientes.php?msj=error_guardar"); 
        }

?>