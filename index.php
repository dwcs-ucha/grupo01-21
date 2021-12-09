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

<body>
  <?php menuRuta();//Incluimos el menú en php?> 

  <!-- Header -->
  <header>
    <img src="content/index/header/Img_header.png" class="img-fluid" alt="header">
  </header> 

  <hr>

  <!--  Content -->
  <div class="container" id="tutoriales">
    <div class="row m-4">
      <?php 
      foreach ($arrayTutoriales as $tutorial) {
        echo
              '<div class="col-lg-3 mb-3">
                  <div class="card bg-primary" id="card">
                  <a style="color: white; text-align:center" href="./tutoriales/' . $tutorial->ruta . '">
                    <div class="card-body">
                      <img src="./tutoriales/img/' . $tutorial->img . '" width="100%"></img>
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

  <hr>

  
<?php piePagina(); scriptRuta(); ?>
</body>

</html>