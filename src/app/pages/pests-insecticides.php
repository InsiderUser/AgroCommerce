<?php
session_start();
$userId = $_SESSION['user_id'];
// echo($userId);
?>
<?php
  include "../../backend/hiddenCrops.php";
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
  <body>
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
      <div class="sidebar" id="sidebar">
        <ul class="nav d-flex flex-column p-2">
          <li class="nav-item">
            <a href="#" class="nav-link d-flex">
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
          <h4 class="page-title pb-4">Plagas e insecticidas</h4>
        </div>
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <ul class="nav nav-tabs"id="myTab" role="tablist">
                    
                  <li class="nav-item" role="presentation">
                    <button style="display:none;" class="nav-link active" id="centeno-tab" data-bs-toggle="tab" data-bs-target="#centeno-tab-pane" type="button" role="tab" aria-controls="centeno-tab-pane" aria-selected="true">Centeno</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button style="display:none;" class="nav-link" id="girasol-tab" data-bs-toggle="tab" data-bs-target="#girasol-tab-pane" type="button" role="tab" aria-controls="girasol-tab-pane" aria-selected="true">Girasol</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button style="display:none;" class="nav-link disabled" id="maiz-tab" data-bs-toggle="tab" data-bs-target="#maiz-tab-pane" type="button" role="tab" aria-controls="maiz-tab-pane" aria-selected="true">Maíz</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button style="display:none;" class="nav-link" id="mijo-tab" data-bs-toggle="tab" data-bs-target="#mijo-tab-pane" type="button" role="tab" aria-controls="mijo-tab-pane" aria-selected="true">Mijo</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button style="display:none;" class="nav-link" id="soja-tab" data-bs-toggle="tab" data-bs-target="#soja-tab-pane" type="button" role="tab" aria-controls="soja-tab-pane" aria-selected="true">Soja</button>
                  </li>
                </ul>

  <!-- centeno has show and active -->
                <div class="tab-content pt-4 pb-2 px-2" id="myTabContent" >

                  <div class="tab-pane fade" id="centeno-tab-pane" role="tabpanel" aria-labelledby="centeno-tab" tabindex="0">
                    <h5>Plagas Comunes en Cultivos de Centeno (Secale cereale)</h5>
                    <br>
                    <h6>Plagas habitualmente asociadas</h6>
                    <ol>
                      <li>Royas: diversos tipos de royas, como la roya de la hoja (Puccinia recondita),
                        pueden afectar al centeno. Provocan manchas amarillas o rojas en las hojas,
                        lo que reduce la capacidad de fotosíntesis.</li>
                      <li>Ácaros: como el ácaro araña (Tetranychus urticae), suelen causar
                        decoloración y decoloración de las hojas, afectando la salud general de la
                        planta.</li>
                      <li>Gorgojos del Grano: los gorgojos, como el gorgojo del centeno (Sitophilus
                        granarius), pueden dañar los granos almacenados y disminuir la calidad del
                        producto.</li>
                      <li>Barrenadores de Tallo: los barrenadores, como el barrenador del tallo del
                        centeno (Elasmopalpus lignosellus), perforan los tallos y debilitan la planta, lo
                        que puede resultar en pérdida de rendimiento.</li>
                    </ol>

                    <br>
                    <h6>Impacto en el cultivo</h6>
                    <ul>
                      <li>Las plagas pueden disminuir la calidad y cantidad de la cosecha de centeno.</li>
                      <li>Reducción de la fotosíntesis y capacidad de la planta para producir granos.</li>
                      <li>Riesgo de pérdida económica para los agricultores.</li>
                    </ul>
                    <br>
                    <h6>Medidas de control y prevención</h6>
                    <ul>
                      <li>Monitoreo regular de las plantas para detectar signos tempranos de infestación.</li>
                      <li>Uso de prácticas de manejo integrado de plagas, como rotación de cultivos y cultivo adecuado.</li>
                      <li>Aplicación controlada y oportuna de pesticidas naturales o químicos según sea necesario.</li>
                      <li>Almacenamiento adecuado de granos para evitar la proliferación de gorgojos.</li>
                    </ul>
                    <br>
                    <h6>Datos Relevantes</h6>
                    <ul>
                      <li>Porcentaje promedio de pérdida de rendimiento debido a plagas.</li>
                      <li>Nivel de infestación de ácaros y gorgojos en los últimos 6 meses.</li>
                    </ul>
                    <br>
                    <h6>Insecticidas y formas de combatir las plagas</h6>
                    <ol>
                      <li>Royas: Fungicidas sistémicos y protectores pueden ser utilizados para
                        controlar las royas. Ejemplos de ingredientes activos incluyen triazoles,
                        estrobilurinas y cuperatios. Rotación de cultivos para reducir la acumulación
                        de patógenos en el suelo.</li>
                      <li>Ácaros: Acaricidas específicos, como el azufre, pueden ser efectivos contra
                        ácaros en cultivos de centeno. Uso de insecticidas botánicos, como aceites
                        esenciales, puede ayudar a controlar las poblaciones de ácaros.</li>
                      <li>Gorgojos del Grano: Insecticidas en polvo o aerosoles aprobados para el
                        tratamiento de granos almacenados, como el fosfuro de aluminio. Mantener
                        un ambiente de almacenamiento limpio y seco para prevenir la proliferación
                        de gorgojos.</li>
                      <li>Para Barrenadores de Tallo: Aplicación de insecticidas específicos para el
                        control de larvas de insectos perforadores de tallo. Prácticas culturales como
                        la eliminación de restos de cultivos y la destrucción de plantas infestadas.</li>
                    </ol>
                  </div>
                  <div class="tab-pane fade" id="girasol-tab-pane" role="tabpanel" aria-labelledby="girasol-tab" tabindex="0">
                    <h5>Plagas Comunes en Cultivos de Girasol (Helianthus annuus)</h5>
                    <br>
                    <h6>Plagas habitualmente asociadas</h6>
                    <ol>
                      <li>Mosca Blanca del Girasol (Trialeurodes vaporariorum): Los adultos y las
                        ninfas de mosca blanca pueden alimentarse de la savia de las plantas de
                        girasol, debilitándolas y causando decoloración de las hojas.</li>
                      <li>Orugas Defoliadoras (Spodoptera spp.): Las orugas defoliadoras se
                        alimentan de las hojas del girasol, lo que puede reducir la superficie foliar y
                        afectar la fotosíntesis.</li>
                      <li>Pulgones (Aphis spp.): Los pulgones pueden transmitir virus a las plantas
                        de girasol y causar deformaciones en las hojas y flores.</li>
                      <li>Escarabajos de la Flor (Meligethes spp.): Estos escarabajos se alimentan
                        de las flores del girasol, lo que puede disminuir la formación de semillas.</li>
                    </ol>

                    <br>
                    <h6>Impacto en el cultivo</h6>
                    <ul>
                      <li>Disminución de la producción de semillas y aceite.</li>
                      <li>Daño a las hojas y flores, afectando la salud general de la planta.</li>
                      <li>Riesgo de propagación de enfermedades por vectores de plagas</li>
                    </ul>
                    <br>
                    <h6>Medidas de control y prevención</h6>
                    <ul>
                      <li>Monitoreo regular de las plantas para detectar signos de infestación temprana.</li>
                      <li>Uso de enemigos naturales, como insectos depredadores y parasitoides.</li>
                      <li>Aplicación de insecticidas selectivos según las recomendaciones de un experto.</li>
                      <li>Uso de variedades resistentes al ataque de ciertas plagas.</li>
                    </ul>
                    <br>
                    <h6>Datos Relevantes</h6>
                    <ul>
                      <li>Porcentaje promedio de pérdida de rendimiento debido a plagas.</li>
                      <li>Nivel de infestación de pulgones en los últimos 6 meses.</li>
                    </ul>
                    <br>
                    <h6>Insecticidas y formas de combatir las plagas</h6>
                    <ol>
                      <li>Mosca Blanca del Girasol (Trialeurodes vaporariorum):Insecticidas sistémicos
                        o translaminares, como neonicotinoides o insecticidas piretroides, pueden ser
                        efectivos contra la mosca blanca. Uso de insecticidas naturales, como aceites
                        de neem o jabón insecticida.</li>
                      <li>Orugas Defoliadoras (Spodoptera spp.): Insecticidas específicos para orugas,
                        como bacillus thuringiensis (Bt) o spinosad, pueden ser utilizados para
                        controlar las poblaciones de orugas defoliadoras. Uso de insecticidas de
                        amplio espectro en casos de infestaciones severas.</li>
                      <li>Pulgones (Aphis spp.): Insecticidas sistémicos, como neonicotinoides, pueden
                        controlar las poblaciones de pulgones. Fomentar la presencia de
                        depredadores naturales, como mariquitas y crisopas, que se alimentan de
                        pulgones.</li>
                      <li>Escarabajos de la Flor (Meligethes spp.): Insecticidas piretroides o
                        neonicotinoides pueden utilizarse para controlar los escarabajos de la flor.
                        Uso de trampas de feromonas para monitorear y reducir las poblaciones de
                        escarabajos.</li>
                    </ol>
                  </div>
                  <div class="tab-pane fade" id="maiz-tab-pane" role="tabpanel" aria-labelledby="maiz-tab" tabindex="0">
                    <h5>Plagas Comunes en Cultivos del Maíz (Zea mays)</h5>
                    <br>
                    <h6>Plagas habitualmente asociadas</h6>
                    <ol>
                      <li>Gusano Cogollero (Spodoptera frugiperda): Las larvas del gusano
                        cogollero se alimentan de las hojas y tallos jóvenes del maíz, lo que puede
                        causar daños significativos a las plantas.</li>
                      <li>Pulgones del Maíz (Rhopalosiphum maidis): Los pulgones del maíz
                        pueden causar daño al succionar la savia de las plantas, debilitándolas y
                        transmitiendo enfermedades.</li>
                      <li>Escarabajo del Maíz (Diabrotica spp.): Los escarabajos del maíz se
                        alimentan de las hojas y flores del maíz, lo que puede reducir la capacidad de
                        la planta para fotosintetizar y producir granos.</li>
                      <li>Gorgojo del Maíz (Sitophilus zeamais): Los gorgojos del maíz pueden
                        dañar los granos almacenados, disminuyendo la calidad y valor del producto.</li>
                    </ol>

                    <br>
                    <h6>Impacto en el cultivo</h6>
                    <ul>
                      <li>Reducción del rendimiento y calidad del maíz.</li>
                      <li>Daño a hojas, tallos y flores, afectando el desarrollo normal de la planta.</li>
                      <li>Riesgo de pérdida económica para los agricultores.</li>
                    </ul>
                    <br>
                    <h6>Medidas de control y prevención</h6>
                    <ul>
                      <li>Monitoreo constante de las plantas para detectar signos tempranos de
                        infestación.</li>
                      <li>Aplicación de insecticidas específicos para cada plaga según las
                        recomendaciones de un experto.</li>
                      <li>Uso de métodos de control biológico, como el uso de enemigos naturales.</li>
                      <li>Uso de prácticas agronómicas, como la rotación de cultivos, para prevenir la
                        acumulación de plagas.</li>
                    </ul>
                    <br>
                    <h6>Datos Relevantes</h6>
                    <ul>
                      <li>Porcentaje promedio de pérdida de rendimiento debido a plagas.</li>
                      <li>Nivel de infestación de gusano cogollero en los últimos 6 meses.</li>
                    </ul>
                    <br>
                    <h6>Insecticidas y formas de combatir las plagas</h6>
                    <ol>
                      <li>Gusano Cogollero (Spodoptera frugiperda): Insecticidas específicos para
                        orugas, como los que contienen ingredientes activos como spinosad o
                        emamectina, pueden ser efectivos contra el gusano cogollero. Uso de
                        insecticidas biológicos a base de Bacillus thuringiensis (Bt) para un control
                        más selectivo.</li>
                      <li>Pulgones del Maíz (Rhopalosiphum maidis): Insecticidas sistémicos o de
                        contacto, como neonicotinoides o piretroides, pueden ser utilizados para
                        controlar las poblaciones de pulgones. Fomentar la presencia de
                        depredadores naturales, como coccinélidos y avispas parasitoides.</li>
                      <li>Escarabajo del Maíz (Diabrotica spp.): Insecticidas piretroides o
                        neonicotinoides pueden ser efectivos para controlar los escarabajos del maíz.
                        Uso de trampas con feromonas para monitorear y reducir las poblaciones de
                        escarabajos.</li>
                      <li>Gorgojo del Maíz (Sitophilus zeamais): Tratamientos con insecticidas
                        fumigantes, como el fosfuro de aluminio, pueden utilizarse para controlar los
                        gorgojos del maíz en granos almacenados. Mantener un ambiente de
                        almacenamiento limpio y seco para prevenir la proliferación de plagas.</li>
                    </ol>
                  </div>
                  <div class="tab-pane fade" id="mijo-tab-pane" role="tabpanel" aria-labelledby="mijo-tab" tabindex="0">
                    <h5>Plagas Comunes en Cultivos del Mijo (Pennisetum spp.)</h5>
                    <br>
                    <h6>Plagas habitualmente asociadas</h6>
                    <ol>
                      <li>Gorgojo del Mijo (Sitophilus oryzae): Los gorgojos del mijo pueden dañar
                        los granos almacenados, disminuyendo su calidad y valor.</li>
                      <li>Pulgones del Mijo (Rhopalosiphum spp.): Los pulgones del mijo pueden
                        succionar la savia de las plantas y transmitir enfermedades, debilitando el
                        cultivo.</li>
                      <li>Gusano de Alambre (Agriotes spp.): Las larvas de gusano de alambre
                        pueden dañar las raíces y plántulas de mijo, afectando el crecimiento.</li>
                      <li>Escarabajos de la Paja (Trogoderma spp.): Los escarabajos de la paja
                        pueden infestar los granos almacenados de mijo y otros productos.</li>
                    </ol>

                    <br>
                    <h6>Impacto en el cultivo</h6>
                    <ul>
                      <li>Pérdida de calidad y cantidad en la cosecha de mijo.</li>
                      <li>Debilitamiento de las plantas, afectando el rendimiento.</li>
                      <li>Riesgo de pérdida económica para los agricultores.</li>
                    </ul>
                    <br>
                    <h6>Medidas de control y prevención</h6>
                    <ol>
                      <li>Inspección regular de los cultivos para detectar signos tempranos de
                      infestación.</li>
                      <li>Uso de prácticas culturales, como la eliminación de restos de cultivos, para
                      reducir el refugio de plagas.</li>
                      <li>Uso de insecticidas específicos o selectivos bajo recomendación de un
                      experto en control de plagas.</li>
                    </ul>
                    <br>
                    <h6>Datos Relevantes</h6>
                    <ul>
                      <li>Porcentaje promedio de pérdida de rendimiento debido a plagas.</li>
                      <li>Nivel de infestación de gorgojo del mijo en los últimos 6 meses.</li>
                    </ul>
                    <br>
                    <h6>Insecticidas y formas de combatir las plagas</h6>
                    <ol>
                      <li>Gorgojo del Mijo (Sitophilus oryzae): Insecticidas fumigantes como el fosfuro
                        de aluminio pueden ser utilizados para controlar los gorgojos en los granos
                        almacenados. Mantener condiciones adecuadas de almacenamiento para
                        prevenir la proliferación de plagas.</li>
                      <li>Pulgones del Mijo (Rhopalosiphum spp.): Insecticidas sistémicos o de
                        contacto, como neonicotinoides o piretroides, pueden ser efectivos para
                        controlar las poblaciones de pulgones. Fomentar la presencia de
                        depredadores naturales, como mariquitas y avispas parasitoides.</li>
                      <li>Gusano de Alambre (Agriotes spp.): Aplicación de insecticidas de suelo antes
                        de la siembra puede ayudar a controlar las larvas de gusano de alambre. Uso
                        de métodos de manejo cultural, como la rotación de cultivos, para reducir la
                        presencia de larvas en el suelo.</li>
                      <li>Escarabajos de la Paja (Trogoderma spp.): Medidas de manejo integrado de
                        plagas, como la higiene y limpieza en áreas de almacenamiento, pueden
                        ayudar a prevenir la infestación de escarabajos de la paja.</li>
                    </ol>
                  </div>
                  <div class="tab-pane fade" id="soja-tab-pane" role="tabpanel" aria-labelledby="soja-tab" tabindex="0">
                    <h5>Plagas Comunes en Cultivos de la Soja (Glycine max)</h5>
                    <br>
                    <h6>Plagas habitualmente asociadas</h6>
                    <ol>
                      <li>Gusano de la Soja (Anticarsia gemmatalis): Las larvas de este gusano se
                        alimentan de las hojas de la soja, lo que puede causar defoliación y dañar el
                        cultivo.</li>
                      <li>Pulgones de la Soja (Aphis glycines): Los pulgones de la soja pueden
                        succionar la savia de las plantas, debilitándolas y transmitiendo
                        enfermedades.</li>
                      <li>Escarabajos Desfoliadores (Diabrotica spp.): Los escarabajos
                        desfoliadores se alimentan de las hojas de la soja, lo que puede afectar la
                        fotosíntesis y la producción de granos.</li>
                      <li>Cigarras de la Soja (Empoasca spp.): Las cigarras de la soja se alimentan
                        de la savia de las plantas, causando daño y transmitiendo enfermedades.</li>
                    </ol>

                    <br>
                    <h6>Impacto en el cultivo</h6>
                    <ul>
                      <li>Reducción del rendimiento y calidad de la cosecha de soja.</li>
                      <li>Daño a hojas, tallos y flores, afectando el desarrollo normal de la planta.</li>
                      <li>Riesgo de pérdida económica para los agricultores.</li>
                    </ul>
                    <br>
                    <h6>Medidas de control y prevención</h6>
                    <ul>
                      <li>Monitoreo regular de los cultivos para detectar signos tempranos de infestación.</li>
                      <li>Aplicación de insecticidas específicos bajo recomendación de un experto en control de plagas.</li>
                      <li>Uso de enemigos naturales, como insectos depredadores y parasitoides.</li>
                      <li>Uso de prácticas agronómicas, como la rotación de cultivos, para prevenir la acumulación de plagas.</li>
                    </ul>
                    <br>
                    <h6>Datos Relevantes</h6>
                    <ul>
                      <li>Porcentaje promedio de pérdida de rendimiento debido a plagas.</li>
                      <li>Nivel de infestación de gusano de la soja en los últimos 6 meses.</li>
                    </ul>
                    <br>
                    <h6>Insecticidas y formas de combatir las plagas</h6>
                    <ol>
                      <li>Gusano de la Soja (Anticarsia gemmatalis): Insecticidas específicos para
                        orugas, como los que contienen ingredientes activos como spinosad o
                        emamectina, pueden ser efectivos contra el gusano de la soja. Uso de
                        insecticidas biológicos a base de Bacillus thuringiensis (Bt) para un control
                        más selectivo.</li>
                      <li>Pulgones de la Soja (Aphis glycines): Insecticidas sistémicos o de contacto,
                        como neonicotinoides o piretroides, pueden ser utilizados para controlar las
                        poblaciones de pulgones. Fomentar la presencia de depredadores naturales,
                        como mariquitas y avispas parasitoides.</li>
                      <li>Escarabajos Desfoliadores (Diabrotica spp.): Insecticidas piretroides o
                        neonicotinoides pueden ser efectivos para controlar los escarabajos
                        desfoliadores. Uso de trampas con feromonas para monitorear y reducir las
                        poblaciones de escarabajos.</li>
                      <li>Cigarras de la Soja (Empoasca spp.): Insecticidas sistémicos pueden ser
                        utilizados para controlar las poblaciones de cigarras de la soja. Fomentar la
                        presencia de enemigos naturales, como avispas parasitoides, para un control
                        biológico.</li>
                    </ol>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
    <script>
      const triggerTabList = document.querySelectorAll('#myTab button')
      triggerTabList.forEach(triggerEl => {
        const tabTrigger = new bootstrap.Tab(triggerEl)

        triggerEl.addEventListener('click', event => {
          event.preventDefault()
          tabTrigger.show()
        })
      })
    </script>


      <!-- Script de renderizado de cultivos segun cliente -->
    <script>
      
    let a,b;
      //Comprobar que se existe el cultivo con el ID
    if(document.getElementById("cultivo0")){
      a = document.getElementById("cultivo0");
      a=a.textContent;
    }

    if(document.getElementById("cultivo1")){
      b = document.getElementById("cultivo1");
      b=b.textContent;
     
    }
     
    //Si existen, pasar de display:'none' a 'block'

    if(document.getElementById(a+"-tab")){
      let div1 = document.getElementById(a+"-tab");
      div1.style.display = "block";
      // div1.classList.add("active"); //Preguntar aldana sobre el evento que cambia 'active' de estado

      let pane1 = document.getElementById(a+"-tab-pane");
      pane1.classList.add("show");
      pane1.classList.add("active");
      
      }

    if(document.getElementById(b+"-tab")){
      let div2 = document.getElementById(b+"-tab");
      div2.style.display = "block";

      let pane2 = document.getElementById(b+"-tab-pane");
      pane2.classList.add("show");
    }
      
    </script>

  </body>
</html>