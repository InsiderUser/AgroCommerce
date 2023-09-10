<?php
    include 'conection.php';
    session_start();
    $userId = $_SESSION['user_id'];

    $newProvince = $_POST['province'];
    $newSeed = $_POST['seed'];
    $newInterval = $_POST['interval'];
    $newHectare = $_POST['hectare'];
    $newDate = $_POST['seedtime'];

    $pd = pg_query($conectado, "INSERT INTO cultivos_clientes (provincia,tipo_cultivo,intervalo,hectarea,fecha,fk_clientes) VALUES ('$newProvince','$newSeed','$newInterval','$newHectare','$newDate','$userId')");
    header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');
    ?>