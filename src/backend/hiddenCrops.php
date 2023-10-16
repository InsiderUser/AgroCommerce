<?php 
include "conection.php";
$userId = $_SESSION['user_id'];
$pg = pg_query("SELECT tipo_cultivo FROM cultivos_clientes WHERE fk_clientes=$userId");
$pg = pg_fetch_all($pg);
$flag = 0;

foreach ($pg as $fila) {
    if($pg!=null){
        echo('<p style="display:none;" id=cultivo'.$flag.'>'.$pg[$flag]['tipo_cultivo'].'</p>');
        $flag = $flag + 1;
    }else{
        echo("salida por null");
    }
}

?>