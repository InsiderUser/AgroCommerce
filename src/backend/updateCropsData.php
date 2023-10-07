<?php
  include 'conection.php';
  session_start();
  $userId = $_SESSION['user_id'];
  
  //Obtencion del tipo cultivo del cliente, el intervalo y las hectareas enviadas por el formulario.
  $pd = pg_query("SELECT tipo_cultivo FROM cultivos_clientes WHERE fk_clientes=$userId");
  //Ya que el usuario puede tener multiples cultivos, se crea un arreglo multidim. con los mismos.
  $pd = pg_fetch_all($pd);
  $newInterval = $_POST['newInterval'];
  $newHectare = $_POST['newHectare'];


  // En funcion del formulario que envie el cliente (dependiendo del numero de cultivos que tenga) se ejecutara
  // el modulo correspondiente.
  
  if(isset($_POST['crop1'])){
    //Si el formulario 1 es enviado, entonces se obtienen los datos de la posicion 0 del arreglo multidim.
    $cropName = $pd[0]['tipo_cultivo'];

    //Se obtienen los datos de la BD coincidentes con el ID del usuario y el tipo de cultivo de la posicion 0 del arreglo.
    $data = pg_query($conectado, "SELECT intervalo,hectarea FROM cultivos_clientes WHERE (fk_clientes='$userId' AND tipo_cultivo='$cropName')");
    $data = pg_fetch_assoc($data);
  
    //Si hay variaciones en los datos ya existentes y en los datos actuales, se procede a actualizar los mismos.

    //Modificacion del intervalo de regado del cultivo
    if($data && $newInterval!=NULL && $data['intervalo']!=$newInterval){
    $pg=pg_query($conectado,"UPDATE cultivos_clientes SET intervalo='$newInterval' WHERE (fk_clientes='$userId' AND tipo_cultivo='$cropName')");
    header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');
    }else{
    header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');    
    }

    //Modificacion del numero de hectareas sembradas del cultivo
    if($data && $newHectare!=NULL && $data['hectarea']!=$newHectare){
      $pg=pg_query($conectado,"UPDATE cultivos_clientes SET hectarea='$newHectare' WHERE (fk_clientes='$userId' AND tipo_cultivo='$cropName')");
     header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');    
    }else{
     header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');    
    }
    
  }

  if(isset($_POST['crop2'])){
    $cropName = $pd[1]['tipo_cultivo'];
    
    $data = pg_query($conectado, "SELECT intervalo,hectarea FROM cultivos_clientes WHERE (fk_clientes='$userId' AND tipo_cultivo='$cropName')");
    $data = pg_fetch_assoc($data);
    
    if($data && $newInterval!=NULL && $data['intervalo']!=$newInterval){
    $pg=pg_query($conectado,"UPDATE cultivos_clientes SET intervalo='$newInterval' WHERE (fk_clientes='$userId' AND tipo_cultivo='$cropName')");
    header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');
    
    }else{
    header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');
    }

    if($data && $newHectare!=NULL && $data['hectarea']!=$newHectare){
      $pg=pg_query($conectado,"UPDATE cultivos_clientes SET hectarea='$newHectare' WHERE (fk_clientes='$userId' AND tipo_cultivo='$cropName')");
      header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');
      
    }else{
      header('Location: http://localhost/agrocommerce/src/app/pages/layout.php');
    }
  }

?>