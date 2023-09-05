<?php
include "../template/backend/conection.php";
$userId = $_SESSION['user_id'];
$counter = 0;
// Obtener el cultivo segun el usuario
$pg = pg_query($conectado,"SELECT tipo_cultivo FROM cultivos_clientes WHERE fk_clientes = '$userId'");


   while ($row = pg_fetch_assoc($pg)) {
       echo "<a class=\"nav-link\" href=\"#\">Cultivo: " . $row['tipo_cultivo'] . "</a>";
       $counter = $counter+1;
   }
   
   if($counter > 1){
    // Si existe mas de un cultivo, el boton de agregar pasa a hidden
    echo(" <a href=\"../template/pages/samples/farming-register.php\">
    <button hidden class=\"btn btn-block btn-lg btn-gradient-primary mt-4\">
      + Anadir un cultivo
    </button>
  </a>");
   }else{
    // Si existe solo un cultivo, el boton de agregar cultivo se muestra
    echo(" <a href=\"../template/pages/samples/farming-register.php\">
    <button class=\"btn btn-block btn-lg btn-gradient-primary mt-4\">
      + Anadir un cultivo
    </button>
  </a>");
   }



?>
