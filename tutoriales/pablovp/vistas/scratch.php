<!DOCTYPE html>
<?php
    /*
    *
    *Tutorial de Scratch: Flappy Bird Ecológico
    *@autor: Pablo Vázquez Pereiro
    *@version: 1.00.00
    *
    */
    include '../../../menu.php';
    include '../../../clases/DAO.class.php';
?>
<html>
<head>
    <title>Tutorial Flappy Bird Ecológico</title>
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
                            <h1 class="my-4 text-center text-primary">Tutorial de Scratch: Flappy Bird Ecológico</h1>
                        </div>
                    </div>
                </div>
    <div class="row m-4 border border-primary shadow-lg p-4 bg-light text-justify">
    <div class="col-lg-12 text-justify">
    <h2>Descripción</h2>
    <p>
        En este tutorial aprenderemos a hacer un juego como el Flappy Bird pero con una temática de ahorro energético. En este caso tu serás una bombilla
        que tendrá que pasar a través de barra energéticas de tipo G. Si tocas estas barras se acaba el juego. La intención es hacer que esas barras vayan avanzando
        hacia ti mientras tu te mueves de arriba a abajo esquivándolas. Cada vez que pases exitosamente a través de ellas conseguirás puntos que se irán acumulando.<br>
    </p>
    <h2>Diseño</h2>
    <p>
        Antes que nada vamos a crear nuestros fondos. <br>
        En principio solo necesitaremos dos, uno para cuando se esté ejecutando el juego y otro para cuando hayamos perdido.
    </p>
    <img src=".././img/fondoBase.png" width="485"> <img src=".././img/fondoGameOver.png" width="485">
    <p>
        Una vez hemos creado nuestros fondos deseados vamos a proceder a crear los objetos que vamos a necesitar para llevar a cabo este juego.
    </p>
    <p>
        Primero crearemos a nuestro "Flappy Bird" que en mi caso será una bombilla. Para ello escogeré una imagen de internet que me parezca de mi agrado y la importaré.
        Una vez hecho eso la duplicaré y le realizaré unos pequeños retoques para que despues podamos hacer una pequeña animación. y quedarían tal que así:
    </p>
    <img src=".././img/bombilla1.png" width="485"> <img src=".././img/bombilla2.png" width="485">
    <p>
        Una vez creado el personaje que utilizaremos vamos a crear otro objeto que se corresponderían a las tuberías que tenemos que esquivar. En este caso elegí unas barras
        de ahorro energético de tipo G pero pueden ser lo que tu consideres mientras tenga esa forma alargada.
    </p>
    <p>
        Primerocrearemos una de las barras y la centraremos aprovechandonos de la marca que nos deja el propio scratch. Una vez creada la duplicamos y la invertiremos de tal forma que quedenapuntandose la una a la otra de la siguiente forma:
    </p>
    <img src=".././img/barra1.png" width="485"><img src=".././img/barra2.png" width="485">
    <p>Y así ya tendríamos todos los objetos necesarios para trabajar</p>
    <h2>Lógica del programa</h2>
    <p>
        Primero empezaremos inicializando el código en los escenarios. Utilizando la función de cuando le das a la bandera se cambie el escenario al que creamos para ser utilizado mientras estamos jugando y le indicamos que envíe una señal de que se inicialice el juego.
        También vamos a aprovechar aquí y le diremos que la variable de puntos nos la ponga a cero.
        La otra función que vamos a preparar en este apartado de escenarios es que cuando nos llegue el mensaje de Game Over se nos cambie el escenario al de Game oVer y que se detenga el programa.
    </p>
    <img src=".././img/escenario.png" width="485"><img src=".././img/gameOver.png" width="485">
    <p>
        Una vez hecho eso vamos a configurar las barras para que vayan avanzando y generandose aleatoriamente.
        <br/>
        Para ellos empezaremos mandandolas a la derecha de todo con la opcion de go to y en la x pondríamos 240 mientras que para la y le pondriamos 0
        Como las barras con las que vamos a trabajar realmente no son las tuberías reales vamos a crear una función que se va a ocupar de crear clones de estas.
        utilizando el siguiente código: 
    </p>
    <img src=".././img/barraDerecha.png" width="485"><img src=".././img/crearTuberia.png" width="485">
    <p>
        Al utilizar ese codigo nos permite hacer que el espacion entre la tubería de abajo y la de arriba sea siempre la misma.
        Para hacer que esto funcione y que se vayan creando las tuberías hacemos lo siguiente:
    </p>
    <img src=".././img/tuberiaOriginal.png" width="485">
    <p>
        Eso esconderá la tubería original y llamará a la funcion cada cierto tiempo para que se creasen las tuberías.
        <br/>
        Por ultimo respecto a las barras faltaría hacer que se muevan. Para ello empezaremos con el inicializador de when I start as a clone. Le indicamos que se muestre puesto que estaban escondidas
        y hacemos un bucle por siempre. En este le indicamos que vayan cambiando su posición x por -5 para que vaya avanzando de derecha a izquierda y creamos un bucle que vaya comprobando que si llegan a la izquierda de todo que el bloque desaparezca.
        También vamos a añadir un bucle para que cuando pasen por la zona en la que va a estar nuestro futuro "Flappy Bird" nos sume un punto.
    </p>
    <img src=".././img/clonMovimiento.png" width="485">
    <p>
        Ahora que ya tenemos las barras listas vamos a crear el flappy bird. Para ello haremos que cuando se pulse la bandera le mandamos a la posición en la que queremos que empiece.
        La posición ideal es una altura centrada y desplazado hacia la izquierda. Para hacer que tenga un poco de movimiento nuestro objeto haremos lo siguiente para que se vayan intercambiando los disfraces:
    </p>
    <img src=".././img/objetoCambios.png" width="485">
    <p>
        Ahora vamos a hacer que cuando pulsemos el espacio suba hacia arriba y si no que se vaya hacia abajo. Además haremos que cuando toque un borde o una barra que pierdas el juego con el siguiente código:
    </p>
    <img src=".././img/movimientoVertical.png" width="485"><img src=".././img/tocando.png" width="485">
    <p>
        ¿Quieres probarlo? Puedes jugar en la ventana que habilitamos a continuación. <br>
        Esperamos que te haya servido de ayuda este tutorial, recuerda que puedes ponerte a prueba con nuestro examen.
        ¡Hasta otra!
    </p>
    <iframe src="https://scratch.mit.edu/projects/151968647/embed" allowtransparency="true" width="485" height="402" frameborder="0" scrolling="no" allowfullscreen></iframe>
    </div>
    <br><a href="./formulario.php"><button class="btn btn-primary mx-auto">Ir al examen</button></a>
    </div>
    <?php piePagina(); scriptRuta(); ?>
</body>
</html>