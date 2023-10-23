<?php
include 'conection.php';
session_start();
$userId = $_SESSION['user_id'];

//Consultar cuantos y cuales cultivos tiene el cliente en su cuenta
$pg = pg_query($conectado, "SELECT tipo_cultivo FROM cultivos_clientes WHERE fk_clientes='$userId'");
$pg = pg_fetch_all($pg);
$count = count($pg);


if($count<2){
    header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');
}else{
    if(isset($_REQUEST['deleteCrop1'])){
    //Seleccionar el cultivo que tenga menor denominacion de ID
       $let =$pg[0]['tipo_cultivo'];
       $delete=pg_query($conectado,"DELETE FROM cultivos_clientes WHERE tipo_cultivo='$let'");
       header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');
    }

    if(isset($_REQUEST['deleteCrop2'])){
        $let =$pg[1]['tipo_cultivo'];
        $delete=pg_query($conectado,"DELETE FROM cultivos_clientes WHERE tipo_cultivo='$let'");
        header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');
    }
    
}





?>