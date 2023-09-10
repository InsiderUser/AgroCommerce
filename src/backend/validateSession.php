<?php
include "conection.php";
$userId = $_SESSION['user_id'];
$counter = 0;
// Obtener el cultivo segun el usuario
$pg = pg_query($conectado,"SELECT tipo_cultivo,intervalo,fecha,provincia,hectarea FROM cultivos_clientes WHERE fk_clientes = '$userId'");

   while ($row = pg_fetch_assoc($pg)) {
    echo("
    <div class=\"row m-4 align-items-center justify-content-evenly\">
    <div class=\"col-2\">
    <div class=\"icon-crop\">
      <img src=\"./../../assets/icons/" . $row['tipo_cultivo'] .".png\" alt=\"icono-" . $row['tipo_cultivo']."\">
    </div>
  </div>
  <div class=\"col-6\">
    <div class=\"list-group\">
    <a href=\"#\" class=\"list-group-item list-group-item-action\">
        <div class=\"d-flex w-100 justify-content-between\">
          <h5 class=\"mb-1\">Provincia</h5>
        </div>
        <p class=\"mb-1\">" . $row['provincia'] . "</p>
        <small class=\"text-body-secondary\">Actualmente hay ". $row['hectarea'] . " hectáreas cultivadas de " .  $row['tipo_cultivo'] . "</small>
      </a>
      <a href=\"#\" class=\"list-group-item list-group-item-action\" aria-current=\"true\">
        <div class=\"d-flex w-100 justify-content-between\">
          <h5 class=\"mb-1\">Fecha de siembra</h5>
        </div>
        <small>La siembra se estableció para: " . $row['fecha'] ."</small>
      </a>
      <a href=\"#\" class=\"list-group-item list-group-item-action\">
        <div class=\"d-flex w-100 justify-content-between\">
          <h5 class=\"mb-1\">Riego</h5>
        </div>
        <p class=\"mb-1\">El intervalo de tiempo elegido para hacer el riego a su cultivo es de " . $row['intervalo'] ." horas.</p>
        <small class=\"text-body-secondary\">Si cambia el clima será notificado.</small>
      </a>
    </div>
  </div>
  </div>");
       $counter = $counter+1;
   }
   
   if($counter > 1){
    // Si existe mas de un cultivo, el boton de agregar pasa a hidden
  //   echo(" <a href=\"../template/pages/samples/farming-register.php\">
  //   <button hidden class=\"btn btn-block btn-lg btn-gradient-primary mt-4\">
  //     + Anadir un cultivo
  //   </button>
  // </a>");
  
   }else{
    // Si existe solo un cultivo, el boton de agregar cultivo se muestra
  //   echo(" <a href=\"../template/pages/samples/farming-register.php\">
  //   <button class=\"btn btn-block btn-lg btn-gradient-primary mt-4\">
  //     + Anadir un cultivo
  //   </button>
  // </a>");
  
   }
?>

