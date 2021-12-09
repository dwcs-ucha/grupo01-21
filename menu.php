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
    body {
      margin-top: 55px;
    }
    .footer {
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

          <li class="nav-item me-4">
            <a class="nav-link text-white" href="#"><?php echo $valoresMenu['recursos']; ?></a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              <?php echo $valoresMenu['idioma']; ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
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
              <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <?php echo $usuario->getNombreUsuario(); ?>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
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

/** Pie de página **/
function piePagina(){
  ?>
  <!-- Footer -->
  <footer class="footer py-1 bg-primary">
    <div class="container">
      <p class="m-0 text-center ">
        <center class="text-white">////////////////////////////////////////////////////////////////////</center>
        <center class="text-white">Pie de pagina</center> 
        <center class="text-white">////////////////////////////////////////////////////////////////////</center>
      </p>
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
