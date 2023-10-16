<?php
//   session_start();
  include "conection.php";

  $humedad = $_REQUEST['nivelHumedad'];
  $ph = $_REQUEST['nivelPh'];

  $pg = pg_query($conectado, "UPDATE perceptron SET humedad=$humedad");
  $pd= pg_query($conectado, "UPDATE perceptron SET ph=$ph");

  header('Location: http://localhost/agrocommerce/src/app/pages/settings.php');

?>
