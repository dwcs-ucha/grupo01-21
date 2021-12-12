<?php
    /*
    *
    *Tutorial de Scratch: Renovable Clicker
    *@autor: Jorge Seijoso González
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
	<title>Tutorial Renovable Clicker</title>
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
                            <h1 class="my-4 text-center text-primary">Tutorial de Scratch: Renovable Clicker</h1>
                        </div>
                    </div>
                </div>
    	<div class="row m-4 border border-primary shadow-lg p-4 bg-light text-justify">
    	<div class="col-lg-12 text-justify">


	<h2>Descripción</h2>

	<p>
	En este tutorial aprenderemos a hacer en Scratch un juego basado en clickar objetos relacionados con energias renovables.<br>
	Este juego consiste en pulsar los objetos renovanbles y evitar pulsar los elementos no renovables, para acumular puntos. El juego termina cuando se obtienen 20 puntos.
	</p>

	<h2>Diseño</h2>

	<p>
	Empezaremos con la parte visual del juego.
	Comenzaremos subiendo las imagenes de los elementos renovables. Para esto, nos dirigimos a la esquina inferior derecha, en el icono de Añadir objeto > Subir objeto: <br>
	</p>

	<img src="../img/imagen1.png" width="485">

	<p>Para este juego abrá tres elementos renovables.
	</p>

	<img src="../img/imagen2.png" width="485">

	<p>
	A continuación subiremos los no renovables. <br>
	Serán tres elementos:
	</p>

	<img src="../img/imagen3.png" width="485">

	<p>
	Ahora añadimos a Abby que será la que introduzca el juego.(Abby es un sprite que ya está en scratch)
	</p>

	<img src="../img/imagen4.png" width="485">
	<p>
	Ya tenemos el diseño del juego casi terminado, falta añadir los fondos, en este caso son tres, uno para cuando Abby introduce el juego, otro para el transcurso del juego y el último para cuando ganemos.(Igual que con Abby estos fondos están ya en el scratch)<br>
	Nuestros fondos serán sencillos, el primero un habitación:
	</p>

	<img src="../img/fondo1.png" width="485">

	<p>
	el segundo un fondo blanco:	
	</p>

	<img src="../img/fondo2.png" width="485">

	<p>
	y el último un fondo festivo:
	</p>
	
	<img src="../img/fondo3.png" width="485">

	<p>
	Y así, habremos terminado con la parte del diseño.	
	</p>

	<h2>Lógica del programa</h2>

	<p>
	Nustro objetivo es que al pulsar la bandera verde, el juego inicie. Al comenzar este, aparecera Abby en una habitación para introducir al juego.<br>
	Tras eso iniciara la conversación donde Abby dirá si estamos preparados para iniciar o si queremos que nos explique como jugar. Durante esta conversación ocurre que Abby es colocada en la posición x=-163 y=-3, por si no estaba colocada en esa posición originalmente ademas, de mostrarse, si estaba escondida. Tambien Sus disfraces cambian durante todo el proceso
	</p>

	<img src="../img/codigo1.png" width="485">

	<p>
	Al mismo tiempo Los objetos renovables y no renovables dan el valor cero a la variable puntos y la esconden si se mostraba a parte de esconderse ellos tambien
	</p>

	<img src="../img/codigo7.png" width="485">

	<p>
	Al final de la conversación tendremos dos opciones. La primera opción es que si pulsamos la tecla 1 aparecera el tutorial del juego.<br>
	Aqui Abby nos explicara como funciona el juego y nos mostrara cuales son los elementos renovables y cuales los no renovables(el fondo tambien cambia). Al final nos dirá que para empezar con el juego pulsemos la barra espaciadora.
	</p>

	<img src="../img/codigo2.png" width="485">

	<p>
	Ahora durante la explicacción de Abby aparecen los elementos renovables y los no renovables.<br>
	Los renovables empiezan a salir al mismo tiempo que aparece el texto que los indica como tales y duran la misma cantidad de tiempo que el texto.
	</p>

	<img src="../img/codigo3.png" width="485">
	
	<p>
	Los no renovables hacen lo mismo que los renovables cuando sale el texto referido a ellos.
	</p> 

	<img src="../img/codigo4.png" width="485">

	<p>
	Al pulsar el espacio el fondo cambiará, solo si no se vio el tutorial antes, Abby se escondera y uno de los elementos renovables y uno de los no renovables se mostrarán y la variable puntos aparecerá.
	</p>

	<p>
	Codigo de Abby al pulsar espacio:
	</p>

	<img src="../img/codigo5.png" width="485">
	
	<p>
	Codigo de renovables al pulsar espacio, el de no renovables es igual:
	</p>

	<img src="../img/codigo6.png" width="485">

	<p>
	Al clickar en uno de los dos elementos renovables o no renovables estos cambiaran su posicion a una aleatoria despues de haberle sumado o restado 1 punto respectivamente. Tambien enviaran un mensaje: "mensaje2" para los renovables y "mensaje3" los no renovables. Pero en los renovables hay una condición de que si la variable puntos es igual a 20 se esconderá y enviará un mensaje "mensaje1"
	</p>

	<p>
	Codigo de renovables:	
	</p>

	<img src="../img/codigo8.png" width="485">

	<p>
	Codigo de no renovables:	
	</p>

	<img src="../img/codigo9.png" width="485">

	<p>
	Cuando un elemento renovable recibe el "mensaje3" cambiara de posición sin otorgar puntos, mientras que el no renovable hará lo mismo con el "mensaje2".
	</p>

	<p>
	Codigo de renovables:	
	</p>

	<img src="../img/codigo10.png" width="485">

	<p>
	Codigo de no renovables:	
	</p>

	<img src="../img/codigo11.png" width="485">

	<p>
	Cuando se envie el "mensaje1" se cambiara al fondo "Party", se esconderan todos los elementos menos Abby que aparecera en el centro de la pantalla felicitando al ganador
	</p>

	<p>
	Codigo de no renovables:	
	</p>

	<img src="../img/codigo12.png" width="485">

	<p>
	Codigo de Abby:	
	</p>

	<img src="../img/codigo13.png" width="485">

	<p>
	Y así, nuestro juego estaría completo. <br>
	A continuación te lo dejamos para que lo pruebes.
	</p>

	<iframe src="https://scratch.mit.edu/projects/605295258/embed" allowtransparency="true" width="485" height="402" frameborder="0" scrolling="no" allowfullscreen></iframe>
	<br><a href="./formulario.php"><button class="btn btn-primary">Empezar el examen</button></a></div></div>
	<?php piePagina(); scriptRuta(); ?>
</body>
</html>