<?php
  session_start();
  $userId = $_SESSION['user_id'];
  // echo($userId);
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AgroCommerce</title>
    <!-- plugins:css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/custom.css">
    <link rel="shortcut icon" href="../../assets/images/Logo.ico" />
  </head>

  <body onload=consulta()>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container-fluid">
        <a class="navbar-brand mx-1" href="./layout.php">
          <img src="../../assets/images/Logo-02.svg" alt="Logo" width="30" height="26" class="d-inline-block align-text-top">
          <span class="navbar-brand-text">AGROCOMMERCE</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item mx-3">
              <a class="nav-link" href="../pages/settings.php"
                data-bs-toggle="tooltip" data-bs-placement="bottom"
                data-bs-custom-class="custom-tooltip"
                data-bs-title="Configuración"
              >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                  <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
                  <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
                </svg>
              </a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link" href="../pages/account/login.html"
                data-bs-toggle="tooltip" data-bs-placement="bottom"
                data-bs-custom-class="custom-tooltip"
                data-bs-title="Salir"
              >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="main-container d-flex">
      <!-- Sidebar -->
      <div class="sidebar" id="sidebar">
        <ul class="nav d-flex flex-column p-2">
          <li class="nav-item">
            <a href="./settings.php" class="nav-link d-flex">
              <div class="nav-profile-image">
               <?php
                include '../../backend/getImage.php'
               ?>
                <!-- <span class="login-status online"></span> -->
                <!--change to offline or busy as needed-->
              </div>
              <div class="nav-profile-text d-flex flex-column text-start">
                <?php
                include '../../backend/validateProfile.php';
                ?>
              </div>
            </a>
          </li>
          <li class="nav-item mt-3">
            <a class="nav-link" href="./layout.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-door" viewBox="0 0 16 16">
                <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146ZM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5Z"/>
              </svg>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item mt-3">
            <a class="nav-link" href="./crops.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-grid" viewBox="0 0 16 16">
                <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z"/>
              </svg>
              <span class="menu-title">Más sobre Cultivos</span>
            </a>
          </li>
          <li class="nav-item mt-3">
            <a class="nav-link" href="./pests-insecticides.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bug" viewBox="0 0 16 16">
              <path d="M4.355.522a.5.5 0 0 1 .623.333l.291.956A4.979 4.979 0 0 1 8 1c1.007 0 1.946.298 2.731.811l.29-.956a.5.5 0 1 1 .957.29l-.41 1.352A4.985 4.985 0 0 1 13 6h.5a.5.5 0 0 0 .5-.5V5a.5.5 0 0 1 1 0v.5A1.5 1.5 0 0 1 13.5 7H13v1h1.5a.5.5 0 0 1 0 1H13v1h.5a1.5 1.5 0 0 1 1.5 1.5v.5a.5.5 0 1 1-1 0v-.5a.5.5 0 0 0-.5-.5H13a5 5 0 0 1-10 0h-.5a.5.5 0 0 0-.5.5v.5a.5.5 0 1 1-1 0v-.5A1.5 1.5 0 0 1 2.5 10H3V9H1.5a.5.5 0 0 1 0-1H3V7h-.5A1.5 1.5 0 0 1 1 5.5V5a.5.5 0 0 1 1 0v.5a.5.5 0 0 0 .5.5H3c0-1.364.547-2.601 1.432-3.503l-.41-1.352a.5.5 0 0 1 .333-.623zM4 7v4a4 4 0 0 0 3.5 3.97V7H4zm4.5 0v7.97A4 4 0 0 0 12 11V7H8.5zM12 6a3.989 3.989 0 0 0-1.334-2.982A3.983 3.983 0 0 0 8 2a3.983 3.983 0 0 0-2.667 1.018A3.989 3.989 0 0 0 4 6h8z"/>
            </svg>
              <span class="menu-title">Plagas e insecticidas</span>
            </a>
          </li>
          <li class="nav-item mt-3">
            <a class="nav-link" href="./ph-level.php">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-layers" viewBox="0 0 16 16">
              <path d="M8.235 1.559a.5.5 0 0 0-.47 0l-7.5 4a.5.5 0 0 0 0 .882L3.188 8 .264 9.559a.5.5 0 0 0 0 .882l7.5 4a.5.5 0 0 0 .47 0l7.5-4a.5.5 0 0 0 0-.882L12.813 8l2.922-1.559a.5.5 0 0 0 0-.882l-7.5-4zm3.515 7.008L14.438 10 8 13.433 1.562 10 4.25 8.567l3.515 1.874a.5.5 0 0 0 .47 0l3.515-1.874zM8 9.433 1.562 6 8 2.567 14.438 6 8 9.433z"/>
            </svg>
              <span class="menu-title">Nivel de pH</span>
            </a>
          </li>
          <li class="nav-item mt-3">
            <a class="nav-link" href="./support.php">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-question-circle" viewBox="0 0 16 16">
                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                <path d="M5.255 5.786a.237.237 0 0 0 .241.247h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286zm1.557 5.763c0 .533.425.927 1.01.927.609 0 1.028-.394 1.028-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94z"/>
              </svg>
              <span class="menu-title">Soporte</span>
            </a>
          </li>
        </ul>
      </div>

      <div class="main-panel p-5">
        <div class="page-header row pb-4">
          <div class="col">
            <h4 class="page-title">Sobre mis cultivos</h4>
          </div>
          <div class="col-md-4 col-xxl-3 col-sm-6">
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
        </div>
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="row">
                  <div class="col-8">
                    <h5 class="page-title pb-4">Cultivos</h5>
                  </div>
                  <div class="col-4 text-end">
                    <!-- Button modal -->
                    <?php
                    include '../../backend/validateButton.php';
                    ?>
                  </div>
                </div>
                <?php
                include '../../backend/validateSession.php';
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal: agregar cultivo-->
    <div class="modal fade" id="modalNewCrop" tabindex="-1" aria-labelledby="modalNewCrop" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="modalNewCrop">Nuevo cultivo</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">

          <form
                  class="pt-3 needs-validation"
                  method="post"
                  action="../../backend/newFarm.php"
                  novalidate
                >
                  <!-- Provincia -->
                  <div class="form-group">
                    <select
                      class="form-control"
                      name="province"
                      required
                      id="exampleFormControlSelect2"
                    >
                      <option selected disabled>
                        En que provincia se ubicará?
                      </option>

                      <?php
                        include "../../backend/conection.php";
                        include "../../backend/perceptron.php";
                        echo "<div style='display:none'>".$valorPerceptron."</div>";
                        $provincias = pg_query($conectado,"SELECT DISTINCT provincia_nombre FROM cultivos;");
                        $provincias = pg_fetch_all($provincias);
                        mostrarProvincias($provincias);

                      function mostrarProvincias($provincias){
                          if ($provincias !== false) {
                              foreach ($provincias as $fila) {
                                  $provincia_nombre = $fila['provincia_nombre'];
                                  echo "<option value=\"$provincia_nombre\">$provincia_nombre</option>";
                              }
                          }
                      }
                      ?>
                    </select>
                    <div class="invalid-feedback text-start">
                      Debe seleccionar la provincia.
                    </div>
                  </div>
                  <!-- Cultivo -->
                  <div class="form-group mt-3">
                    <select name="seed" required class="form-control" id="exampleFormControlSelect2">
                      <option selected disabled>Que cultivo sembrará?</option>

                      <?php
                        include "../../backend/conection.php";
                        $cultivos = pg_query($conectado,"SELECT DISTINCT cultivo_nombre FROM cultivos");
                        $cultivos = pg_fetch_all($cultivos);
                        mostrarCultivos($cultivos);

                      function mostrarCultivos($cultivos){
                          if ($cultivos !== false) {
                              foreach ($cultivos as $fila) {
                                  $cultivo_nombre = $fila['cultivo_nombre'];
                                  echo "<option value=\"$cultivo_nombre\">$cultivo_nombre</option>";
                              }
                          }
                      }
                      ?>

                    </select>
                    <div class="invalid-feedback text-start">
                      Debe seleccionar el cultivo.
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="col-md-6">
                      <!-- Intervalo de riego -->
                      <div class="form-group">
                        <input
                          required
                          type="number"
                          name="interval"
                          class="form-control"
                          id="exampleInputUsername1"
                          placeholder="Intervalo de riego"
                        />
                        <div class="invalid-feedback text-start">
                          Debe ingresar el intervalo de riego.
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <!-- Numero de hectareas -->
                      <div class="form-group">
                        <input
                          required
                          type="number"
                          name="hectare"
                          class="form-control"
                          id="exampleInputUsername1"
                          placeholder="Hectareas cultivadas"
                        />
                        <div class="invalid-feedback text-start">
                          Debe ingresar el n° de hectareas cultivadas.
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Fecha de siembra -->
                  <div class="form-group mt-3">
                    <input
                      required
                      type="date"
                      name="seedtime"
                      class="form-control"
                      id="exampleInputUsername1"
                      placeholder="Fecha de siembra"
                    />
                    <div class="invalid-feedback text-start">
                      Debe ingresar la fecha de siembra.
                    </div>
                  </div>
                  <div class="modal-footer">
            <button type="submit" class="btn btn-primary text-light">Guardar cambios</button>
          </div>
                </form>
          </div>

        </div>
      </div>      
    </div>
    <script src="./api.js"></script>
    <script src="countdown.js"></script>
    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>


    <script>
      let btnStatus = document.getElementById('btnRiego');
      btnStatus.addEventListener("click", function() {
        console.log(`Conteo iniciado`);
        startLoop();
        
    });

    </script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <script>
      const myModal = document.getElementById('modalNewCrop')
      const myInput = document.getElementById('buttonModal')

      myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
      })
    </script>
    <script>
      (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
          form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
              event.preventDefault()
              event.stopPropagation()
            }

            form.classList.add('was-validated')
          }, false)
        })
      })()
    </script>
  </body>
</html>