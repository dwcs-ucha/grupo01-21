<?php
    /*
    *
    *Tutorial de Labirinthya
    *@autor: FranciscoGB
    *@version: 1.00.00
    *
    */
    include '../../../menu.php';
	include '../../../clases/DAO.class.php'
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Tutorial Labirinthya</title>
	<?php linksRuta(4); ?>
	<style>
		div p {
		    text-align:justify;
		}
		.imgLab{
			width: 15%;
			height: auto;
			border: solid 1px blue;
		}
		.imgLabFondo{
			width: 30%;
			height: auto;
			border: solid 1px blue;
		}
	</style>
</head>
<body>
	<?php menuRuta(); ?>
 	<div class="container p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="my-4 text-center text-primary">Tutorial de Scratch Labirinthya</h1>
                        </div>
                    </div>
                </div>
    	<div class="row m-4 border border-primary shadow-lg p-4 bg-light text-justify">
    	<div class="col-lg-12 text-justify">


	<h2>Descripción</h2>

	<p>
	Hoy aprenderemos a crear el juego de laberintos 'Labirinthya', pongo a tu disposición este tutorial y espero que aprendas a elaborarlo por ti mismo con ayuda de él.
	</p>

	<h2>Diseño de las figuras</h2>

	<p>
	Comenzaremos añadiendo a la pobre alma del señor que se va a adentrar en nuestro laberinto, Para esto, nos dirigimos a la esquina inferior derecha, en el icono de Añadir objeto y buscamos la imágen que más nos guste,
	en mi caso uso la de D-Monkey, las bombillas fueron sacadas de internet y las paredes son un diseño hecho gracias a las figuras 'paddle'.  <br>
	</p>

	<img src="../img/imagen1.png" class="imgLab">

	<p>
	La figura de nuestro corredor del laberinto
	</p>

	<img src="../img/imagen2.png" class="imgLab">

	<p>
	A continuación diseñaremos la forma que va a mirar el personaje en cada movimiento. <br>
	
	</p>

	<img src="../img/imagen3.png" class="imgLab">

	<p>
	A continuacion montamos el laberinto con las figuras 'paddle'.
	</p>

	<img src="../img/imagen4.png" class="imgLab">
	<p>La figura de nuestro laberinto con sus paredes verdes o el color que prefiera</p>
	<img src="../img/imagen5.png" class="imgLab">

<h2>Lógica del programa</h2>
	<p>
	Empezamos con qué hacer al tocar la bandera, si en un casual tocamos los paneles verdes,
	se reiniciará todo; si tocamos la bombilla alógena, perderemos la partida y si tocamos
	la bombilla led ganamos
	</p>

	<img src="../img/imagen6.png" class="imgLab">

	<p>
	En el caso de que toquemos las teclas, D-Monkey se moverá segun la tecla	
	</p>

	<img src="../img/imagen7.png" class="imgLab">

	<p>
	 En el caso de ganar, enviamos el mensaje ganar (apareciendo el fondo de ganador)
	 y en caso de perder, el mensaje de perdido (cambiando el fondo al de perder con 
	 el boton de volver a intentarlo)
	</p>

	<img src="../img/imagen8.png" class="imgLab">
	<h2>Diseño de los fondos</h2>
	<p>
	El fondo principal es blanco, en el cual apoyamos la figura del laberinto
	</p>

	<img src="../img/imagen9.png" class="imgLabFondo">
	
	<p>
	En el caso de tocar la bombilla led y ganar, el fondo cambia a ganador que
	está decorado de forma invernal y tiene un pequeño secretito
	</p> 

	<img src="../img/imagen10.png" class="imgLabFondo">

	<p>
	En el caso de tocar la bombilla alógena y perder, el fondo cambia a perder, que
	está decorado con colores rojos y fuente pixel
	</p>

	<img src="../img/imagen11.png" class="imgLabFondo">

    <p>
    El último fondo es el del Easter Egg, no voy a descubrir como entrar 
    </p>

	<img src="../img/imagen12.png" class="imgLabFondo">

    <p>
    Ahora solo nos queda disfrutar del propio juego.
	<br>Gracias por Entrar en nuestra Web.
    </p>

    <iframe src="https://scratch.mit.edu/projects/605401670/embed" allowtransparency="true" width="80%" height="300" frameborder="0" scrolling="no" allowfullscreen></iframe>
    <br><a href="./formulario.php"><button class="btn btn-primary">Ir al examen</button></a></div></div>
    <?php piePagina(); scriptRuta(); ?>
</body>
</html>
    
