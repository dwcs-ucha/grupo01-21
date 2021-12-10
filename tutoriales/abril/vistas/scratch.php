<?php
    /*
    *
    *Tutorial de Scratch: Snake
    *@autor: Abril Yáñez Darriba
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
	<title>Tutorial SNAKE</title>
	<?php linksRuta(4); ?>
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
                            <h1 class="my-4 text-center text-primary">Tutorial de Scratch: SNAKE</h1>
                        </div>
                    </div>
                </div>
    	<div class="row m-4 border border-primary shadow-lg p-4 bg-light text-justify">
    	<div class="col-lg-12 text-justify">


	<h2>Descripción</h2>

	<p>
	En este tutorial aprenderemos a hacer en Scratch un juego similar al de "Snake", pero con temática de eficiencia energética.<br>
	Como la mayoría ya sabreís, este juego consiste en ir comiendo objetos (normalmente unas manzanas), para hacer crecer a nuestra serpiente y acumular puntos. El juego termina cuando la boca de la serpiente toca el cuerpo de esta.<br>
	En este tutorial, sustituiremos las manzanas por bombillas.
	</p>

	<h2>Diseño</h2>

	<p>
	Partiremos por la parte visual.
	Comenzaremos diseñando la cabeza de nuestra serpiente. Para esto, nos dirigimos a la esquina inferior derecha, en el icono de Añadir objeto > Diseñar: <br>
	</p>

	<img src="../img/imagen1.png" width="485">

	<p>En este tutorial haremos un diseño simple y sencillo, siendo la cabeza de la serpiente un círculo con dos ojos y una boca.
	</p>

	<img src="../img/imagen2.png" width="485">

	<p>
	A continuación diseñaremos lo que será la cola de nuestra serpiente. <br>
	Creamos otro nuevo objeto y dibujamos un circulo con un tamaño algo menor que la cabeza de la serpiente.
	</p>

	<img src="../img/imagen3.png" width="485">

	<p>
	Ahora añadimos el objeto que se va a comer la serpiente, en este caso una bombilla. En este tutorial hemos descargado una foto de internet, sin fondo.
	Para subir una imagen de nuestro ordenador volvemos a la esquina inferior derecha en el icono de Añadir objeto > Subir objeto:
	</p>

	<img src="../img/imagen4.png" width="485">
	<img src="../img/imagen5.png" width="485">

	<p>
	Ya tenemos el diseño del juego casi terminado, falta añadir los fondos, en este caso dos, uno para el transcurso del juego y otro para cuando hagamos GAME OVER.<br>Nos dirigimos otra vez a la parte inferior derecha y seleccionamos el icono Elige un fondo > Diseñar:
	</p>

	<img src="../img/imagen6.png" width="485">

	<p>
	Nuestros fondos serán sencillos, el primero un fondo blanco y el segundo, para el GAME OVER, un fondo negro con ese mismo texto escrito.	
	</p>

	<img src="../img/imagen7.png" width="485">

	<p>
	Y así, habremos terminado con la parte del diseño.	
	</p>

	<h2>Lógica del programa</h2>

	<h4>Importante:</h4>
	<p>
	Para este juego, es necesario instalar la extensión "Lápiz", que podemos descargar en la esquina inferior izquierda de la pantalla.
	</p>

	<p>
	Nustro objetivo es que al pulsar la bandera verde, el juego comience. Al comenzar este, la serpiente debe de de empezar a moverse automáticamente, debe de ir dibujándose su cuerpo y los objetos han de aparecer de forma aleatoria.<br>
	Para empezar, haremos que nuestra serpiente empiece siempre en el centro de la pantalla, y con la herramienta lápiz conseguiremos que vaya trazando su propio cuerpo a medida que se va moviendo. 
	</p>

	<img src="../img/imagen8.png" width="485">

	<p>
	Con estos bloques, conseguiremos que siempre que pulsemos la bandera, el lápiz se levante (por tanto dejará de dibujar), se borre lo dibujado en la anterior partida y la serpiente se mueva al centro del escenario. Debemos de ponerle el mismo color que la serpiente al lapiz, cambiarle el tamaño y bajar el lápiz para que así empiece a dibujar. <br>
	Haremos que la serpiente se mueva por siempre cuando se pulse la bandera.<br>
	<br>
	Ahora necesitamos que la serpiente se mueva a la derecha e izquierda pulsando las flechas del teclado. En el apartado Eventos encontramos un bloque de "al presionar tecla", seleccionamos la flecha derecha y en el apartado Movimientos seleccionamos el bloque "girar 15 grados". 
	</p>

	<img src="../img/imagen9.png" width="485">
	
	<p>
	Para que el movimiento no sea tan brusco, añadimos el "repetir 15", y giramos 6 grados (15*6=90), y hacemos el mismo procedimiento para girar a la izquierda.<br>
	Con esto, ya habremos conseguido que nuestra serpiente se mueva, ahora tendremos que establecer una condición para que la cola de nuestra serpiente se vaya plegando. <br>
	Para continuar, crearemos una variable llamada "longitud", y dos listas que recojan los puntos por los que pasa nuestra serpiente. Una de las listas será "serpienteX" y otra "serpienteY".
	</p> 

	<img src="../img/imagen10.png" width="485">

	<p>
	Eliminamos todos los datos de ambas listas cada vez que comencemos el juego, y enviaremos un mensaje "START". Modificamos los bloques para que la serpiente comience a moverse cuando reciba este mensaje, y no cuando se clicke la bandera.<br>
	Añadimos dos bloques para que vayan guardando los valores de la posición de nuestra serpiente.
	</p>

    <p>
    Programaremos la cola de nuestra serpiente para que recorra el mismo recorrido que la cabeza de esta, como mostramos a continuación.
    </p>

	<img src="../img/imagen11.png" width="485">

    <p>
    A continuación programaremos nuestra bombilla, para que aparezca en un sitio aleatorio, al comienzo tras un intervalo de tiempo y luego cada vez que nos comamos una.
    </p>

	<img src="../img/imagen12.png" width="485">

    <p>
    Ahora nos quedaría hacer que el juego terminase al tocar un borde o cuando la boca de la serpiente tocase su cuerpo. Esto lo haremos programando la cabeza.
    </p>

	<img src="../img/imagen13.png" width="485">

    <p>
    IMPORTANTE: programa cada objeto para que se oculte cuando reciba GAME OVER. <br>
    Y así, nuestro juego estaría completo. <br>
    A continuación te dejamos nuestro juego para que lo pruebes. <br>
    Esperamos que te haya servido de ayuda este tutorial, recuerda que puedes ponerte a prueba con nuestro examen. <br>
    ¡Hasta otra!
    </p>

    <iframe src="https://scratch.mit.edu/projects/609974018/embed" allowtransparency="true" width="485" height="402" frameborder="0" scrolling="no" allowfullscreen></iframe>
    <br><a href="./formulario.php"><button class="btn btn-primary">Ir al examen</button></a></div></div>
    <?php piePagina(); scriptRuta(); ?>
</body>
</html>
    
