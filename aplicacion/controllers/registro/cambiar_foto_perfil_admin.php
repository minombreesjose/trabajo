<?php
include('../../bd/conexion.php');
//Variables recibidas

$id_usuario = $_POST['id_usuario'];
$foto = basename( $_FILES["fileToUpload"]["name"]);

$fot = ("SELECT * FROM foto_usuario WHERE id_usuario = '$id_usuario'"); // consulta SQL
$resu = mysqli_query(conexion::con(), $fot); // leer resultados
$n = $resu->num_rows; // Contar registro
  

      // si existe algun registro con este ID
      if ($n == '1') {
        foreach ($resu as $f) {
        $er = $f['foto'];
        unlink("foto/$er");  // elimina mi foto de la carpeta donde esta alojada
        
        $sql = ("UPDATE foto_usuario SET foto='$foto' WHERE id_usuario='$id_usuario'");
        if (mysqli_query(conexion::con(), $sql)) {
                header("Location:../../views/admin/perfil.php?msj=cambiada"); 
            }else {
                header('location:../../views/admin/perfil.php?msj=error_cambiar');
          }
       }
       // Fin

       // si no existe ningun registro con este ID
        }elseif ($n == '0') {
            $sql1 = ("INSERT INTO foto_usuario(id_usuario,foto)VALUES('$id_usuario','$foto')");
            //die($sql1);
            if (mysqli_query(conexion::con(), $sql1)) {
                         header("Location:../../views/admin/perfil.php?msj=cambiada"); 
                    }else {
                        header('location:../../views/admin/perfil.php?msj=error_cambiar');
                    }
        }
        
       // Fin



//fin de registro
$target_dir = "foto/";
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
	header('location:../../views/admin/perfil.php?msj=cambiada');
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        
         header('location:../../views/admin/perfil.php?msj=cambiada');

    } else {
        header('location:../../views/admin/perfil.php?msj=error_cambiar');
    }
}
?>