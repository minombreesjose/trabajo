<?php 
include('../../bd/conexion.php');
//print_r($_POST);

$cedula_medico =$_POST['cedula_medico'];
$nombre_medico = $_POST['nombre_medico'];
$telefono_medico = $_POST['telefono_medico'];
$profesion = $_POST['profesion'];

$sql = ("INSERT INTO medico(cedula_medico,nombre_medico,telefono_medico,profesion) VALUES ('$cedula_medico','$nombre_medico','$telefono_medico','$profesion')");
if (mysqli_query(conexion::con(), $sql)) {
            header("Location:../../views/admin/consultar_medico.php?msj=exito_medico");
           }else{
            header('location:../../views/admin/home.php?msj=error_guardar');
        }

?>