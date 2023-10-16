<?php
  include "conection.php";
  $userId = $_SESSION['user_id'];
  $counter = 0;
  $a;
  // Obtener el cultivo segun el usuario
  $pg = pg_query($conectado,"SELECT tipo_cultivo,intervalo,fecha,provincia,hectarea FROM cultivos_clientes WHERE fk_clientes = '$userId'");
  $flag = 0;
    while ($row = pg_fetch_assoc($pg)) {
      $flag = $flag +1;
      $a = $row['provincia'];
      echo "<div id='provincia_api' style='display:none'>".$a."</div>";
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
            <a href=\"#\" class=\"list-group-item list-group-item-action\">
              <div class=\"d-flex w-100 justify-content-between\">
                <h5 class=\"mb-1\">Provincia</h5>
              </div>
              <p id=\"prov\" class=\"mb-1\">" . $row['provincia'] . "</p>
              <small class=\"text-body-secondary\">Actualmente hay ". $row['hectarea'] . " hectárea/s cultivada/s de " .  $row['tipo_cultivo'] . "</small>
            </a>
            <a href=\"#\" class=\"list-group-item list-group-item-action\" aria-current=\"true\">
              <div class=\"d-flex w-100 justify-content-between\">
                <h5 class=\"mb-1\">Fecha de siembra</h5>
              </div>
              <small>La siembra se estableció para el día: " . $row['fecha'] ."</small>
            </a>
            <a href=\"#\" class=\"list-group-item list-group-item-action\">
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
            <a href=\"#\" class=\"list-group-item list-group-item-action\">
              <div class=\"d-flex w-100 justify-content-between\">
                <h5 class=\"mb-1\">pH</h5>
              </div>
              <p class=\"mb-1\">El nivel de pH de su suelo es de [número].</p>
              <small class=\"text-body-secondary\">Según el nivel de ph y el nivel de humedad, su suelo se encuentra en óptimas condiciones para su/s cultivo/s.</small>
            </a>
          </div>
        </div>
        <div class=\"col-md-4 col-xxl-3 col-sm-6\">
          <div class='card background-light'>
            <div class='card-body'>
              <div class='row text-center my-3'>
                  <div class='d-flex flex-row justify-content-center align-items-center mb-1'>
                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-geo-alt' viewBox='0 0 16 16'>
                      <path d='M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z'/>
                      <path d='M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z'/>
                    </svg>
                    <h5 class='card-title m-0 mx-1' id='lugar'></h5><h5 class='card-title m-0 mx-1'>- ARG</h5>
                  </div>
                  <h6 id='titulo'></h6>
                  <div class='d-flex flex-row align-items-baseline justify-content-center'>
                      <div id='temp'></div>
                      <img id='icono' src='' alt='icono-temperatura'>
                  </div>
                  <div id='descripcion' class='mt-1'></div>
              </div>
            </div>
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

