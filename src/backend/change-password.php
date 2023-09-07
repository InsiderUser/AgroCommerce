<?php       
    session_start(); // Inicia la sesión
    include "../backend/conection.php";

    $passEntry = $_POST['passEntry'];
    $passEntry2 = $_POST['passEntry2'];

    $mail_db = $_SESSION['mail_db'];
    $id = $mail_db['id'];

    if($passEntry === $passEntry2){
        $pg = pg_query($conectado,"UPDATE clientes SET clave = '$passEntry' WHERE id = '$id'");
        //header('Location: http://localhost/agrocommerce/src/app/pages/layout.php'); 
        echo "Ingresó correctamente";
        session_abort();
        exit();
    }else{
        header('Location: http://localhost/agrocommerce/src/app/pages/account/change-password.html');
        exit();
    }

?>