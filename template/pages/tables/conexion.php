<?php
    $host = "localhost";
    $port = "5432"; //Alternar los puertos para que se pueda conectar (5432 o 5050)
    $user = "postgres";
    $pass = "postgres";
    $dbname = "agrocommercedb";

    $conectado = pg_connect("host=$host port=$port user=$user password=$pass dbname=$dbname");

    if (!$conectado) {
        echo "Error de conexión.";
        exit();
    }
?>