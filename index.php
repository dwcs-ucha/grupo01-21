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
include './tutoriales/clases/DAO.class.php';
include './tutoriales/clases/Tutorial.class.php';
include './menu.php'; 
linksRuta(1); //imprimimos en el header los links de estilo de Bootstrap
$arrayTutoriales = DAO::obtenerTutoriales('./tutoriales/csv/tutoriales.csv');
?>
</head>

<body>
  <?php menuRuta(1);//Incluimos el menú en php?> 

  <!-- Header -->
  <header>
    <img src="content/index/header/Img_header.png" class="img-fluid" alt="header">
  </header> 

  <hr>

  <!--  Content -->
  <div class="container">
    <div class="row m-4">
      <?php 
      foreach ($arrayTutoriales as $tutorial) {
        echo '<a style="color: white; text-align:center" href="./tutoriales/' . $tutorial->ruta . '">
              <div class="col-lg-3 mb-3">
                <div class="card bg-primary" id="card">
                  <div class="card-body">
                    <img src="./tutoriales/img/' . $tutorial->img . '" width="100%"></img>
                    <h3>' . $tutorial->titulo . '</h3>
                    <p style="font-size:0.8em">Autor: ' . $tutorial->autor .'</p>  
                  </div>
                </div>
              </div>
              </a>';
      }
      ?>
    </div>
  </div>

  <hr>

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

<?php scriptRuta(1) ?>
</body>

</html>