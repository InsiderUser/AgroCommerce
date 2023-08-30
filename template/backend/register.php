   
<?php

    include "conection.php";
    //Datos personales del usuario
    $newUser = $_POST['newUser'];
    $newPassword = $_POST['newPassword'];
    $newMail = $_POST['email'];

    //Datos de cultivo del usuario
    $newProvince = $_POST['province'];
    $newSeed = $_POST['seed'];
    $newInterval = $_POST['interval'];
    $newHectare = $_POST['hectare'];
    $newDate = $_POST['seedtime'];

    $data = pg_query($conectado,"SELECT usuario,clave FROM clientes WHERE usuario='$newUser'");
    $data = pg_fetch_assoc($data);

    if($data && $data['usuario']===$newUser){        
        header('Location: http://localhost/Agrocommerce/template/pages/samples/register.php');
        exit();
        ## BUG
        ## Cuando se encuentra un usuario similar, se deberia mostrar un modal que indique las coincidencias
    }else{
        $pg = pg_query($conectado,"INSERT INTO clientes (usuario,clave,correo,provincia,tipo_cultivo,intervalo,hectarea,fecha) VALUES ('$newUser','$newPassword','$newMail','$newProvince','$newSeed','$newInterval','$newHectare','$newDate')");
        header('Location: http://localhost/agrocommerce/template/');
        exit();

        ## BUG
        ## Cuando se registra correctamente, se deberia mostrar un modal que indique el exito en la creacion y luego redireccionar
    
    }
?>