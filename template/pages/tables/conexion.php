<?php
    $host = "localhost";
    $port = "5432";
    $user = "postgres";
    $pass = "postgres";
    $dbname = "datasets";

    $conectado = pg_connect("host=$host port=$port user=$user password=$pass dbname=$dbname");

    if (!$conectado) {
        echo "Error de conexión.";
        exit;
    }
?>