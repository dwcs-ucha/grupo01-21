<!DOCTYPE html>
<?php
    /*
    *
    *Index
    *@autor: Luis
    *@version: 1.00.00
    *
    */
?>
<html lang="es">
<head>
<title>Cursos - UchaTech</title>
<?php  
include './clases/DAO.class.php';
include './tutoriales/clases/Tutorial.class.php';
include './menu.php'; 
linksRuta(); //imprimimos en el header los links de estilo de Bootstrap
$arrayTutoriales = DAO::obtenerTutoriales('./tutoriales/csv/tutoriales.csv');
?>
</head>

 <body class="d-flex flex-column min-vh-100">
  <?php menuRuta();//Incluimos el menú en php?> 

  <!-- Header -->
  <header class="col-lg-12" style="background-color:#4285F4;padding:50px;text-align:center;">
    <img src="content/index/header/scratch_header.png" class="img-fluid text-center" alt="header" width=50%>
  </header> 
  <!--  Content -->
  <div class="container" id="tutoriales">
    <div class="row m-4">
      <?php 
      foreach ($arrayTutoriales as $tutorial) {
        echo
              '<div class="col-lg-3 mb-3">
                  <div class="card bg-primary" id="card">
                  <a style="color: white; text-align:center" href="./tutoriales/' . $tutorial->ruta . '">
                    <div class="card-body" style="height: 300px">
                      <img src="./tutoriales/img/' . $tutorial->img . '" width="90%"></img>
                      <h3>' . $tutorial->titulo . '</h3>
                      <p style="font-size:0.8em">Autor: ' . $tutorial->autor .'</p>  
                    </div>
                    </a>
                  </div>
                </div>';
           
      }
      ?>
    </div>
  </div>
<?php piePagina(); scriptRuta(); ?>
</body>

</html>