<!DOCTYPE html>
<?php
/*
*
*Perfil
*@autor: Daniel Rivas Arévalo
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
    if (!isset($_SESSION['usuario'])) { //No caso de que o usuario non estea identificado:
        die("<p>Error - debe <a href='index.php'>identificarse</a>.</p>");
    }
    else {
        linksRuta(); //imprimimos en el header los links de estilo de Bootstrap
        $tutoriales = DAO::obtenerTutoriales('./tutoriales/csv/tutoriales.csv');
        $puntuacion = $usuario->getPuntuacion();
    ?>
    </head>
    <body>
        <?php menuRuta(); ?>
        <h1><?php echo $usuario->getNombreUsuario(); ?></h1>
        <?php 
        $puntuacionTotal = 0;
        echo '<h2>Puntuaciones</h2>';
        foreach ($tutoriales as $tutorial) {
            for ($i=1; $i<=count($puntuacion); $i++) {
                if($i == $tutorial->cod) {
                    echo '<p>' . $tutorial->titulo . ': ' . $puntuacion[$i] . ' puntos</p>';
                    $puntuacionTotal+=$puntuacion[$i];
                }
            }
        }
        echo '<p>Tu puntuación total es de ' . $puntuacionTotal . ' puntos</p>';

        
        piePagina(); scriptRuta(); 
    }?>
    </body>

</html>
