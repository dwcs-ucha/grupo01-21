<?php
    include("../../menu.php");
    include("../../clases/DAO.class.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>SPACE INVADERS</title>
        <?php linksRuta(); ?>
    </head>
    <body>
    <?php menuRuta(); ?>
        <div>
        <div class="container p-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="my-4 text-center text-primary">Tutorial de Space Invaders</h1>
            </div>
        </div>
    </div>
    <div class="row m-4 border border-primary shadow-lg p-4 bg-light text-center">
    <div class="col-lg-12">
        <h2>Descripción</h2>
        <p>Bienvenidos al tutorial de Space Invaders, donde crearemos esta versión del juego:</p>
       <center><iframe src="https://scratch.mit.edu/projects/607852941/embed" allowtransparency="true" width="485" height="402" frameborder="0" scrolling="no" allowfullscreen></iframe></center>
    </div>
     <div>
       <h2>Diseño y lógica</h2>
     <p>
        
         1.1-Comenzaremos por crear los fondos de nuestro juego, necesitaremos ir a la parte inferior derecha de nuestra pantalla a la pestaña Escenarios.
         Pinchando en elegir un fondo tendremos varias opciones, pintar nuestro propio fondo o descargar algún archivo,
         os dejare los archivos utilizados en un adjunto en la cabecera de la página. En nuestro caso necesitaremos tres fondos,
         uno para el juego en si, otro para la pantalla de cuando ganamos y otra para cuando perdemos. El texto del fondo lo podremos cambiar a lo que queramos,
         yo he optado por poner ¡ENHORABUENA HAS GANADO! para cuando se gana y HAS PERDIDO para cuando no se haya superado el juego. 
         Para el juego en si con un fondo negro nos bastará. 
        
     </p>
      <span class="imagenes" ><img src="capturas/fondos.JPG" width="200px" /><img src="capturas/fondos2.JPG" width="200px"/><img src="capturas/ganar.JPG" width="200px"/><img src="capturas/perder.JPG" width="200px"/></span>
     <p>1.2-Ahora nos dirigiremos a la pestaña de código en la parte superior izquierda. Aqui creamos un evento, que sería cuando le damos a la bandera verde que envie Comienza el juego,
         aqui se cambiara el fondo al fondo JUEGO y inicializaremos una variable puntos a 0 para cuando comencemos este. </p>
         <span class="imagenes"><img src="capturas/fondoscodigo.JPG" /><img src="capturas/fondocodigo1.JPG" /></span>
         <p>1.3-A continuación al recibir los eventos de Game Over cuando perdemos o winner nos haga en el caso de ganar,
             cambiar el fondo a WINNER hacer un sonido que hemos implementado en la pestaña sonidos y que se detenga todo.
             En el caso de perder recibiremos Game Over cambiaremos el fondo a GAMEOVER utilizaremos otro sonido para cuando eprdemos y detendremos todo el juego.
         </p>
         <span class="imagenes"><img src="capturas/fondoscodigo2.JPG"/><img src="capturas/fondoscodigo3.JPG"/></span>
         <h3>PASO 2 OBJETO NAVE:</h3>
         <p>2.1-En este paso crearemos el objeto Nave, que será desde donde se disparen las balas en el juego. Para esto iremos a la ventana de objetos, zona inferior derecha donde le pondremos las coordenadas, en mi caso,
             quiero que empiece en el centro entonces en el eje X le doy el valor 0 y en el Y le doy un valor para que se encuentra en la parte inferior pero no tocando el borde en mi caso -150.
             También le podremos dar el tamaño que estimemos oportuno.En la figura.9 podremos descargar el disfraz de nuestra nave desde nuestro pc.
         </p>
         <span class="imagenes"><img src="capturas/crearnave.JPG"/><img src="capturas/creanave1.JPG"/></span>
         <p>2.2-Ahora iremos a la pestaña codigo para implementar lo que hará nuestro objeto nave.Zona superior izquierda como siempre.
             Lo pimrero que haremos es que al comenzar el juego daremos a posición el valor 0 y enviaremos nuestra nave a la posicion deseada,
             en mi caso en el eje X 0 y en el eje Y -150. Y mostramos el objeto. 
         </p>
         <span class="imagenes"><img src="capturas/crearnave2.JPG"/></span>
         <p>2.3-Ahora programaremos el movimiento de nuestra nave, con la utilizacion de un bucle que se ejecute siempre. En este caso haremos que si presionamos
             la flecha izquierda le sumaremos a la posicion en el eje X -10 y si pulsamos la flecha derecha le sumaremos a la posicion en el eje X 10.
         </p>
        <span class="imagenes"><img src="capturas/crearnave3.JPG"/></span> 
         <p>2.4-Por ultimo, en lo que a la programación de nuestro objeto nave se refiere, le implementaremos que cuando comience el juego y presionemos la barra espaciadora,
             enviaremos la acción disparar que crea un clon bala, con un sonido especifico, le pondremos un tiempo muy bajo de espera para que no sucedan bugs de solapamiento..etc.
         </p>
        <span class="imagenes"><img src="capturas/crearnave4.JPG"/></span> 
         <h3>PASO 3 OBJETO BALA:</h3>
         <p>3.1-En primer lugar crearemos un objeto bala, de la misma forma que creamos el objeto nave, o dibujando o descargando la foto del archivo adjunto.
             Lo que queremos también es que cuando choque la bala con un marciano esta cambie de aspecto, para ello creamos un disfraz en este caso llamado explosión para asemejar una explosión real.
         </p>
         <span class="imagenes"><img src="capturas/crearbala1.JPG"/><img src="capturas/crearbala2.JPG"/></span>
         <p>3.2-En primer lugar lo que queremos es que al empezar el juego la bala no se muestre, y que vaya a la posicion de inicio de la nave.</p>
        <span class="imagenes"><img src="capturas/crearbala1.JPG"/></span> 
         <p>3.3-Ahora queremos que al recibir disparar, que si recordamos era al pulsar la barra espaciadora, ponemos el disfraz de bala, y que esta vaya a la posicion actual de la nave en ese momento.
            Y a continuación se creer un clon pero escondido de la bala pero que no se muestre. Para que se muestre, lo que haremos es que al comenzar como clon,
            se muestre y que siempre vaya aumentando la posicion en el eje Y de 10 en 10.
         </p>
         <span class="imagenes"><img src="capturas/codigobala1.JPG"/><img src="capturas/codigobala2.JPG"/><img src="capturas/codigobala3.JPG"/></span>
         <p>3.4-Para implementar el comportamiento de la bala,lo que queremos es utilizar un bucle que se repita siempre, que si la bala toca el borde superior se elimine, lo mismo ocurrira si toca el marciano.
            Aquí a mayores cambiaremos el disfrz de la bala por el disfraz de explosion creado anteriormente, le ponemos un tiempo de espera muy bajo y eliminariamos la bala. </p>
           <span class="imagenes"><img src="capturas/codigobala4.JPG"/></span> 
            <h3>PASO 4 OBJETO MARCIANO:</h3>
            <p>4.1-Ahora crearemos un objeto marciano de la misma forma que los anteriores. En este caso pondremos 5 disfraces diferentes,
                para tener 5 marcianos diferentes y hacer el juego algo más dinámico. En este caso los llamaremos marciano1, marciano2..etc para que sea despues más facil mostrarlos.
            </p>
            <span class="imagenmarcianos"><img src="capturas/marcianosdisfraces.JPG"/></span>
            <p>4.1- Lo primero que queremos hacer en cuanto al código d los marcianos se refiere, es hacer una función que cree un marciano con un atributo disfraz que irá cambiando,
                y con su posición que también cambiará, lo esconderemos y le cambiaremos el disfraz dependiendo de la posicion que crearemos en el siguiente bloque de codigo, haremos un bucle que se repira,
                con las filas columnas que queramos que esten en el juego, que se creen clones y que se mueva en el eje X tanto como queramos separar las columnas.
               <span class="imagenes"><img src="capturas/codigomarciano2.JPG"/></span> 
            </p>
            <p>4.2- A los marcianos lo que les queremos implementar en primer lugar es que los cree, con los parametros disfraz y posicion creados anteriormente,
                 y que cada tipo de marciano se encuentre en una fila diferente ahí jugamos con sus posiciones en el eje Y yo por ejemplo he puesto las siguientes.</p>
                 <span class="imagenes"><img src="capturas/codigomarciano1.JPG"/></span>

            <p>4.3- Pasaremos ahora a como se comportarán los marcianos, lo que queremos es que se muestren hasta que estén tocando la bala, en este caso sumaremos a la variable puntos 1,
                le ponemos un sonido cuando desaparezcan, le metemos un pequeño retardo en eliminarlos por posibles bugs que pueda dar en mi caso 0.05 segundos.
            </p>
            <span class="imagenes"><img src="capturas/codigomarciano3.JPG"/></span>
            <p>4.4- Ahora implementaremos el movimiento de estos durante el juego, para ello crearemos una función que se repita siempre,
                dentro de esta le meteremos el movimiento que deseemos en mi caso que se muevan 5 veces sumandole a la posición del eje X 4, y que espere el tiempo,
                que definiremos en otro bloque adyacente, en mi caso le puse 0.4 es algo dificil pero se puede ganar.Despúes que se muevan 5 veces los marcianos hacia la derecha,
                que bajen en mi caso 20 pixeles hacia abajo, después que se muevan otras 5 veces hacia la izquierda lo mismo que hacia la derecha para que queden ya en el mismo lugar que antes pero hacia abajo. 
            </p>
            <span class="imagenes"><img src="capturas/codigomarciano4.JPG"/><img src="capturas/codigomarciano5.JPG"/></span>
            <p>4.5- Por útlimo implementaremos cuando se gana y cuando se pierde, en primer lugar para ganar, al dar un punto por cada marciano que eliminemos,
                al haber 45 marcianos si el contador de puntos llega a 45 que nos devuelva WINNER. Para perder existen 2 opciones, la primera cuando algún marciano toca la nave
                y la segunda cuando algún marciano toque el borde inferior.
            </p>
           <span class="imagenes"><img src="capturas/codigomarciano6.JPG"/></span> 
            <h4>Enhorabuena, ya tienes tu juego. ¡DISFRUTALO!</h4>
            <p class="centrado">Te dejamos aquí un test de conocimientos sobre el juego. Nos ayudaría que lo hicieras. Muchas gracias.</p>
            <form>
                <center>
                    <a href="./disfraces.zip" class="enlaceboton"><img src="./ZIP.png" width="50px"/>Descargar disfraces</a><br>
                    <a class="btn btn-primary" href="./test.php" class="enlacetest" >HACER TEST</a> 
            </center>
            </form>
        </div>
       </div>
       </div>
        <?php piePagina(); scriptRuta(); ?>
    </body>
</html>