<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>AgroCommerce</title>
    <!-- plugins:css -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
      crossorigin="anonymous"
    />
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../../assets/css/custom.css" />

    <link rel="shortcut icon" href="../../../assets/images/Logo.ico" />
  </head>
  <body>
    <main class="form-register">
      <div class="row">
        <div class="form-body col-lg-4 col-md-12 px-lg-5 py-5 text-center">
          <img
            class="img-logo"
            src="../../../assets/images/Logo-02.svg"
            alt="logo-agrocommerce"
          />
          <h5>Registro</h5>
          <p class="text-start pt-5 m-0">
            Si no tienes una cuenta, registrarse es fácil. Sólo tienes que
            completar lo siguiente:
          </p>

          <form
            class="pt-2"
            method="post"
            action="../../../backend/register.php"
            enctype="multipart/form-data"
          >
            <!-- Nombre de usuario -->
            <div class="form-group">
              <input
                type="text"
                class="form-control"
                name="newUser"
                placeholder="Usuario"
                required
              />
            </div>
            <!-- Email -->
            <div class="form-group mt-2">
              <input
                type="email"
                name="email"
                class="form-control"
                id="inputEmail"
                placeholder="Email"
                required
              />
            </div>
            <!-- Img usuario -->
            <div class="d-flex mt-2">
              <div class="form-group col-11">
                <input class="form-control" type="file" id="userImg" placeholder="Imagen de perfil" accept="image/*">
              </div>
              <button
                type="button"
                class="btn"
                data-bs-toggle="tooltip"
                data-bs-placement="top"
                data-bs-custom-class="custom-tooltip"
                data-bs-title="Seleccione una imagen para su perfil">
                <svg
                  xmlns="http://www.w3.org/2000/svg"
                  width="16"
                  height="16"
                  fill="currentColor"
                  class="bi bi-info-circle"
                  viewBox="0 0 16 16">
                  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"></path>
                  <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"></path>
                </svg>
              </button>
            </div>
            <!-- Contrasena -->
            <div class="form-group mt-2">
              <input
                type="password"
                name="newPassword"
                minlength="7"
                class="form-control"
                id="inputPassword1"
                placeholder="Contraseña"
                required
              />
            </div>
            <!-- Imagen de perfil -->
            <div class="form-group mt-2">
              <input
               type="file"
                name="image"
                class="form-control"
                id="profile"
                accept=".png, .jpg, .jpeg" 
                required
              />
            </div>
            <hr />
            <!-- Provincia -->
            <div class="form-group">
              <select
                class="form-select"
                name="province"
                id="selectProvince"
                required
              >
                <option selected disabled>Seleccione su provincia</option>
                <?php
                        include "../../../backend/conection.php";
                        $provincias = pg_query($conectado,"SELECT DISTINCT provincia_nombre FROM cultivos");
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
            </div>
            <!-- Cultivo -->
            <div class="form-group mt-2">
              <select class="form-select" name="seed" id="selectSeed" required>
                <option selected disabled>Que cultivo sembrará?</option>
                <?php
                        include "../../../backend/conection.php";
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
            </div>
            <div class="row mt-2">
              <!-- Intervalo de riego -->
              <div class="col-md-6 d-flex">
                <div class="form-group">
                  <input
                    type="number"
                    name="interval"
                    class="form-control"
                    id="exampleInputUsername1"
                    placeholder="Intervalo de riego"
                    required
                  />
                </div>
                <button
                  type="button"
                  class="btn"
                  data-bs-toggle="tooltip"
                  data-bs-placement="top"
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
              <div class="col-md-6 d-flex">
                <div class="form-group">
                  <input
                    type="number"
                    name="hectare"
                    class="form-control"
                    id="exampleInputUsername1"
                    placeholder="Hectareas cultivadas"
                    required
                  />
                </div>
                <button
                  type="button"
                  class="btn"
                  data-bs-toggle="tooltip"
                  data-bs-placement="top"
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
            </div>
            <!-- Fecha de siembra -->
            <div class="row mt-2">
              <div class="d-flex">
                <div class="form-group col-11">
                  <input
                    type="date"
                    name="seedtime"
                    class="form-control"
                    id="inputDate"
                    required
                  />
                </div>
                <button
                  type="button"
                  class="btn"
                  data-bs-toggle="tooltip"
                  data-bs-placement="top"
                  data-bs-custom-class="custom-tooltip"
                  data-bs-title="Ingrese la fecha de siempre de su cultivo."
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
            </div>

            <div class="mt-4">
              <button class="btn btn-primary px-5" type="submit">
                Ingresar
              </button>
            </div>
          </form>
          <div class="text-end mt-5">
            ¿Ya tienes una cuenta?
            <a href="../account/login.html" class="text-primary"
              >Inicia Sesión</a
            >
          </div>
        </div>
      </div>
    </main>

    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
      crossorigin="anonymous"
    ></script>
    <script>
      const tooltipTriggerList = document.querySelectorAll(
        '[data-bs-toggle="tooltip"]'
      );
      const tooltipList = [...tooltipTriggerList].map(
        (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
      );
    </script>
  </body>
</html>
