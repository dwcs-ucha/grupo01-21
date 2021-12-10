<?php 
/*
*
*Menú
*@autor: Daniel Rivas Arévalo
*@version: 1.00.00
*
*/
/** Función links Ruta **/

$nav= "http://" . $_SERVER['SERVER_NAME'] . "/grupo01-21/";
include $_SERVER['DOCUMENT_ROOT']. '/grupo01-21/multiidioma/clases/Idioma.class.php';
include $_SERVER['DOCUMENT_ROOT']. '/grupo01-21/clases/Usuario.class.php';
session_start();
isset($_SESSION['usuario']) ? $usuario=$_SESSION['usuario'] : "" ;

function linksRuta() { 
  global $nav;
?>

<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="cursos">
  <meta name="author" content="alumnosDaw">
  <link rel="icon" type="image/x-icon" href="<?php echo $nav; ?>content/favicon/favicon.png">

  <!-- Bootstrap core CSS -->
  <link href="<?php echo $nav; ?>css/bootstrap/bootstrap.min.css" rel="stylesheet">

  <!-- Iconos Font-awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css"
    integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog=="
    crossorigin="anonymous" />

  <!-- CSS custom -->
  <link rel="stylesheet" href="<?php echo $nav; ?>css/custom/all/styles.css">
  <link rel="stylesheet" href="<?php echo $nav; ?>css/custom/1.css">
  <style>
    html {
      min-height: 100%;
      position: relative;
    }
    body {
      margin-top: 55px;
      margin-bottom: 150px;
      line-height:2;
    }
    footer {
      position:absolute;
      bottom: 0;
      width: 100%;
    }

    .navbar {
      position: fixed;
      top:0;
      left:0;
      width:100%;
      box-shadow: -3px 5px 23px rgba(87, 87, 87, 0.2)  ; 
      -webkit-box-shadow: -3px 5px 23px rgba(87, 87, 87, 0.2)  ; 
      -moz-box-shadow: -3px 5px 23px rgba(87, 87, 87, 0.2)  ;
      z-index: 4;
    }

    h2 {
      margin:20px 0 20px 0;
      text-decoration:underline;
    }

    div  {
      text-align: center;
    }

    input {
      text-align:center;
    }

    
  </style>
<?php
} //cerramos llave de la función linksRuta()

/** Función menuRuta **/
function menuRuta(){
  global $usuario;
  $valoresMenu = array (
    'nuevaEntrada' => 'Nueva entrada',
    'blog' => 'Blog',
    'tutoriales' => 'Tutoriales',
    'usuarios' => 'Usuarios',
    'recursos' => 'Recursos',
    'idioma' => 'Idioma',
    'iniciarSesion' => 'Iniciar sesión',
    'registro' => 'Registro'
  );

  $valoresMenu = Idioma::cambiarIdioma($valoresMenu);
  
  global $nav;
?>
      <!-- Nav -->
      <nav class="navbar navbar-expand-lg navbar-light bg-primary">
      <div class="container-fluid">
        <!-- Brand -->
      <a class="navbar-brand" href="<?php echo $nav; ?>index.php"><img src="<?php echo $nav; ?>content/nav/logo1.png" width="80%"></a>
     <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars" style="color:#fff; font-size:28px; border: none;"></i>

      </button>

      <!-- Navbar links -->
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item me-4">
            <a class="nav-link text-white" href="<?php echo $nav; ?>index.php#tutoriales"><?php echo $valoresMenu['tutoriales']; ?></a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link text-white" href="<?php echo $nav; ?>cms/vistas/blog.php"><?php echo $valoresMenu['blog']; ?></a>
          </li>
          <?php 
          if(isset($_SESSION['usuario']) && $usuario->getRol() == "administrador") { ?>
            <li class="nav-item me-4">
              <a class="nav-link text-white" href="<?php echo $nav; ?>cms/vistas/cms.php"><?php echo $valoresMenu['nuevaEntrada']; ?></a>
            </li>
            <li class="nav-item me-4">
              <a class="nav-link text-white" href="<?php echo $nav; ?>login-registro/gestionUsuarios.php"><?php echo $valoresMenu['usuarios']; ?></a>
            </li>
          <?php 
          } ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $valoresMenu['idioma']; ?>
            </a>
            <ul class="dropdown-menu text-center" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item text-primary" href="?idioma=es">ES</a></li>
              <hr class="dropdown-divider">
              <li><a class="dropdown-item text-primary" href="?idioma=gl">GL</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item text-primary" href="?idioma=en">EN</a></li>
            </ul>
          </li>

        </ul>
          <?php if(!isset($_SESSION['usuario'])) { ?>
            <!-- Login / Rexistro -->
            <a href="<?php echo $nav; ?>login-registro/login.php"><button class="btn btn-outline-light me-4"><?php echo $valoresMenu['iniciarSesion']; ?></button></a>
            <a href="<?php echo $nav; ?>login-registro/registro.php"><button class="btn btn-outline-light me-4"><?php echo $valoresMenu['registro']; ?></button></a>
          <?php 
          } else { ?>
          <ul class="navbar-nav mb-2 mb-lg-0">
              <li class="nav-item me-4 dropdown">
              <a class="btn btn-outline-light dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $usuario->getNombreUsuario(); ?>
              </a>
              <ul class="dropdown-menu pull-menu-right" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item text-primary" href="<?php echo $nav; ?>perfil.php">Perfil</a></li>
                <hr class="dropdown-divider">
                <li><a class="dropdown-item text-primary" href="<?php echo $nav; ?>login-registro/logoff.php">Salir</a></li>
              </ul>
            </li>
          </ul>
         <?php
            }
          ?>
      </div>
    </div>
  </nav>
  <?php
} //cerramos la función menuRuta()

function menuLateral() {
  
  echo '<div class="container-fluid">
  <div class="row shadow-lg">
      <div class="col-lg-2  border p-2">
          <div class="nav flex-column d-flex nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <h3 class="text-sm-start text-primary">Panel de Control</h3>
              <button class="nav-link text-sm-start active " id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" aria-controls="v-pills-home" aria-selected="true">Pagina</button>
              <hr>
              <button class="nav-link text-sm-start" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="false">Entradas</button>
              <hr>
              <button class="nav-link text-sm-start" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" type="button" role="tab" aria-controls="v-pills-messages" aria-selected="false">Usuarios</button>
              <hr>
              <button class="nav-link text-sm-start" id="v-pills-settings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-settings" type="button" role="tab" aria-controls="v-pills-settings" aria-selected="false">Visitas</button>
              <hr>
          </div>
          <hr>

          <div class="container-fluid">
              <div class="row">
                  <div class="rounded d-flex justify-content-start">
                      <div class="col-md-0 col-sm-12 shadow-lg p-0 bg-light">
                          <form name="login" action="' . $_SERVER['PHP_SELF'] . '" method="post">
                              <div class="p-4">
                                  <div class="input-group mb-3 text-center">
                                      <div  class="border-primary w-100 p-4"style="border: solid 3px; border-radius: 15px;"><img src="../images/loginImagen/login_test.png" style="width: 100%;"></div>
                                  </div>

                                  <div class="input-group mb-3">
                                      <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                                      @username
                                  </div>

                                  <div class="input-group mb-3">
                                      <span class="input-group-text bg-primary"><i class="bi bi-person-plus-fill text-white"></i></span>
                                      @username
                                  </div>
                                  <!-- Rehacer para php el boton
                                  
                                    <button class="btn btn-primary text-center mt-4 w-100" id="closeSesion" type="submit">
                                      Cerrar Sesion
                                  </button>
     
                                  -->


                                  <a class="btn btn-primary text-center mt-4 w-100" href="./../../index.php">Cerrar Sesion</a>

                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
      </div>

      <div class="col-lg-10  bg-light">
          <div class="tab-content" id="v-pills-tabContent">
              <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">

                  <div class="row">
                      <div class="col-lg-12">
                          <iframe src="./index.php" class="shadow-lg border navbar-expand" style="width:100%; height:1080px;"></iframe>
                      </div>

                  </div>
              </div>

              <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                  <div class="row">
                      <div class="col-lg-6">
                          <iframe src="../../assets/cms/vistas/cms.php" style="width:100%; height: 700px"></iframe>
                          
                      </div>
                      <div class="col-lg-6">
                          <iframe src="../../assets/cms/vistas/blog.php" style="width:100%; height:1080px;"></iframe>
                      </div>
                  </div>
              </div>
              <div class="tab-pane fade min-vh-100" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

                  <table class="table">
                      <thead>
                          <tr>
                              <th scope="col">#</th>
                              <th scope="col">First</th>
                              <th scope="col">Last</th>
                              <th scope="col">Handle</th>
                          </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <th scope="row">1</th>
                              <td>Mark</td>
                              <td>Otto</td>
                              <td>@mdo</td>
                          </tr>
                          <tr>
                              <th scope="row">2</th>
                              <td>Jacob</td>
                              <td>Thornton</td>
                              <td>@fat</td>
                          </tr>
                          <tr>
                              <th scope="row">3</th>
                              <td colspan="2">Larry the Bird</td>
                              <td>@twitter</td>
                          </tr>
                      </tbody>
                  </table>
              </div>

              <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
                  <h3>Visitas</h3>
                  Numero de visitas


              </div>
          </div>
      </div>
  </div>';
}

/** Pie de página **/
function piePagina(){
  global $nav;
  ?>
  <!-- Footer -->
  <footer class="footer py-1 bg-primary p-4">
    <div class="container p-2 text-center">
       <img class="float-right" src="<?php echo $nav; ?>logos/logoCentro.png" width="100px">
       <img class="float-right" src="<?php echo $nav; ?>logos/logoPlan.png" width="80px">
    </div>
  </footer>
<?php
} //cerramos función piePagina()
/** Función scriptRuta **/
function scriptRuta(){
  global $nav;
?>
<!-- Bootstrap core JavaScript -->
  <script src="<?php echo $nav; ?>js/jquery/jquery-3.5.1.slim.min.js"></script>
  <script src="<?php echo $nav; ?>js/bootstrap/bootstrap.bundle.min.js"></script>
<?php
}
?>
