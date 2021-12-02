<!DOCTYPE html>
<?php
    /*
    *
    *Tutorial de Scratch: Falling Balloons
    *@autor: Daniel Rivas Arévalo
    *@version: 1.00.00
    *
    */
    include '../../../menu.php';
?>
<html>
<head>
    <title>Tutorial Falling Balloons</title>
    <?php linksRuta(); ?>
</head>
<body>
    <?php menuRuta(); ?>
    <h1>Tutorial de Scratch: Falling Balloons</h1>
    <h2>Descripción</h2>
    <p>
        En este tutorial aprenderemos a hacer en Scratch un juego similar al de "Falling Balloons" con temática de eficiencia energética.
        Por lo tanto, buscamos que unos elementos reboten en los bordes de la pantalla con la intención de que el usuario los dispare con el ratón para acumular puntos en un tiempo determinado. <br>
    </p>
    <h2>Diseño</h2>
    <p>
        Empezaremos por la parte visual del proyecto, la cual definiremos en sus términos más básicos. <br>
        Para comenzar, diseñamos el puntero del juego dándole click a la esquina inferior derecha, donde aparece el icono de Añadir objeto > Diseñar:
    </p>
    <img src=".././img/puntero.jpg" width="485">
    <p>
        Añadimos un fondo al juego a nuestro gusto, en nuestro caso, una foto del cielo:
    </p>
    <img src=".././img/cielo.jpg" width="485">
    <p>
        A continuación, añadimos aquellos objetos que queremos que se comporten como los globos del juego tradicional. En nuestro caso, como queremos que la temática responda al tema de eficiencia energética, escogimos un radiador eléctrico, una bombilla incandescente y el certificado “G”, aquel que consume mayor cantidad de recursos eléctricos en los electrodomésticos. Además, añadimos un dibujo que represente el comportamiento de cada uno de estos objetos cuando sean disparados por el usuario. En nuestro caso, el dibujo que representa una explosión. 
    </p>
    <img src=".././img/elementos.jpg" width="485">
    <h2>Lógica del programa</h2>
    <p>
        Queremos que, cuando el usuario pulse la bandera verde, el juego empiece a correr. En concreto, que los elementos se vayan deslizando por la pantalla con el objetivo que el usuario llegue a dispararles. En caso de que cada uno de ellos lleguen a la frontera de la pantalla, queremos que este rebote y que lo devuelva a la pantalla.
        <br>
        Por lo tanto, para empezar, cumpliremos la lógica necesaria para que el cursor siga el ratón del usuario. Para eso, queremos decirle que mientras el programa esté en ejecución, que siga al puntero de la siguiente manera:
    </p>
    <img src=".././img/logicaPuntero.jpg" width="485">
    <p>
        Seguimos con los elementos y sus comportamientos, por lo que nos concentraremos en implementar uno de ellos para, después, pasar las propiedades a los compañeros. En nuestro caso comenzaremos con la bombilla, la cual, queremos que corra por la pantalla y rebote al tocar el borde. Lo hacemos de la siguiente forma:
    </p>
    <img src=".././img/logicaMovimiento.jpg" width="485">
    <p>
        Al hacer click en la bandera, queremos que siempre se mueva una cantidad determinada de pasos. En nuestro caso, definimos 3.5 para que vaya a la velocidad deseada. A continuación, añadimos una condicional: en el caso de que esté tocando el borde, queremos que gire 15 grados y que rebote (esta última funcionalidad ya viene definida en forma de bloque).
        <br>
        Una vez nuestro elemento esté corriendo por la pantalla sin desaparecer de la misma, queremos que responda de cierta manera cuando el usuario presione el ratón al estar apuntándolo con el cursor. Si queremos que un objeto cambie su gráfico, tenemos que añadirle otro “disfraz” para decirle a Scratch que queremos un cambio cuando ocurra la acción asignada. Por lo tanto, queremos que el gráfico de explosión, pase a ser un disfraz de cada uno de nuestros objetos, pudiendo implementarlo en la pestaña que aparece a la derecha de código (copiando y pegando la original).
        <br>
        También queremos que vaya contando puntos cada vez que el usuario dispare uno de estos productos, por lo que creamos la variable “puntos” que irá sumando la puntuación del usuario a un contador que se presentará en la pantalla. Lo expresamos de la siguiente manera:
    </p>
    <img src=".././img/logicaDisparo.jpg" width="485">
    <p>
        Si hacemos click en la bandera verde y si, en cualquier momento, presionamos el ratón cuando el cursor esté tocando el objeto sobre el que estamos a trabajar, queremos que sume dos puntos de la puntuación general, que cambie su “disfraz” a explosión y que espere 0.2 segundos antes de cambiar la bombilla por otra nueva que aparezca en pantalla. Esto último lo hacemos a través de un envío del mensaje “cambioBombilla”, que tendrá un valor distinto dependiendo del objeto: lo que en programación llamamos función.
        <br>
        Esta función hay que implementarla para que haga una acción, por lo que le decimos que, al recibir “cambioBombilla”, que cambie el disfraz a “bombilla” y que aparezca en cualquier espacio del eje X (de -240 a 240) e Y (de -180 a 180) de la pantalla de ejecución de Scratch. Este código también lo queremos implementar en el caso de pulsar la bandera verde, pues buscamos que los elementos aparezcan de esta manera al iniciar el juego.
    </p>
    <img src=".././img/logicaClon.jpg" width="485">
    <p>
        Ahora, si le damos a la bandera verde, veremos que este objeto se ejecuta de la manera que queremos, mientras los otros permanecen estáticos. Como queremos que estos se comporten de manera similar, podemos reutilizar este código duplicando el objeto y cambiando aquellos elementos que los diferencian: nombre, disfraz principal, puntuación al ser disparado, los pasos que da por pantalla y la función que lo renueva. El código del radiador se vería de la siguiente manera:
    </p>
    <img src=".././img/logicaRadiador.jpg" width="485">
    <p>
        El código del certificado: 
    </p>
    <img src=".././img/logicaCertificado.jpg" width="485">
    <p>
        Por último, queremos que el fondo presente, además de la puntuación general, un cronómetro con el tiempo utilizado para conseguir esos puntos. Para eso, creamos otra variable llamada “tiempo”, que se conecte con un cronómetro que esté en funcionamiento todo el tiempo que el programa esté en funcionamiento. Lo expresamos de la siguiente manera:
    </p>
    <img src=".././img/logicaCronometro.jpg" width="485">
    <p>
        ¿Quieres probarlo? Puedes jugar en la ventana que habilitamos a continuación. <br>
        Esperamos que te haya servido de ayuda este tutorial, recuerda que puedes ponerte a prueba con nuestro examen.
        ¡Hasta otra!
    </p>
    <iframe src="https://scratch.mit.edu/projects/605887755/embed" allowtransparency="true" width="485" height="402" frameborder="0" scrolling="no" allowfullscreen></iframe>
    <br><a href="./formulario.php"><button>Ir al examen</button></a>
    <?php piePagina(); scriptRuta(); ?>
</body>
</html>