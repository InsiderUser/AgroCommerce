<?php
  include 'conection.php';
  session_start();
  $userId = $_SESSION['user_id'];
  
//Traer los datos correspondientes al usuario actuales en la base de datos
  $data = pg_query($conectado, "SELECT intervalo,hectarea FROM cultivos_clientes WHERE fk_clientes='$userId'");
  $data = pg_fetch_assoc($data);

//   Obtener los datos ingresados por el usuario en el formulario
  $newInterval = $_POST['newInterval'];
  $newHectare = $_POST['newHectare'];

//   Comparar los datos ingresados con los actuales

if($data && $newInterval!=NULL && $data['intervalo']!=$newInterval){
    $pg=pg_query($conectado,"UPDATE cultivos_clientes SET intervalo='$newInterval' WHERE fk_clientes='$userId'");
    header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');
}else{

  header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');
}

if($data && $newHectare!=NULL && $data['hectarea']!=$newHectare){
    $pg=pg_query($conectado,"UPDATE cultivos_clientes SET hectarea='$newHectare' WHERE fk_clientes='$userId'");
    header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');
}else{
    
}



?>