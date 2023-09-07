<?php
session_start();
include "conection.php";

$dataUser = $_POST['email'];
$mail_db = pg_query($conectado, "SELECT correo,id FROM clientes WHERE correo = '$dataUser'");
$mail_db = pg_fetch_assoc($mail_db);

if($mail_db && $mail_db['correo'] == $dataUser){
    $_SESSION['mail_db'] = $mail_db; // Almacena el arreglo asociativo en la sesión
    $id = $mail_db['id']; // Obtén el valor del campo 'id'
    header('Location: http://localhost/agrocommerce/src/app/pages/account/change-password.html');
    exit();
}else{
    header('Location: http://localhost/agrocommerce/src/app/pages/account/recovery.html');
}


?>