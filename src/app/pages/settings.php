<?php
  include '../../backend/conection.php';
  session_start();
  $userId = $_SESSION['user_id'];

//   Obtener usuario
function getUser($conectado, $userId){
    $user = pg_query($conectado,"SELECT usuario FROM clientes WHERE id=$userId");
    $user = pg_fetch_assoc($user);
    echo($user['usuario']);
}

//   Obtener mail
function getEmail($conectado, $userId){
    $email = pg_query($conectado,"SELECT correo FROM clientes WHERE id=$userId");
    $email = pg_fetch_assoc($email);
    echo($email['correo']);
}

//Obtener cultivos
function getCrops($conectado, $userId,$flag){
    $crops = pg_query($conectado,"SELECT provincia,tipo_cultivo,fecha FROM cultivos_clientes WHERE fk_clientes=$userId");
    $crops = pg_fetch_all($crops);

    if (array_key_exists(0, $crops)) {
        if($flag==0){
                echo($crops[0]['provincia']);
               }elseif($flag==1){
                echo($crops[0]['tipo_cultivo']);
               }elseif($flag==2){
                echo($crops[0]['fecha']);
               }
    }

    if ( (array_key_exists(1, $crops))) {
       
        if($flag==3){
            echo($crops[1]['provincia']);
           }elseif($flag==4){
            echo($crops[1]['tipo_cultivo']);
           }elseif($flag==5){
            echo($crops[1]['fecha']);
        }
    }else {
        
    }
}
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
        <!-- Sidebar -->
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
                <h4 class="page-title pb-4">Configuración</h4>
            </div>
            <div class="row">
                <div class="d-flex align-items-start">
                    <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active" id="v-pills-account-tab" data-bs-toggle="pill" data-bs-target="#v-pills-account" type="button" role="tab" aria-controls="v-pills-account" aria-selected="true">Cuenta</button>
                        <button class="nav-link" id="v-pills-crops-tab" data-bs-toggle="pill" data-bs-target="#v-pills-crops" type="button" role="tab" aria-controls="v-pills-crops" aria-selected="false">Cultivos</button>
                        <button class="nav-link" id="v-pills-ground-tab" data-bs-toggle="pill" data-bs-target="#v-pills-ground" type="button" role="tab" aria-controls="v-pills-ground" aria-selected="false">Suelo</button>
                    </div>
                    <div class="border-start h-100"></div>
                    <div class="tab-content px-5 w-100" id="v-pills-tabContent">
                        <!-- Contenido -->
                        <div id="myModal" style="display: none;">
                            <div class="modal-content">
                                <!-- Contenido del modal aquí -->
                                <p>¡Formulario enviado con éxito!</p>
                            </div>
                        </div>

                        <!-- Datos del usuario a modificar -->
                        <div class="tab-pane fade show active" id="v-pills-account" role="tabpanel" aria-labelledby="v-pills-account-tab" tabindex="0">
                            <form class="pt-4 needs-validation" method="post" action="../../backend/updatePersonalData.php" enctype="multipart/form-data" novalidate>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <!-- Nombre de usuario -->
                                    <div class="form-group">
                                        <input
                                        type="text"
                                        class="form-control"
                                        name="newUser"
                                        value="<?php getUser($conectado,$userId); ?>"
                                        />
                                    </div>
                                    <!-- Email -->
                                    <div class="form-group mt-2">
                                        <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        id="inputEmail"
                                        placeholder="<?php getEmail($conectado,$userId); ?>"
                                        disabled
                                        />
                                    </div>
                                    <!-- Img usuario -->
                                    <div class="form-group mt-4">
                                        <label for="userImg" class="form-label">Seleccione una imagen para su perfil</label>
                                        <input class="form-control" name="newImage" type="file" id="userImg" placeholder="Imagen de perfil" accept="image/*">
                                    </div>

                                    <hr>
                                    <!-- Contrasena -->
                                    <h5>Cambiar contraseña</h5>
                                    <div class="form-group mt-2">
                                        <input
                                        type="password"
                                        name="actualPassword"
                                        minlength="7"
                                        class="form-control"
                                        id="inputPassword0"
                                        placeholder="Actual contraseña"
                                        
                                        />
                                        <div class="invalid-feedback text-start">
                                            Debe ingresar la actual contraseña.
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <input
                                        type="password"
                                        name="newPassword"
                                        minlength="7"
                                        class="form-control"
                                        id="inputPassword1"
                                        placeholder="Nueva contraseña"
                                        
                                        />
                                        <div class="invalid-feedback text-start">
                                            Debe ingresar la nueva contraseña.
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <input
                                        type="password"
                                        name="confirmPassword"
                                        minlength="7"
                                        class="form-control"
                                        id="inputPassword2"
                                        placeholder="Confirmar contraseña"
                                        
                                        />
                                        <div class="invalid-feedback text-start">
                                            Debe ingresar la confirmación de la contraseña.
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <button
                                        type="submit"
                                        class="btn btn-primary text-light px-5"
                                        >Guardar cambios
                                    </button>
                                </div>
                            </form>
                        </div>

                        <!-- Datos del cultivo a modificar -->
                        <div class="tab-pane fade" id="v-pills-crops" role="tabpanel" aria-labelledby="v-pills-crops-tab" tabindex="0">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-crop1-tab" data-bs-toggle="tab" data-bs-target="#nav-crop1" type="button" role="tab" aria-controls="nav-crop1" aria-selected="true">Cultivo 1</button>
                                    <button class="nav-link" id="nav-crop2-tab" data-bs-toggle="tab" data-bs-target="#nav-crop2" type="button" role="tab" aria-controls="nav-crop2" aria-selected="false">Cultivo 2</button>
                                </div>
                            </nav>

                            <div class="tab-content" id="nav-tabContent">
                                <!-- Cultivo N1 -->
                                <div class="tab-pane fade show active" id="nav-crop1" role="tabpanel" aria-labelledby="nav-crop1-tab" tabindex="0">
                                    <div class="d-flex justify-content-between my-4">
                                        <h5 class="text-capitalize">Nombre cultivo</h5>
                                        <button class="btn btn-danger" type="button" id="deleteCrop">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"></path>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"></path>
                                            </svg> 
                                            Eliminar
                                        </button>
                                    </div>
                                    <form class="needs-validation" name="" method="post" action="../../backend/updateCropsData.php" novalidate>
                                        <div class="col-lg-6 col-md-8 col-sm-12">
                                            <!-- Provincia -->
                                            <div class="form-group mt-2">
                                                <select
                                                    class="form-select"
                                                    name="province"
                                                    id="selectProvince"
                                                    disabled
                                                >
                                                    <option selected>
                                                        <?php
                                                        $flag=0;
                                                        getCrops($conectado,$userId,$flag);
                                                        ?>
                                                    </option>
                                                </select>
                                            </div>
                                            <!-- Cultivo -->
                                            <div class="form-group mt-2">
                                                <select class="form-select" name="seed" id="selectSeed" disabled>
                                                <option selected>
                                                    <?php
                                                        $flag=1;
                                                        getCrops($conectado,$userId,$flag);
                                                    ?>
                                                </option>
                                                </select>
                                            </div>
                                            <!-- Intervalo de riego -->
                                            <div class="d-flex mt-2">
                                                <div class="form-group col-11">
                                                    <input
                                                        type="number"
                                                        name="newInterval"
                                                        class="form-control"
                                                        id="exampleInputUsername1"
                                                        placeholder="Intervalo de riego"
                                                        required
                                                    />
                                                    <div class="invalid-feedback text-start">
                                                        Debe ingresar el intervalo de riego.
                                                    </div>
                                                </div>
                                                <button
                                                    type="button"
                                                    class="btn"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="right"
                                                    data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="Ingrese cada cuantas horas debe regar su cultivo, para recordarle.">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="16"
                                                        height="16"
                                                        fill="currentColor"
                                                        class="bi bi-info-circle"
                                                        viewBox="0 0 16 16"
                                                    >
                                                        <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                                                        ></path>
                                                        <path
                                                        d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"
                                                        ></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <!-- Numero de hectareas -->
                                            <div class="d-flex mt-2">
                                                <div class="form-group col-11">
                                                    <input
                                                        type="number"
                                                        name="newHectare"
                                                        class="form-control"
                                                        id="exampleInputUsername1"
                                                        placeholder="Hectareas cultivadas"
                                                        required
                                                    />
                                                    <div class="invalid-feedback text-start">
                                                        Debe ingresar el n° de hectareas cultivadas.
                                                    </div>
                                                </div>
                                                <button
                                                    type="button"
                                                    class="btn"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="right"
                                                    data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="Ingrese el número de hectareas que tiene cultivadas actualmente o que planea cultivar.">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="16"
                                                        height="16"
                                                        fill="currentColor"
                                                        class="bi bi-info-circle"
                                                        viewBox="0 0 16 16"
                                                    >
                                                        <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                                                        ></path>
                                                        <path
                                                        d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"
                                                        ></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <!-- Fecha de siembra -->
                                            <div class="d-flex mt-2">
                                                <div class="form-group col-11">
                                                    <input
                                                    disabled
                                                        type="date"
                                                        name="seedtime"
                                                        class="form-control"
                                                        id="inputDate"
                                                        value=
                                                        <?php
                                                        $flag=2;
                                                        getCrops($conectado,$userId,$flag); 
                                                        ?>
                                                    />
                                                </div>
                                                <button
                                                    type="button"
                                                    class="btn"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="right"
                                                    data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="Ingrese cada cuantas horas debe regar su cultivo, para recordarle.">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="16"
                                                        height="16"
                                                        fill="currentColor"
                                                        class="bi bi-info-circle"
                                                        viewBox="0 0 16 16"
                                                    >
                                                        <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                                                        ></path>
                                                        <path
                                                        d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"
                                                        ></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mt-5">
                                            <button
                                                type="submit"
                                                class="btn btn-primary text-light px-5"
                                                name="crop1"
                                                >Guardar
                                            </button>
                                        </div>
                                    </form>
                                </div>

                                <!-- Cultivo N2 -->
                                <div class="tab-pane fade"  id="nav-crop2" role="tabpanel" aria-labelledby="nav-crop2-tab" tabindex="0">
                                    <div class="d-flex justify-content-between my-4">
                                        <h5 class="text-capitalize">Nombre cultivo</h5>
                                        <button class="btn btn-danger" type="button" id="deleteCrop">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"></path>
                                                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"></path>
                                            </svg> 
                                            Eliminar
                                        </button>
                                    </div>
                                    <form class="needs-validation" name="<?php ?>" method="post" action="../../backend/updateCropsData.php" novalidate>
                                        <div class="col-lg-6 col-md-8 col-sm-12">
                                            <!-- Provincia -->
                                            <div class="form-group mt-2">
                                                <select
                                                    class="form-select"
                                                    name="province"
                                                    id="selectProvince"
                                                    disabled
                                                >
                                                    <option selected><?php
                                                        $flag=3;
                                                        getCrops($conectado,$userId,$flag);
                                                    ?></option>
                                                </select>
                                            </div>
                                            <!-- Cultivo -->
                                            <div class="form-group mt-2">
                                                <select class="form-select" name="seed" id="selectSeed" disabled>
                                                <option id='evaluate' selected><?php
                                                        $flag=4;
                                                        getCrops($conectado,$userId,$flag);
                                                    ?></option>
                                                </select>
                                            </div>
                                            <!-- Intervalo de riego -->
                                            <div class="d-flex mt-2">
                                                <div class="form-group col-11">
                                                    <input
                                                        type="number"
                                                        name="newInterval"
                                                        class="form-control"
                                                        id="exampleInputUsername1"
                                                        placeholder="Intervalo de riego"
                                                        required
                                                    />
                                                    <div class="invalid-feedback text-start">
                                                        Debe ingresar el intervalo de riego.
                                                    </div>
                                                </div>
                                                <button
                                                type="button"
                                                class="btn"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="right"
                                                data-bs-custom-class="custom-tooltip"
                                                data-bs-title="Ingrese cada cuantas horas debe regar su cultivo, para recordarle."
                                                >
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="16"
                                                        height="16"
                                                        fill="currentColor"
                                                        class="bi bi-info-circle"
                                                        viewBox="0 0 16 16"
                                                    >
                                                        <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                                                        ></path>
                                                        <path
                                                        d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"
                                                        ></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <!-- Numero de hectareas -->
                                            <div class="d-flex mt-2">
                                                <div class="form-group col-11">
                                                    <input
                                                        type="number"
                                                        name="newHectare"
                                                        class="form-control"
                                                        id="exampleInputUsername1"
                                                        placeholder="Hectareas cultivadas"
                                                        required
                                                    />
                                                    <div class="invalid-feedback text-start">
                                                        Debe ingresar el n° de hectareas cultivadas.
                                                    </div>
                                                </div>
                                                <button
                                                type="button"
                                                class="btn"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="right"
                                                data-bs-custom-class="custom-tooltip"
                                                data-bs-title="Ingrese el número de hectareas que tiene cultivadas actualmente o que planea cultivar."
                                                >
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="16"
                                                        height="16"
                                                        fill="currentColor"
                                                        class="bi bi-info-circle"
                                                        viewBox="0 0 16 16"
                                                    >
                                                        <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                                                        ></path>
                                                        <path
                                                        d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"
                                                        ></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <!-- Fecha de siembra -->
                                            <div class="d-flex mt-2">
                                                <div class="form-group col-11">
                                                    <input
                                                        disabled
                                                        type="date"
                                                        name="seedtime"
                                                        class="form-control"
                                                        id="inputDate"
                                                        value=<?php
                                                        $flag=5;
                                                        getCrops($conectado,$userId,$flag); 
                                                        ?>
                                                        
                                                    />
                                                </div>
                                                <button
                                                    type="button"
                                                    class="btn"
                                                    data-bs-toggle="tooltip"
                                                    data-bs-placement="right"
                                                    data-bs-custom-class="custom-tooltip"
                                                    data-bs-title="Ingrese el número de hectareas que tiene cultivadas actualmente o que planea cultivar.">
                                                    <svg
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        width="16"
                                                        height="16"
                                                        fill="currentColor"
                                                        class="bi bi-info-circle"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                        d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                                                        ></path>
                                                        <path
                                                        d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"
                                                        ></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="mt-5">
                                            <button
                                                type="submit"
                                                name="crop2"
                                                class="btn btn-primary text-light px-5"
                                                >Guardar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <!-- Datos del suelo - nivel de ph y de humedad -->
                        <div class="tab-pane fade" id="v-pills-ground" role="tabpanel" aria-labelledby="v-pills-ground-tab" tabindex="0">
                            <form class="pt-4 needs-validation" method="post" action="../../backend/setPerceptron.php" novalidate>
                                <div class="col-lg-4 col-md-6 col-sm-12">
                                    <!-- Cultivo -->
                                    <div class="form-group">
                                        <input
                                        type="text"
                                        class="form-control"
                                        name="cultivoNombre"
                                        placeholder="Introduzca el nombre del cultivo"
                                        required
                                        />
                                        <div class="invalid-feedback text-start">
                                            Debe ingresar el nombre del cultivo.
                                        </div>
                                    </div>
                                    <!-- Nivel de pH -->
                                    <div class="form-group mt-2">
                                        <input
                                        type="text"
                                        class="form-control"
                                        name="nivelPh"
                                        placeholder="Introduzca el nivel de pH"
                                        required
                                        />
                                        <div class="invalid-feedback text-start">
                                            Debe ingresar el nivel de pH.
                                        </div>
                                    </div>
                                    <!-- Nivel de humedad -->
                                    <div class="form-group mt-2">
                                        <input
                                        type="text"
                                        class="form-control"
                                        name="nivelHumedad"
                                        placeholder="Introduzca el nivel de humedad"
                                        required
                                        />
                                        <div class="invalid-feedback text-start">
                                            Debe ingresar el nivel de humedad.
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <button
                                        type="submit"
                                        class="btn btn-primary text-light px-5"
                                        >Guardar cambios
                                    </button>
                                </div>
                            </form>
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
    <script>
      const tooltipTriggerList = document.querySelectorAll(
        '[data-bs-toggle="tooltip"]'
      );
      const tooltipList = [...tooltipTriggerList].map(
        (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
      );
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


<!-- Script para validar si los campos de 'Cultivo 2' estan vacios -->
    <script>
        let button = document.getElementById("evaluate").textContent;
        if(button==""){
            let hiddenButton = document.getElementById('nav-crop2-tab');
            hiddenButton.setAttribute("disabled","true");
        }
    </script>
</body>
</html>