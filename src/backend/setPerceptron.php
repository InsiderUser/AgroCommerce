<?php
//   session_start();
  include "conection.php";
  
  $cultivo = $_REQUEST['cultivoNombre'];
  $humedad = $_REQUEST['nivelHumedad'];
  $ph = $_REQUEST['nivelPh'];

  $pg = pg_query($conectado, "UPDATE perceptron SET humedad=$humedad");
  $pd= pg_query($conectado, "UPDATE perceptron SET ph=$ph");
  $cul = pg_query($conectado, "UPDATE perceptron SET cultivos='$cultivo'");

  header('Location: http://localhost/agrocommerce/src/app/pages/settings.php');

?>
