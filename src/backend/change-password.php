<?php       
    session_start(); // Inicia la sesión
    include "conection.php";
    
    $passEntry = $_POST['passEntry'];
    $passEntry2 = $_POST['passEntry2'];

    $mail_db = $_SESSION['mail_db'];
    $id = $mail_db['id'];

    echo("<h1>mail</h1>: " . $mail_db . " <h1>ID</h1>: " . $id);

    if($passEntry === $passEntry2){
        $pg = pg_query($conectado,"UPDATE clientes SET clave = '$passEntry' WHERE id = '$id'");
        header('Location: http://localhost/agrocommerce/src/app/pages/layout.php'); 
        // session_abort();
        // exit();
    }else{
        header('Location: http://localhost/agrocommerce/src/app/pages/account/change-password.html');
    }

?>