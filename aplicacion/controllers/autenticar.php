<?php 
    // conexion a la base de datos
    include("../bd/conexion.php");
    session_start();
    
    $fecha_hora = date('Y-m-d H:i:s'); 
    $usuario = $_POST["usuario"];
    $pass = hash('sha512', $_POST["pass"]);
   
    $consulta = ("SELECT * FROM usuario WHERE usuario='$usuario' AND pass='$pass' AND tipo='1' AND estatus='1'");
    $result=mysqli_query(conexion::con(), $consulta);
    $num=$result->num_rows; 

    if ($num>'0') {
        $_SESSION["aut"]="si";
        $_SESSION["tipo"]="tipo";
        $_SESSION["usuario"] = $usuario;
            header('location:../views/admin/home.php');
    }else{

    $consulta = ("SELECT * FROM usuario WHERE usuario='$usuario' AND pass='$pass' AND tipo='2' AND estatus='1'");
    $result=mysqli_query(conexion::con(), $consulta);
    $num=$result->num_rows; 

    if ($num>'0') {
        $_SESSION["aut"]="si";
        $_SESSION["tipo"]="tipo";
        $_SESSION["usuario"] = $usuario;
            header('location:../views/user/home.php');
    }else{
            header('location:../../login.php?msj=invalide');
    }
}
          
?>  

