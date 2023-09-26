<?php
  include 'conection.php';
  session_start();
  $userId = $_SESSION['user_id'];
  
//Traer los datos correspondientes al usuario actuales en la base de datos
  $data = pg_query($conectado, "SELECT usuario,clave,image_location FROM clientes WHERE id='$userId'");
  $data = pg_fetch_assoc($data);

//   Obtener los datos ingresados por el usuario en el formulario
  $newUSer = $_POST['newUser'];
  $newImage = $_FILES['newImage'];

  $actualPass = $_POST['actualPassword'];
  $newPass = $_POST['newPassword'];
  $confirmPass = $_POST['confirmPassword'];



//   Comparar los datos ingresados con los actuales

// Validacion y cambio del username
if($data && $newUSer!=NULL && $data['usuario']!=$newUSer){
    $pg=pg_query($conectado,"UPDATE clientes SET usuario='$newUSer' WHERE id='$userId'");
    header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');
}else{
  header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');
  // echo("alert(\"Error\");");
}

// Validacion y cambio de la clave
if($data && $data['clave']===$actualPass && $actualPass!=NULL){
    if($newPass===$confirmPass && $newPass!=NULL && $confirmPass!=NULL && $newPass!=$actualPass){
        $pg=pg_query($conectado,"UPDATE clientes SET clave='$confirmPass' WHERE id='$userId'");
        header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');
    }else{
      header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');
    }
}else{  
}
// Validacion y cambio de imagen de perfil
if($newImage!=NULL){
  if(isset($_FILES['newImage'])) {
    $newImage = $_FILES['newImage'];
    $nombreArchivo = $newImage['name'];
    $tipoArchivo = $newImage['type'];
    $tamañoArchivo = $newImage['size'];
    $archivoTemporal = $newImage['tmp_name'];

    // Verifica si el archivo es de tipo PNG, JPG o JPEG
    $extensionesPermitidas = array('png', 'jpg', 'jpeg');
    $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
    if(!in_array(strtolower($extension), $extensionesPermitidas)) {
        
    } elseif ($tamañoArchivo > 5 * 1024 * 1024) { // Verifica el tamaño máximo (5MB)
        
    } else {
        // Ruta de destino personalizada
        $rutaDestino = '../assets/profile-images/' . $nombreArchivo;
        move_uploaded_file($archivoTemporal, $rutaDestino);
        $pg=pg_query($conectado,"UPDATE clientes SET image_location='$rutaDestino' WHERE id='$userId'");     
        header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');   
    }
  }
}else{
  header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');
}


?>