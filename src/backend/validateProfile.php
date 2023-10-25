<?php
    include "conection.php";
    $userId = $_SESSION['user_id'];
    $pg = pg_query($conectado,"SELECT usuario FROM clientes WHERE id = '$userId'");
    $pg = pg_fetch_assoc($pg);
    echo("<span id='usernameIdentifier' class='font-weight-bold text-secondary' style='font-weight: 500;'>" .$pg['usuario']."</span>");
?>