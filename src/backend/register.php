   
<?php
    session_start();
    include "../backend/conection.php";

    //Variables
    $rutaDestino;
    //Datos personales del usuario
    $newUser = $_POST['newUser'];
    $newPassword = $_POST['newPassword'];
    $newMail = $_POST['email'];
    $newImage = $_FILES['image'];

    //Datos de cultivo del usuario
    $newProvince = $_POST['province'];
    $newSeed = $_POST['seed'];
    $newInterval = $_POST['interval'];
    $newHectare = $_POST['hectare'];
    $newDate = $_POST['seedtime'];

    $dataUser = pg_query($conectado,"SELECT usuario FROM clientes WHERE (usuario='$newUser')");
    $dataUser = pg_fetch_assoc($dataUser); 

    $dataMail = pg_query($conectado,"SELECT correo FROM clientes WHERE (correo='$newMail')");
    $dataMail = pg_fetch_assoc($dataMail); 


    if(($dataMail && $dataMail['correo']===$newMail) || ($dataUser && $dataUser['usuario']===$newUser) ){        
        header('Location: http://localhost/agrocommerce/src/app/pages/account/register.php');
        exit();
        ## BUG
        ## Cuando se encuentra un usuario similar, se deberia mostrar un modal que indique las coincidencias
    }else{
          // Subida de image
          if(isset($_FILES['image'])) {
            $newImage = $_FILES['image'];
            $nombreArchivo = $newImage['name'];
            $tipoArchivo = $newImage['type'];
            $tamañoArchivo = $newImage['size'];
            $archivoTemporal = $newImage['tmp_name'];
        
            // Verifica si el archivo es de tipo PNG, JPG o JPEG
            $extensionesPermitidas = array('png', 'jpg', 'jpeg');
            $extension = pathinfo($nombreArchivo, PATHINFO_EXTENSION);
            if(!in_array(strtolower($extension), $extensionesPermitidas)) {
                echo "Solo se permiten archivos PNG, JPG o JPEG.";
            } elseif ($tamañoArchivo > 5 * 1024 * 1024) { // Verifica el tamaño máximo (5MB)
                echo "El archivo es demasiado grande. El tamaño máximo permitido es de 5MB.";
            } else {
                // Ruta de destino personalizada
                $rutaDestino = '../assets/profile-images/' . $nombreArchivo;
                move_uploaded_file($archivoTemporal, $rutaDestino);
                // if (move_uploaded_file($archivoTemporal, $rutaDestino)) {
                
                //     // Guardar la direccion en la BD
                //     $pi = pg_query($conectado,"INSERT INTO clientes(image_location) VALUES('$rutaDestino') WHERE (id = '$userID')");
                // } else {
                //     echo "Error al mover la imagen a la carpeta de destino.";
                // }
            }
        } else {
            echo "No se ha seleccionado ninguna imagen.";
        }
        // Condicional nuevo
        $pg = pg_query($conectado,"INSERT INTO clientes (usuario,clave,correo,image_location) VALUES ('$newUser','$newPassword','$newMail','$rutaDestino') RETURNING id");
        $userID = pg_fetch_result($pg, 0, 0);
        $pd = pg_query($conectado, "INSERT INTO cultivos_clientes (provincia,tipo_cultivo,intervalo,hectarea,fecha,fk_clientes) VALUES ('$newProvince','$newSeed','$newInterval','$newHectare','$newDate','$userID')");

     

        $_SESSION['user_id'] = $userID;
        header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');
        exit();

        ## BUG
        ## Cuando se registra correctamente, se deberia mostrar un modal que indique el exito en la creacion y luego redireccionar
    
    }
?>