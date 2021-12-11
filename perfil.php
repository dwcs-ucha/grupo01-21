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
        $arrayUsuarios = DAO::obtenerUsuarios('./login-registro/csv/usuarios.csv');
    ?>
    </head>
    <body class="bg-primary bg-opacity-50">
        <?php menuRuta(); ?>
        <div class="container p-4">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="my-4 text-center text-white"><?php echo 'Perfil: ' . $usuario->getNombreUsuario(); ?></h1>
                </div>
            </div>
        </div>
        <?php 
        $puntuacionTotal = 0;
        echo '<div class="row m-4 border border-primary shadow-lg p-4 bg-light"><h2 class="text-primary text-center">Puntuaciones</h2>';
        echo '<hr class="color-primary">';
        echo '<div class="col-lg-12 text-center">';
        foreach ($tutoriales as $tutorial) {
            for ($i=1; $i<=count($puntuacion); $i++) {
                if($i == $tutorial->cod) {
                    echo '<p><a href="./tutoriales/' . $tutorial->ruta . '">' . $tutorial->titulo . '</a>: ' . $puntuacion[$i] . ' puntos</p>';
                }
            }
        }
        echo '<hr class="color-primary"><h5 class="text-center">Tu puntuación total es de ' . $usuario->puntuacionTotal() . ' puntos</h5><br></div></div>';

        //Ranking
        $ranking = array();
        $puntuacionMayor=0;
        foreach ($arrayUsuarios as $usuarioValor) {
            $ranking[$usuarioValor->getNombreUsuario()]=$usuarioValor->puntuacionTotal();
        }
        arsort($ranking);
        $i=1;
        
    ?> 

    <div class="container p-4">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="my-4 text-center text-white">Ranking</h1>
                </div>
            </div>
        </div>
    <div class="row m-4 border border-primary shadow-lg p-4 bg-light text-center">
        <div class="col-lg-12">
        <?php 
            foreach ($ranking as $usuarioValor=>$puntuacion) {
                if($i==1) {
                    echo '<img src="./content/medallas/oro.png" width="60px">';
                } else if($i==2) {
                    echo '<img src="./content/medallas/plata.png" width="60px">';
                } else if($i==3) {
                    echo '<img src="./content/medallas/bronce.png" width="60px">';
                } else {
                    echo '<hr>';
                }
                echo "<p>El usuario en " . $i . "ª posición es: " . $usuarioValor . " con " . $puntuacion . " puntos.</p>";
                if($i==5) { break; }
                $i++;
            }
        ?>
        </div>
    </div>

    <?php
        piePagina(); scriptRuta(); 
    }?>
    </body>

</html>
