<!DOCTYPE html>
<?php
/*
 *
 * Tutorial de Scratch: Tres en Raya
 * @autor: Luis Angel Ares Prieto
 * @version: 1.00.00
 *
 */
include '../../../menu.php';
include '../../../clases/DAO.class.php';
?>
<html>
    <head>
        <title>Tutorial Tres en Raya</title>
        <?php linksRuta(); ?>
        <style>
            div p {
                text-align:justify;
            }
        </style>
    </head>
    <body>
        <?php menuRuta(); ?>
        <div class="container p-4">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="my-4 text-center text-primary">Tutorial de Scratch: Tres en Raya</h1>
                </div>
            </div>
        </div>
        <div class="row m-4 border border-primary shadow-lg p-4 bg-light text-justify">
            <div class="col-lg-12 text-justify">
                <h1>DEFINICIÓN</h1>
                <p><center>El Juego de tablero cuadrado con nueve casillas unidas por líneas, en el cual los dos jugadores disponen de tres fichas cada uno que deben alinear formando una recta.<center></p>
                        <h1>Version 1.0</h1>
                        <p><center><img src="../img/ri_1.png" alt=""></center></p>
                        <h1>DESARROLLO</h1>
                        <p><center>1.	Creamos los objetos y le damos  funcionalidad, cada uno representa una casilla.<br><img src="../img/ri_2.png" alt=""></center></p>
                        <p><center>2.	Añadimos las variables y lista necesarias para el desarrollo del mismo.<br><img src="../img/ri_3.png" alt=""><br><img src="../img/ri_4.png" alt=""></center></p>
                        <p><center>3.	Comportamiento de cada objeto<br><img src="../img/ri_5.png" alt=""><br>(En la imagen se muestra el objeto: casilla1 ya que una vez creado uno duplicamos dicho objeto tantas veces como nos sea necesario)</center></p>
                        <p><center>4.	Definimos bloques para ambos jugadores en el escenario<br>Jugador X<br><img src="../img/ri_6.png" alt=""></center><br>Jugador O<br><img src="../img/ri_7.png" alt=""></center></p>
                    <p><center>5.	Comportamiento del escenario<br><img src="../img/ri_8.png" alt=""></center><br>(Cada vez que pulsemos la bandera reiniciara las variables y la lista con los valores predeterminados)<br><img src="../img/ri_9.png" alt=""><br>
                    (Cada vez que pulsemos la bandera comprueba ambos jugadores y si gana O enviara el mensaje “Gana O” o sino “Gana X”)<br>

                    “Gana O” -> Se utilizara en la siguiente versión del juego para que sea más interactivo.<br>
                    “Gana X” -> Se utilizara en la siguiente versión del juego para que sea más interactivo.
                </center></p>

                <h1>Version 2.0</h1>
                
                <iframe src="https://scratch.mit.edu/projects/615630300/embed" allowtransparency="true" width="700px" height="600px" frameborder="0" scrolling="no" allowfullscreen></iframe>
            </div>
            <br><a href="./formulario.php"><button class="btn btn-primary mx-auto">Ir al examen</button></a>
        </div>
        <?php
        piePagina();
        scriptRuta();
        ?>
    </body>
</html>