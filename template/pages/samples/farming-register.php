<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Purple Admin</title>
    <!-- plugins:css -->
    <link
      rel="stylesheet"
      href="../../assets/vendors/mdi/css/materialdesignicons.min.css"
    />
    <link
      rel="stylesheet"
      href="../../assets/vendors/css/vendor.bundle.base.css"
    />
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/style.css" />
    <!-- End layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico" />
    
  </head>
  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth">
          <div class="row flex-grow">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="../../assets/images/logo.svg" />
                </div>

                <form
                  class="pt-3"
                  method="post"
                  action="../../backend/new_farm.php"
                >
                  <!-- Provincia -->
                  <div class="form-group">
                    <select
                      class="form-control form-control-lg"
                      name="province"
                      required
                      id="exampleFormControlSelect2"
                    >
                      <option selected disabled>
                        En que provincia se ubicará?
                      </option>

                      <?php
                        include "../../backend/conection.php";
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
                  </div>
                  <!-- Cultivo -->
                  <div class="form-group">
                    <select name="seed" required class="form-control form-control-lg" id="exampleFormControlSelect2">
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
                  </div>
                  <!-- Intervalo de riego -->
                  <div class="form-group">
                    <input
                      required
                      type="number"
                      name="interval"
                      class="form-control form-control-lg"
                      id="exampleInputUsername1"
                      placeholder="Intervalo de riego"
                    />
                    <!-- Podriamos agg una i con info del tema tipo modal -->
                  </div>
                  <!-- Numero de hectareas -->
                  <div class="form-group">
                    <input
                      required
                      type="number"
                      name="hectare"
                      class="form-control form-control-lg"
                      id="exampleInputUsername1"
                      placeholder="Hectareas cultivadas"
                    />
                  </div>
                  <!-- Fecha de siembra -->
                  <div class="form-group">
                    <input
                      required
                      type="date"
                      name="seedtime"
                      class="form-control form-control-lg"
                      id="exampleInputUsername1"
                      placeholder="Fecha de siembra"
                    />
                  </div>

                  <input
                    class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn"
                    type="submit"
                  />
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="../../assets/js/off-canvas.js"></script>
    <script src="../../assets/js/hoverable-collapse.js"></script>
    <script src="../../assets/js/misc.js"></script>
    <!-- endinject -->
  </body>
</html>
