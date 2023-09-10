<?php
session_start();
$userId = $_SESSION['user_id'];
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
    <link rel="stylesheet" href="clima.css">
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
              <a class="nav-link active" href="#"
                data-bs-toggle="tooltip" data-bs-placement="bottom"
                data-bs-custom-class="custom-tooltip"
                data-bs-title="Notificaciones"
              >
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell" viewBox="0 0 16 16">
                  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
                </svg>
              </a>
            </li>
            <li class="nav-item mx-3">
              <a class="nav-link" href="#"
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
      <div class="sidebar" id="sidebar">
        <ul class="nav d-flex flex-column p-2">
          <li class="nav-item">
            <a href="#" class="nav-link d-flex">
              <div class="nav-profile-image">
                <img src="../../assets/images/user-profile.png" alt="img--profile">
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
        <div class="page-header">
          <h4 class="page-title pb-4">Informacion de Cultivos</h4>
          <!-- <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Tables</a></li>
              <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
            </ol>
          </nav> -->
        </div>
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <p>En esa sección podrás realizar una búsqueda de un cultivo predeterminado, en cierta provincia y año. <br> Como resultado se mostrará una tabla con la información de la misma.</p>
                <form action="" method="post"><br>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                          <label for="cultivo">Seleccione el cultivo:</label>
                          <select class="form-select" name="cultivo">
                            <option value="0" selected></option>
                            <option value="centeno">Centeno</option>
                            <option value="girasol">Girasol</option>
                            <option value="mijo">Mijo</option>
                            <option value="soja">Soja</option>
                          </select>
                      </div>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-4">
                      <label for="provincia">Ingrese la provincia:</label>
                      <select class="form-select" name="provincia" id="selectProvince" required>
                            <option selected disabled>Selecciones su provincia</option>
                            <option value="Buenos Aires">BUENOS AIRES</option>
                            <option value="Catamarca">CATAMARCA</option>
                            <option value="Chaco">CHACO</option>
                            <option value="Chubut">CHUBUT</option>
                            <option value="Cordoba">CORDOBA</option>
                            <option value="Corrientes">CORRIENTES</option>
                            <option value="Entre Rios">ENTRE RIOS</option>
                            <option value="Formosa">FORMOSA</option>
                            <option value="Jujuy">JUJUY</option>
                            <option value="La Pampa">LA PAMPA</option>
                            <option value="La Rioja">LA RIOJA</option>
                            <option value="Mendoza">MENDOZA</option>
                            <option value="Misiones">MISIONES</option>
                            <option value="Neuquen">NEUQUEN</option>
                            <option value="Rio Negro">RIO NEGRO</option>
                            <option value="Salta">SALTA</option>
                            <option value="San Luis">SAN LUIS</option>
                            <option value="Santa Cruz">SANTA CRUZ</option>
                            <option value="Santa Fe">SANTA FE</option>
                            <option value="Santiago Del Estero">SANTIAGO DEL ESTERO</option>
                            <option value="Tierra del Fuego">TIERRA DEL FUEGO</option>
                            <option value="Tucuman">TUCUMAN</option>
                        </select>
                    </div>
                  </div>
                  <div class="row mt-2">
                    <div class="col-md-4">
                      <label for="cultivo">Ingrese el año:</label>
                      <input class="form-control" type="number" name="anio" value="0">
                    </div>
                  </div>
                  <button class="btn btn-primary px-4 mt-4" type="submit" style="font-weight: 500;">Enviar</button>
                </form>
                <?php
                      
                  include "../../backend/conection.php";

                  if (isset($_REQUEST['cultivo']) && isset($_REQUEST['anio']) && isset($_REQUEST['provincia'])) {
                    $opcion = $_REQUEST['cultivo'];
                    $anio = $_REQUEST['anio'];
                    $provincia = $_REQUEST['provincia'];
                  
                    if($opcion=='0' and $anio=='0' and $provincia='0'){
                      echo "Selecciona un cultivo";
                    }
                    else{
                      $query = "SELECT * from cultivos where cultivo_nombre = '$opcion' and anio='$anio' and provincia_nombre= '$provincia'";
      
                      $result = pg_query($conectado, $query);
                      if (!$result) {
                        echo "Error en la consulta.";
                          exit;
                      }

                      echo "<br><h6>Cultivo: $opcion</h6>";
                      echo "<h6>Provincia: $provincia</h6>";
                      echo "<h6>Año: $anio</h6><br>";
                      
                      $sumaTotal1 = 0;
                      $sumaTotal2 = 0;
                      $sumaTotal3 = 0;
                      $sumaTotal4 = 0;
                      
                      $contador = 0;
                      
                      while ($row = pg_fetch_assoc($result)) {
                        // Obtener el valor de la columna y sumarlo
                        $valorColumna_Superficie_Sembrada = (int)$row['superficie_sembrada_ha'];
                        $valorColumna_Superficie_Cosechada = (int)$row['superficie_cosechada_ha'];
                        $valorColumna_Produccion_Tonelada_Metro = (int)$row['produccion_tm'];
                        $valorColumna_Rendimiento_Economico_kg_metro = (int)$row['rendimiento_kgxha'];
                        
                        
                        $sumaTotal1 += $valorColumna_Superficie_Sembrada;
                        $sumaTotal2 += $valorColumna_Superficie_Cosechada;
                        $sumaTotal3 += $valorColumna_Produccion_Tonelada_Metro;
                        $sumaTotal4 += $valorColumna_Rendimiento_Economico_kg_metro;
                        $contador++;
                        
                      } 

                      if($sumaTotal1 == 0 & $sumaTotal2 == 0 & $sumaTotal1 == 0 & $sumaTotal2 == 0){
                        echo "NO SE HAN ENCONTRADO RESULTADOS PARA SU CONSULTA";
                      }
                      else{
                        $valor1 = number_format(($sumaTotal1/($contador-1)), 2);
                        $valor2 = number_format(($sumaTotal2/($contador-1)), 2);

                        echo "<table class='table table-hover caption-top'>";
                          echo "<caption>Los números resultantes de cada columna representan el promedio:</caption>";
                          echo "<thead>";
                            echo "<tr>
                                    <th scope='col'>Superficie Sembrada por Hectarea</th>
                                    <th scope='col'>Superficie Cosechada por Hectarea</th>
                                    <th scope='col'>Produccion Tonelada/metro</th>
                                    <th scope='col'>Rendimiento Economico kg/m</th>
                                  </tr>";
                          echo "</thead>";
                          echo "<tbody>";
                            echo "<tr>
                                    <td>" .$valor1."</td>
                                    <td>" .$valor2."</td>
                                    <td>" .number_format(($sumaTotal3/($contador-1)), 2)."</td>
                                    <td>" .number_format(($sumaTotal4/($contador-1)), 2)."</td>
                                  </tr>";
                          echo "</tbody>";
                        echo "</table>";            

                          // echo "<div class='single'>Promedio de Superficie Sembrada por Hectarea: " .$valor1."</div>";
                          // echo "<div class='single'>Promedio de Superficie Cosechada por Hectarea: " .$valor2."</div>";
                          // echo "<div class='single'>Promedio de Produccion Tonelada/metro: " .number_format(($sumaTotal3/($contador-1)), 2)."</div>";
                          // echo "<div class='single'>Promedio de Rendimiento Economico kg/m: " .number_format(($sumaTotal4/($contador-1)), 2)."</div>";
                      }
                    }

                    pg_close($conectado);
                  }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="./api.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
  </body>
</html>