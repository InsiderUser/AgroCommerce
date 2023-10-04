<?php
  include "conection.php";
  $userId = $_SESSION['user_id'];
  $counter = 0;

  // Obtener el cultivo segun el usuario
  $pg = pg_query($conectado,"SELECT tipo_cultivo FROM cultivos_clientes WHERE fk_clientes = '$userId'");

  while ($row = pg_fetch_assoc($pg)) {
  //Iteracion del arreglo y almacenamiento del numero de ellas.
      $counter = $counter+1;
  }
  if ($counter<2) {
      //Si tiene un solo cultivo, se muestra el boton
      echo("<button type=\"button\" class=\"btn btn-secondary text-light w-auto\" id=\"buttonModal\" data-bs-toggle=\"modal\" data-bs-target=\"#modalNewCrop\">
      Agregar cultivo
    </button>");
  }else{
      //Si tiene 2 cultivos, el boton pasa a 'hidden'
      echo("<button type=\"button\" class=\"btn btn-secondary text-light w-auto\" id=\"buttonModal\" data-bs-toggle=\"modal\" data-bs-target=\"#modalNewCrop\" style=\"display:none;\">
      Agregar cultivo
    </button>");
  }
?>