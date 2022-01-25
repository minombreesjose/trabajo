<?php 
   include("../../bd/conexion.php");
   $usuario = $_SESSION["usuario"];
   $sql = ("SELECT * FROM usuario WHERE usuario = '$usuario'");
   $res=mysqli_query(conexion::con(), $sql);
    foreach ($res as $key) {
        $id = $key['id_usuario'];
        $user = $key['usuario'];
        $nombre = utf8_encode($key['nom_prof']);
    }
?>