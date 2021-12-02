<?php 
/*
*
*Index
*@autor: Luis
*@version: 1.00.00
*
*/
/** Función links Ruta **/
function linksRuta() { 
  $nav= "http://" . $_SERVER['SERVER_NAME'] . "/grupo01-21/";
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
<?php
} //cerramos llave de la función linksRuta()

/** Función menuRuta **/
function menuRuta(){
  $nav= "http://" . $_SERVER['SERVER_NAME'] . "/grupo01-21/";
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
            <a class="nav-link text-white" href="<?php echo $nav; ?>cms/vistas/blog.php">Blog</a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link text-white" href="<?php echo $nav; ?>cms/vistas/cms.php">Nueva entrada</a>
          </li>
          <li class="nav-item me-4">
            <a class="nav-link text-white" href="#">Usuarios</a>
          </li>

          <li class="nav-item me-4">
            <a class="nav-link text-white" href="#">Recursos</a>
          </li>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button"
              data-bs-toggle="dropdown" aria-expanded="false">
              Equipo
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item text-primary" href="#">Frontend</a></li>
              <hr class="dropdown-divider">
              <li><a class="dropdown-item text-primary" href="#">Contido</a></li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item text-primary" href="#">Backend</a></li>
            </ul>
          </li>

        </ul>

        <!-- Formulario -->
        <form class="d-flex">
          <button class="btn btn-outline-light me-4" type="submit">Iniciar sesión</button>
          <button class="btn btn-outline-light me-4" type="submit">Registro</button>
        </form>
      </div>
    </div>
  </nav>
  <?php
} //cerramos la función menuRuta()

/** Pie de página **/
function piePagina(){
  ?>
  <!-- Footer -->
  <footer class="py-1 bg-primary">
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
  $nav= "http://" . $_SERVER['SERVER_NAME'] . "/grupo01-21/";
?>
<!-- Bootstrap core JavaScript -->
  <script src="<?php echo $nav; ?>js/jquery/jquery-3.5.1.slim.min.js"></script>
  <script src="<?php echo $nav; ?>js/bootstrap/bootstrap.bundle.min.js"></script>
<?php
}
?>
