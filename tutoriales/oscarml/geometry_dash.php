<!DOCTYPE html>
<?php
    /*
    *
    *Tutorial de Scratch: Geometry Dash
    *@autor: Óscar Martínez López
    *@version: 1.00.00
    *
    */
    include("../../menu.php");
    include("../../clases/DAO.class.php");
?>
<html>
<head>
    <title>Tutorial Geometry Dash</title>
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
                            <h1 class="my-4 text-center text-primary">Tutorial de Scratch: Geometry Dash</h1>
                        </div>
                    </div>
    </div>
    <div class="row m-4 border border-primary shadow-lg p-4 bg-light text-justify">
    <div class="col-lg-12 text-justify">
    <h2>Descripción</h2>
    <p>
        En este tutorial aprenderemos por encima a hacer en Scratch un juego similar al de "Geometry Dash" donde crearemos un nivel con una serie de obstáculos que el jugador ha de superar
        hasta llegar a la meta.
    </p>
    <h2>Explicación objeto por objeto</h2>
    <p>
        Iremos explicando cada objeto por separado para ir detallando lo que hace especificamente cada uno. Empezamos por el JUGADOR:
    </p>
    <img src="./img/tutorial/jugador.PNG" width="700"><br/><br/>
    <p>
        Creamos un bloque que llamamos gravedad, para simular la gravedad cuando salte el jugador en el juego. Tenemos que crear una variable para saber la velocidad en el eje Y del jugador y le damos el valor de
        la gravedad real, que es el que mejor se ajusta. Indicamos los grados que girará mientras está en el aire e insertamos un if con la condición de que si está tocando el objeto suelo (que veremos más adelante) que apunte
        hacia la dirección más cercana a un múltiplo de 90º. Mientras no toca el suelo modificaremos la Y de uno en uno y luego definiremos la velocidad en el eje Y y la variable aire a 0, si no está tocando el suelo
        le daremos el valor de 1 a la variable aire. De esta forma tomará el valor 0 cuando el jugador esté tocando el suelo y 1 cuando esté en el aire.<br/><br/>

        Si el jugador toca algún obstáculo enviaremos 'game over' para poder ejecutar otras funciones.<br/><br/>

        Cuando pulsamos la bandera verde para iniciar el juego enviaremos 'start'.<br/><br/>

        Cuando recibe 'start' definimos velocidadY, jugadorX y stop a 0. Hacemos que el jugador se coloque en una posición en específico (selecciona la tuya a gusto), que apunte hacia delante y se muestre. Dentro de un bucle creamos
        un if que si stop es igual a 0, llamamos al bloque gravedad y que si pulsamos la barra espaciadora y la velocidadY es igual a 0, es decir, está en el suelo, ponemos la velocidadY a 20 para que el jugador salte y finalmente
        cambiamos jugadorX a -12..<br/><br/>

        Por úlitmo, cuando recibamos 'win', le mandamos al jugador que se vaya a la antepenúltima capa para hacer una animación cuando llega a la meta.
    </p>
    <p>
        Vamos ahora con el objeto SUELO:
    </p>
    <img src="./img/tutorial/suelo.PNG" width="700"><br/><br/>
    <p>
        Cuando pulsamos la bandera verde ocultamos el objeto, definimos la x a -470 y cambiamos el traje a suelo 1. Creamos un bucle que se repita tantas veces como distintos suelos tenemos, en mi caso 18. Al final de la página
        os dejo un zip para poder descargar todos los distintos disfraces (<em>costumes</em>), jugador, fondo y el resto recursos que podais necesitar. Cuando creamos un clon, lo mostramos, y relizamos un bucle que si stop es igual
        a 0 se coloque el nuevo suelo en la posición que indicamos y para eliminar un pequeño bug que se produce tenemos que poner el último if-else, para cuando un disfraz llegue al final se oculte y no se quede en pantalla.<br/><br/>

        Este es un ejemplo de un disfraz del suelo:
    </p>
    <img src="./img/tutorial/disfrazSuelo.PNG" width="700"><br/><br/>
    <p>
        En el objeto FONDO tenemos algo similar:
    </p>
    <img src="./img/tutorial/fondo.PNG" width="700"><br/><br/>
    <p>
        Cuando iniciamos el programa hacemos que vaya para la última capa, que cree un clon de si mismo y cremos un bucle para que vaya a determinada posición (se han hecho pruebas y estas cantidades son las idóneas, aunque puedes hacer
        pruebas por tu cuenta).<br/><br/>

        El objeto OBSTACULOS es una parte importante para saber que parte del mapa es un obstaculo y cual no, pero en verdad no tiene mucha ciencia porque en la parte de código es prácticamente igual a la del objeto SUELO:
    </p>
    <img src="./img/tutorial/obstaculos.PNG" width="700"><br/><br/>
    <p>
        Solo se diferencia en la parte de los disfraces, os dejo aquí el mismo disfraz que os dejé arriba del suelo solo que está preparado para ser un obstáculo, es decir, solamente tienes que dejar los elementos que quieres que funcionen
        como obstáculos, como por ejemplo los pinchos:
    </p>
    <img src="./img/tutorial/disfrazObstaculo.PNG" width="700"><br/><br/>
    <p>
        Fijaos en que borré el suelo, porque no quiero que lo detecte como obstáculo y también los bloques donde se apoya el jugador. Pero se pueden observar unas líneas en el lateral de donde irían los bloques para que si choca el jugador por ese lado
        que vuelva a empezar de nuevo.<br/><br/>

        Ahora crearemos unas partículas que se generarán detrás del jugador cuando está tocando el suelo simulando velocidad.
    </p>
    <img src="./img/tutorial/disfrazParticulas.png" width="700"><br/><br/>
    <p>
        Empezaremos creando un disfraz muy simple, un cuadrado del color que quieras. Cabe remarcar que tú puedes hacer la forma que más te guste. 
    </p>
    <img src="./img/tutorial/particulasJugador.PNG" width="700"><br/><br/>
    <p>
        En la parte de código creamos un bloque que llamamos setup. Dentro de él decimos que vaya a la posición del jugador, que sería el centro del jugador, por eso luego ponemos dos bloques cambiando la X y la Y para que se posicione en la esquina
        inferior izquierda del jugador.<br/><br/>

        Ponemos un bloque para que las formas que haga tengan un tamaño aleatorio entre 75 a 125, aquí vuelvo a repetir que tú puedes poner los valores que quieras (al igual que en el resto de 'pick random' que vamos a ver ahora). Luego definimos un
        efecto ghost aleatorio entre 10 y 50, que apunte en una posición aleatoria entre -90 y -60 y la velocidad entre 10 y 14.<br/><br/>

        Por último creamos un if para que si el jugador está en el aire o acaba de chocar con algún objeto se oculte y sino siga mostrándose.<br/><br/>

        Cuando iniciamos el juego ocultamos las partículas y hacemos un bucle para crear 20 clones de sí mismo y cuando creamos dichos clones los mostramos y dentro de un bucle forever llamamos al bloque setup y repetimos 20 veces el bloque 'move steps'
        con la variable velocidad y cambiamos el efecto ghost a 10.<br/><br/>

        Vamos con el objeto Win, que mostrará un mensaje por pantalla de 'Nivel superado!' cuando lleguemos a la meta:
    </p>
    <img src="./img/tutorial/mensajeWin.PNG" width="700"><br/><br/>
    <p>
    Cuando iniciamos el juego lo colocamos en la posición que queremos que se muestre en la pantalla, a todo esto, el disfraz de este objeto es un texto que pone 'Nivel superado!' como el de la foto, aunque lo puedes personalizar como quieras.
    </p>
    <img src="./img/tutorial/disfrazWin.png" width="700"><br/><br/>
    <p>
        También le indicamos que se coloque en la primera capa para asegurarnos de que se vea siempre y creamos un bucle para que compruebe todo el rato si la posición X del jugador es menor a -7500. Ojo aquí, este valor es único y personal, ya que dependerá de la longitud de tu nivel.<br/><br/>

        Para saber que valor te corresponde a ti deberás de terminar tu nivel y fijarte en el valor que tiene la variable jugador cuando llegues a la meta. Tendrás que coger ese valor e introducirlo en ese if. Si entra por él, enviaremos 'win'.<br/><br/>

        Si se recibe win le daremos a la variable stop el valor de 1 y lo mostramos. Por lo contrario si recibe start, es decir cuando iniciamos el juego, lo volvemos a ocultar.<br/><br/>

        Vamos con el último objeto que nos queda que es un botón que nos saldrá por pantalla cuando lleguemos al final del nivel y el cual podemos pulsar para volver a jugar. El disfraz, al igual que el resto de imágenes, os lo dejo en un link al final de la página.
    </p>
    <img src="./img/tutorial/restart.PNG" width="700"><br/><br/>
    <p>
    Cuando recibamos 'win' mostraremos el botón y en la posición (0,0) y creamos un bucle que compruebe todo el rato si tenemos el ratón encima de él y estamos haciendo clic. De ser así enviaremos 'start'. Y por otra parte cuando recibamos 'start', lo ocultamos.
    </p>
    <a href="./disfraces.zip"><button class="btn btn-primary mx-auto">Descargar disfraces</button></a><br/><br/>
    <iframe src="https://scratch.mit.edu/projects/608429159/embed" allowtransparency="true" width="485" height="402" frameborder="0" scrolling="no" allowfullscreen></iframe>
    </div>
    <br><a href="./formulario.php"><button class="btn btn-primary mx-auto">Ir al examen</button></a>
    </div>
    <?php piePagina(); scriptRuta(); ?>
</body>
</html>