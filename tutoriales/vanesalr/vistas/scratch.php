<?php
    /*
    *
    *Tutorial de Scratch: Solar Jump
    *@autor: Vanesa Lourido Rivas
    *@version: 1.00.00
    *
    */
    include '../../../menu.php';
    include '../../../clases/DAO.class.php'
?>
<html>
<head>
    <title>Tutorial Solar Jump</title>
    <?php linksRuta(); ?>
    <style>
    	div p {
    		text-aling:justify;
    	}
    </style>
</head>
<body>
    <?php menuRuta(); ?>
  
 <div class="container p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="my-4 text-center text-primary">Tutorial de Scratch: Solar Jump</h1>
                        </div>
                    </div>
                </div>
    <div class="row m-4 border border-primary shadow-lg p-4 bg-light text-justify">
    <div class="col-lg-12 text-justify">
    
    <h2>Descripción</h2>
    <p>
        En este tutorial aprenderemos a hacer en Scratch un juego similar al de "Dinosaurio de Google Chrome" con temática de eficiencia energética.
        Por lo tanto, buscamos que el personaje salte cuando pulsemos las teclas espacio o click izquierdo del ratón para capturar los soles que representan la energía solar y esquive los barriles de residuos nucleares saltando para que no le quiten vidas. <br>
    </p>
    <h2>Diseño</h2>
    <p>
        Empezaremos por la parte visual del proyecto, la cual definiremos en sus términos más básicos. <br>
        Para comenzar, diseñamos el protagonista del juego y a los dos objetos que van a aparecer dándole click a la esquina inferior derecha, donde aparece el icono de Añadir objeto > Diseñar:
    </p>
    <img src=".././img/crearObjeto.jpg" width="300">
    <p>
        Añadimos un fondo al juego a nuestro gusto, en nuestro caso, un dibujo de un campo donde nuestro personaje caminará, y tendrá un segundo ascpecto negro que saldrá cuando termine el juego indicando como reiniciarlo:
    </p>
    <img src=".././img/fondos.JPG" width="200">
    <p>
        A continuación, creamos el código del personaje. Creando primero el dialogo inicial que va a realizar antes de comenzar en si el juego.  
    </p>
    <img src=".././img/dialogo.JPG" width="300">
    <h2>Lógica del programa</h2>
    <p>
        Queremos que, cuando el usuario pulse la bandera verde, el juego empiece. El personaje iniciará el dialogo de la introducción y una vez terminado, podremos empezar a jugar. Los saltos se realizarán al pulsar la barra espaciadora o haciendo click con el botón izquierdo del ratón. Se han evitado los dobles saltos para no facilitar tanto el juego y evitar hacer trampas. 
        <br>
        Por lo tanto, para empezar, cumpliremos la lógica necesaria para que el personaje salte de esta forma. Para eso, primero queremos que el personaje se situe siempre en una posición determinada aunque saltemos:
    </p>
    <img src=".././img/establecer.JPG" width="300">
    <p>
        Este incluye el siguiente bloque:
    </p>
    <img src=".././img/colocarse.JPG" width="300">
    <p>
	Al hacer click en la bandera verde, además queremos que se reestablezcan los valores de las vidas y de la puntuación, dandoles los valores que escogimos.       
	
    </p>
    <img src=".././img/puntuacion.JPG" width="200">
    <p>
        Si pulsamos la barra espaciadora o hacemos click, el personaje saltará 15 puntos hacia arriba, para simular un salto. Esto se podrá realizar mientras el perro no esté por encima de cierto valor, asi se evitan las trampas con los saltos de más.

    </p>
    <img src=".././img/salto.JPG" width="300">
    <p>
       Tanto el sol como el barril, van a tener el mismo código ya que su aparición es del mismo tipo. La unica variación es a la hora de darle el valor a la posición que ocupan con respecto al fondo. Estos objetos van a aparecer en forma de clones que se irán repitiendo a lo largo del tiempo que dure el juego de forma aleatoria.
	Si el personaje toca un barril, perderá una vida, si toca un sol, ganará un punto.
    </p>
    <img src=".././img/clonBarril.JPG" width="600">
    <img src=".././img/clonSol.JPG" width="600">
    <p>
        Cuando nos quedemos sin vidas, el fondo se cambiará, al fondo negro. Se olcultarán todos los elementos y solo quedará ese fondo y los valores de las variables de la puntuación y de las vidas. 
    </p>
    <img src=".././img/cambiarFondo.JPG" width="400">
    <p>
        Por último, la ejecución de todos estos códigos al hacer click en la bandera verde, generarán el juego!
    </p>
    <img src=".././img/ejemploJuego.JPG" width="300">
    <p>
        ¿Quieres probarlo? Puedes jugar en la ventana que habilitamos a continuación. <br>
        Esperamos que te haya servido de ayuda este tutorial, recuerda que puedes ponerte a prueba con nuestro examen.
        ¡Hasta otra!
    </p>
    <iframe src="https://scratch.mit.edu/projects/606508112/embed" allowtransparency="true" width="485" height="402" frameborder="0" scrolling="no" allowfullscreen></iframe>
    <br><a href="./formulario.php"><button class="btn btn-primary mx-auto">Ir al examen</button></a>
    </div>
    </div>
    <?php piePagina(); scriptRuta(); ?>
</body>
</html>
