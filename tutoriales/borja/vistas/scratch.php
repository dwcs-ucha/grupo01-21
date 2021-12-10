<?php
    /*
    *
    *Titulo: tutorial de Scratch
    *@autor: Borja Mosquera Fernández
    *@version: 1.00.00
    *
    */
    include '../../../menu.php';
?>
<html>
<head>
    <title>Cuento energentico</title>
    <?php linksRuta(); ?>
</head>
<body>
    <?php menuRuta(); ?>	
	<div class="container p-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="my-4 text-center text-primary">Tutorial de Scratch: Cuento energetico</h1>
            </div>
        </div>
    </div>
    <div class="row m-4 border border-primary shadow-lg p-4 bg-light text-center">
    <div class="col-lg-12">
    <h3>Descripción</h3>
    <p> En el video nos enseñaran unos trucos para ser mas eficientes en casa. Al finalizar el video realizaremos unas preguntas para saber si estuvieron atentos al video. </p>
    <h3>El diseño</h3>
    <p>	Empezamos el programa al pulsar en la <b>bandera verde</b>, y lo primero que hacemos es fijar la visualización de los muñecos, cuanto menos porcentaje mas invisibles. </p>
    <img src=".././img/Captura0.JPG" width="500">
    <p>En <b>ir a</b>, marcamos las coordenadas donde queremos que empiecen y cambiar el disfraz, lo utilizaremos para cambiar la expresión de la cara.</p>
    <img src=".././img/Captura1.JPG" width="500">
    <p>Con <b>decir</b>, hacemos que los muñecos hablen entre sí, todos los diálogos son con <b>dicen</b>, en <b>durante</b> elijes el tiempo que quieres que se muestre el mensaje. El cuadrado amarillo que pone esperar lo utilizamos para espaciar las conversaciones. Es un espacio de tiempo vació.</p>
    <img src=".././img/Captura2.JPG" width="500">
    <img src=".././img/Captura3.JPG" width="500">
    <p>Con el bloque <b>repetir</b> es utilizado como un <b>for</b> en programación y quiere decir que, repetimos el numero de veces que ponemos dentro del circulo, la interacción que ponemos dentro, en este caso moverían 30 pasos, esperamos medio segundo y esta secuencia se repetiría 3 veces</p>
    <img src=".././img/Captura9.JPG" width="500">
    <p><b>Deslizar en 1</b>, lo usaremos para desplazar los muñecos por la pantalla hacía un punto determinado, en el primer circulo cuanto mayor sea el valor, más rápido se deslizará</p>
    <img src=".././img/Captura4.JPG" width="500">
    <p> Ahora realizamos la pregunta, y con un bloque <b>si</b> preparamos la reacción a la respuesta. El bloque <b>si</b>  es comparable en programación al bucle <b>if</b>, que quiere decir,  que permite ejecutar un fragmento de código si la expresión provista junto con ella se evalúa como verdadera, quiere decir que, si la respuesta igual a 1 es verdadero hacemos la primera parte de la función, en cambio, si respuesta no es igual a 1 ejecutaremos la segunda parte de la función. </p>
    <img src=".././img/Captura6.JPG" width="500">
 
    <p>
        Creo que necesitas verlo para verificar y comprobar todos los pasos que hemos echo ahora <br>
        Esperamos que te haya servido de ayuda este tutorial, recuerda que puedes ponerte a prueba con nuestro examen.
    </p>
    <iframe src="https://scratch.mit.edu/projects/605293171/embed" allowtransparency="true" width="500" height="400" frameborder="0" scrolling="no" allowfullscreen></iframe>
    <br><a href="./formulario.php"><button class="btn btn-primary">Ir al examen</button></a>
	</div>
	</div>
    <?php piePagina(); scriptRuta(); ?>
</body>
</html>
