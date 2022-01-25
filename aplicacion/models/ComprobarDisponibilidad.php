<?php
require_once("../bd/DBController.php");
$db_handle = new DBController();


if(!empty($_POST["ci"])) {
  $query = "SELECT * FROM empleado WHERE ci='" . $_POST["ci"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='estado-no-disponible-cedula'><font color='red'>DNI en Uso.</font> <br></span>";
  }else{
      echo "<span class='estado-disponible-cedula'><font color='green'>Continua llenando los campos.</font> <br></span>";
  }
}

if(!empty($_POST["dni_f"])) {
  $query = "SELECT * FROM familia WHERE dni='" . $_POST["dni_f"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='estado-no-disponible-cedula'><font color='red'>DNI en Uso.</font> <br></span>";
  }else{
      echo "<span class='estado-disponible-cedula'><font color='green'>Continua llenando los campos.</font> <br></span>";
  }
}


if(!empty($_POST["usuario"])) {
  $query = "SELECT * FROM usuario WHERE usuario='" . $_POST["usuario"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='estado-no-disponible-usuario'><font color='red'>Correo ya se encuentra registrado.</font> <br></span>";
  }else{
      echo "<span class='estado-disponible-usuario'><font color='green'>Continua llenando los campos.</font> <br></span>";
  }
}

if(!empty($_POST["codigo_CUSPP"])) {
  $query = "SELECT * FROM empleado WHERE codigo_CUSPP='" . $_POST["codigo_CUSPP"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='estado-no-disponible-usuario'><font color='red'>codigo CUSPP en Uso.</font> <br></span>";
  }else{
      echo "<span class='estado-disponible-usuario'><font color='green'>Continua llenando los campos.</font> <br></span>";
  }
}

if(!empty($_POST["correo"])) {
  $query = "SELECT * FROM empleado WHERE correo='" . $_POST["correo"] . "'";
  $user_count = $db_handle->numRows($query);
  if($user_count>0) {
      echo "<span class='estado-no-disponible-usuario'><font color='red'>Correo en Uso.</font> <br></span>";
  }else{
      echo "<span class='estado-disponible-usuario'><font color='green'>Continua llenando los campos.</font> <br></span>";
  }
}

?>