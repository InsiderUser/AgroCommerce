<?php
  include "conection.php";
  $userId = $_SESSION['user_id'];
  $counter = 0;
  $a;
  $id_provincia = 0;
  // Obtener el cultivo segun el usuario
  $pg = pg_query($conectado,"SELECT tipo_cultivo,intervalo,fecha,provincia,hectarea FROM cultivos_clientes WHERE fk_clientes = '$userId'");
  $pg_perceptron = pg_query($conectado, "SELECT ph FROM perceptron");
  $pg_valor = pg_query($conectado, "SELECT valores FROM perceptron"); 
  
  $valor_perceptron = pg_fetch_assoc($pg_valor);
  $valor = pg_fetch_assoc($pg_perceptron);
  $ph = $valor['ph'];
  $pereceptron = $valor_perceptron['valores'];
  if ($pereceptron==1){
    $local = '';
    $local_neg = 'none';
  }
  else if($pereceptron==0){
    $local = 'none';
    $local_neg = '';
  }

  $flag = 0;
    while ($row = pg_fetch_assoc($pg)) {
      $flag = $flag +1;
      #Obtencion de la provincia de la db para utilizarla en la API por medio de JS.
      $a = $row['provincia'];
      echo "<div id='provincia_api_$id_provincia' style='display:none'>".$a."</div>";
      echo("
      <div class=\"row justify-content-between mx-1 mb-5\">
        <div class='d-flex align-items-center gap-2 mb-3 p-0'>
          <svg xmlns='http://www.w3.org/2000/svg' height='1em' viewBox='0 0 512 512' style='fill:#fd7c35'>
            <!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
            <path d='M512 32c0 113.6-84.6 207.5-194.2 222c-7.1-53.4-30.6-101.6-65.3-139.3C290.8 46.3 364 0 448 0h32c17.7 0 32 14.3 32 32zM0 96C0 78.3 14.3 64 32 64H64c123.7 0 224 100.3 224 224v32V480c0 17.7-14.3 32-32 32s-32-14.3-32-32V320C100.3 320 0 219.7 0 96z'/>
          </svg>
          <h5 class='m-0 text-uppercase'>" . $row['tipo_cultivo'] . "</h5>
        </div>
        <div class=\"col-md-8 col-sm-12\">
          <div class=\"list-group\">
            <a class=\"list-group-item list-group-item-action\" style=\"cursor: default;\">
              <div class=\"d-flex w-100 justify-content-between\">
                <h5 class=\"mb-1\">Provincia</h5>
              </div>
              <p id=\"prov\" class=\"mb-1\">" . $row['provincia'] . "</p>
              <small class=\"text-body-secondary\">Actualmente hay ". $row['hectarea'] . " hectárea/s cultivada/s de " .  $row['tipo_cultivo'] . "</small>
            </a>
            <a class=\"list-group-item list-group-item-action\" aria-current=\"true\" style=\"cursor: default;\">
              <div class=\"d-flex w-100 justify-content-between\">
                <h5 class=\"mb-1\">Fecha de siembra</h5>
              </div>
              <small>La siembra se estableció para el día: " . date("d/m/Y", strtotime($row['fecha'])) ."</small>
            </a>
            <a class=\"list-group-item list-group-item-action\" style=\"cursor: default;\">
              <div class=\"d-flex w-100 justify-content-between\">
                <h5 class=\"mb-1\">Riego</h5>
              </div>
              <p class=\"mb-1\">El intervalo de tiempo elegido para hacer el riego a su cultivo es de " . $row['intervalo'] ." horas.</p>
              <small class=\"text-body-secondary\">Si cambia el clima será notificado.</small>
              <div class='align-items-center d-flex justify-content-between w-100'>
                <small class='text-body-secondary'>*Para que se generen las notiicaciones, precione el botón cuando haya realizado el primer riego.</small>
                <button class='btn btn-primary text-light' type='button' id='btnRiego'>
                  <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check2-square' viewBox='0 0 16 16'>
                    <path d='M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z'/>
                    <path d='m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z'/>
                  </svg>
                  Activar riego
                </button>
                <p style=\"display:none;\" id='intervalPrinted" . $flag . "'>" . $row['intervalo'] . "</p>
              </div>
            </a>
            <a class=\"list-group-item list-group-item-action\" style=\"cursor: default;\">
              <div class=\"d-flex w-100 justify-content-between\">
                <h5 class=\"mb-1\">pH</h5>
              </div>
              <p class=\"mb-1\">El nivel de pH de su suelo es de $ph.</p>
              
              <!--!  ---------- Ph óptimo ----------  -->
              <small class=\"text-body-secondary\" style='display:$local;'>Según el nivel de pH y el nivel de humedad, su suelo se encuentra en óptimas condiciones.</small>
              <!--! ---------- Ph deficiente/malo ---------- -->
              <div class='d-flex flex-column'>
                <small class=\"text-body-secondary\" style='display:$local_neg;'>Según el nivel de pH y el nivel de humedad, su suelo no se encuentra en óptimas condiciones.</small>
                <button onclick=\"window.location='../pages/ph-level.php'\" class='bg-light link link-secondary p-0 link-opacity-75-hover' type='link' id='btnMejorarPH'>
                  <small>¿Cómo mejorar el Ph?</small>
                </button>
              </div>
            </a>
          </div>
        </div>
      </div>");
      $id_provincia++;
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

