<?php
include('../../bd/conexion.php');
//Variables recibidas
//print_r($_POST);


$cedula = $_POST['cedula'];
$nombre = $_POST['nombres'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$correo = $_POST['correo'];
$foto = basename( $_FILES["fileToUpload"]["name"]);

$sql = ("INSERT INTO empleado(id_registro,ci,nombre,apellido,fecha_nacimiento,estado_civil,fecha_ingreso,telefono,correo,direccion,fecha_registro,status) VALUES ('0','$cedula','$nombre','$apellido','','','','$telefono','$correo','','','1')");
  if (mysqli_query(conexion::con(), $sql)) {
    $consulta = ("SELECT  * FROM empleado ORDER BY id_empleado DESC LIMIT 1");
    $r=mysqli_query(conexion::con(), $consulta);
        foreach ($r as $key) {
            $id_ultimo = $key['id_empleado'];
            $sql1=("INSERT INTO cv(id_empleado,cv) VALUES ('$id_empleado','$foto')");
            if (mysqli_query(conexion::con(), $sql)) {
                header("Location:../../../vacante.php?msj=subido");
            }                     
        }
    }     



//fin de registro
$target_dir = "cv/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    //echo "Error, ya existe una imagen con ese nombre.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 1000000) {
      echo "Error, el archivo q intentas subir es demasiado pesado, intenta con uno q no pase de 500kb.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
      echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
      header("Location:../../../vacante.php?msj=subido"); 
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {        
      header("Location:../../../vacante.php?msj=subido");
    } else {
      header("Location:../../../vacante.php?msj=subido"); 

    }
  }
}

?>