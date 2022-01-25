<?php 
include('../../bd/conexion.php');
//print_r($_POST);

$id_medico =$_POST['id_medico'];
$cedula_medico = $_POST['cedula_medico'];
$nombre_medico = $_POST['nombre_medico'];
$telefono_medico = $_POST['telefono_medico'];
$profesion = $_POST['profesion'];

$sql = ("UPDATE medico SET cedula_medico='$cedula_medico',nombre_medico='$nombre_medico',telefono_medico='$telefono_medico',profesion='$profesion' WHERE id_medico='$id_medico'");
if (mysqli_query(conexion::con(), $sql)) {
            header("Location:../../views/admin/consultar_medico.php?msj=actualizado");
           }else{
            header('location:../../views/admin/consultar_medico.php?msj=error_guardar');
        }

?>