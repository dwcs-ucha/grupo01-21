<!DOCTYPE html>
<?php
    /*
    *
    *Formulario del tutorial de Scratch: "Geometry Dash"
    *@autor: Óscar Martínez López
    *@version: 1.00.00
    *
    */
    include '../clases/Tutorial.class.php';
    include '../clases/Pregunta.class.php'; //añadimos la clase Pregunta
    include '../../clases/DAO.class.php'; //añadimos la clase DAO
    include '../../menu.php'; //añadimos el menú
    $preguntas = DAO::obterPreguntas('./csv/preguntas.csv');
?><html>
<head>
    <title>Examen Geometry Dash</title>
    <link rel="stylesheet" href="./css/estilos.css">
    <script>
        var contador=0; //Contador para saber si está alguna imagen seleccionada
        var imgSeleccionada=null; //Variable para guardar el id de la imagen seleccionada y así compararla con la respuesta correcta al enviar el formulario
        function marcarImagen(b) { //Función para marcar la imagen sobre la que hacemos clic
           var imagen = document.getElementById(b.id);
           if (imagen.hasAttribute("class")) { //Comprobamos si la imagen que le pasamos tiene el atributo class
               imagen.removeAttribute("class"); //De tenerlo lo borramos para desmarcarlo
               contador--; //Y restamos uno al contador para que se pueda marcar otra imagen
           }else {
              if(contador==0){ //Si el contador es igual a 0 significa que no hay ninguna imagen seleccionada y entonces podemos marcar una
                imagen.setAttribute("class", "marco"); //Le añadimos el atributo class con el valor marco, una clase creada en el archivo estilos.css
                imgSeleccionada=imagen.id; //Guardamos su id en la variable
                contador++; //E incrementamos el contador para que no se puedan marcar más
              }
           }
        }

        function allowDrop(ev) {
        ev.preventDefault();
        }

        var respuesta=null; //Variable para controlar si hay una imagen en la casilla de respuesta y así no permitir poner más

        function drag(ev) {
        ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) { //Función para los rectángulos que tienen los bloques con las opciones de respuesta
        ev.preventDefault();
        var data = ev.dataTransfer.getData("text");
        if(data==respuesta){ //Comprobamos si el id de la imagen que acabamos de dropear es igual al de la respuesta para así resetear la variable respuesta y que se pueda colocar un nuevo bloque en ella
            respuesta=null;
        }
        ev.target.appendChild(document.getElementById(data)); //Colocamos el bloque en el rectángulo
        document.getElementById("resultados").innerHTML="data -> " + data;
        document.getElementById("resultados").innerHTML+="<br/>respuesta -> " + respuesta;
        document.getElementById("resultados").innerHTML+="<br/>cont -> " + cont;
        }

        function dropRespuesta(ev) { //Función para el div invisible que hay encima del bloque negro '???' en la imagen
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
        if(respuesta==null){ //Comprobamos si el bloque está vacío
            respuesta=data; //De ser así, igualamos la variable respuesta al nombre del bloque introducido
            ev.target.appendChild(document.getElementById(data)); //Y lo colocamos en el div invisible
            document.getElementById("resultados").innerHTML="dataRespuesta -> " + data;
            document.getElementById("resultados").innerHTML+="<br/>respuesta -> " + respuesta;
            document.getElementById("resultados").innerHTML+="<br/>cont -> " + cont;
        }
        }

        function enviar(){ //Función a la que se llama cuando pulsamos el botón de enviar el formulario
            document.getElementById("imgSel").value=imgSeleccionada; //Para meter el id de la imagen seleccionada en el valor de un objeto hidden
            document.getElementById("resp").value=respuesta; //Para hacer lo mismo con el valor del bloque que hay que arrastrar en la pregunta 7
            document.formulario.submit(); //Función para enviar el formulario desde JavaScript
        }
    </script>
    <?php
    linksRuta(); //añadimos los links de estilo de Bootstrap 
    $error = array();
    $puntuacion = 0;
    $mensaxe = "";
        if(isset($_POST['submit'])) { //si el usuario envía el formulario
            /** Validación Ej. 1 **/
                if(isset($_POST['disfraces'])) { //si tiene cubierta la primera pregunta
                    if($_POST['disfraces']==$preguntas[0]->respuesta) { //y es igual a la respuesta del objeto en su posición
                        $puntuacion++; //aumentamos la puntuación
                    }else {
                        $error[]=$preguntas[0]->error(); //en caso contrario, enviamos el error
                    }
                }
            //Validación Ej. 2
                if(isset($_POST['obstaculos'])) {
                    if($_POST['obstaculos']==$preguntas[1]->respuesta) {
                        $puntuacion++;
                    }else {
                        $error[]=$preguntas[1]->error();
                    }
                }
            //Validación Ej. 3
                if(!empty($_POST['Win'])) {
                    $ej3 = strtolower($_POST['Win']);
                    $ej3 = trim($ej3);
                        if($ej3==$preguntas[2]->respuesta) {
                            $puntuacion++;
                        } else {
                            $error[]=$preguntas[2]->error();
                        }
                }
            //Validación Ej. 4
                if(isset($_POST['particulas'])) {
                    if($_POST['particulas']==$preguntas[3]->respuesta) {
                        $puntuacion++;
                    }else {
                        $error[]=$preguntas[3]->error();
                    }
                }
            //Validación Ej. 5
            if(isset($_POST['imgSel'])) {
                if($_POST['imgSel']==$preguntas[4]->respuesta) {
                    $puntuacion++;
                }else {
                    $error[]=$preguntas[4]->error();
                }
            }
            //Validación Ej. 6
                if(isset($_POST['variables'])) {
                    $ej5=$_POST['variables'];
                    if(in_array('indicador', $ej5)) {
                        $error[] = '6. Las respuestas correctas son: 
                        <br>jugadorX
                        <br>stop';
                    } else {
                        in_array($preguntas[5]->respuesta[0], $ej5) ? $puntuacion+=0.5 : $error[] = "5. Respuesta correcta: jugadorX";
                        in_array($preguntas[5]->respuesta[1], $ej5) ? $puntuacion+=0.5 : $error[] = "5. Respuesta correcta: stop";
                    }
                }
            //Validación Ej. 7
                if(isset($_POST['resp'])) {
                    if($_POST['resp']==$preguntas[6]->respuesta) {
                        $puntuacion++;
                    }else {
                        $error[]=$preguntas[6]->error();
                    }
                }
             
                isset($_SESSION['usuario']) ? Tutorial::añadirPuntuacion(6,$puntuacion) : "";
        }
        !isset($_SESSION['usuario']) ? $mensaxe = '<p class="text-center">Para guardar tu puntuación puedes <a href="' . $nav . 'login-registro/registro.php">registrarte</a> o <a href="' . $nav . 'login-registro/login.php">acceder</a> si ya tienes cuenta</p>' : 
        $mensaxe = '<p class="text-center">Para acceder a tu registro de puntuaciones dirígete al <a href="../../perfil.php">perfil</a></p>';
    ?>
</head>
<body>
    <?php menuRuta(); ?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="my-4 text-center text-primary">Examen del tutorial de Geometry Dash</h1>
            </div>
        </div>
    </div>
    <div class="row m-4 border border-primary shadow-lg p-4 bg-light text-center">
    <div class="col-lg-12">
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <p><?php echo $preguntas[0]->cod;?>. <?php echo $preguntas[0]->enunciado;?></p>
            <select name="disfraces">
                <option value="" <?php !isset($_POST['disfraces']) ? print 'selected="true"': ""?> disabled>Selecciona</option>
                <option value="<?php print $preguntas[0]->respuesta; ?>">Tantos como partes distintas del nivel queramos hacer</option>
                <option value="inicio">Solamente uno, el del suelo que está en bucle todo el rato</option>
                <option value="disfraz">Tres</option>
            </select>
        <p><?php echo $preguntas[1]->cod;?>. <?php echo $preguntas[1]->enunciado;?></p>
            <input type="radio" value="correcto" name="obstaculos">
            <label for="correcto">Correcto</label>
            <input type="radio" value="<?php print $preguntas[1]->respuesta; ?>" name="obstaculos">
            <label for="falso">Falso</label>
        <p><?php echo $preguntas[2]->cod;?>. <?php echo $preguntas[2]->enunciado;?></p>
            <input type="text" name="Win">
        <p><?php echo $preguntas[3]->cod;?>. <?php echo $preguntas[3]->enunciado;?></p>
            <select name="particulas">
                    <option value="" <?php !isset($_POST['particulas']) ? print 'selected="true"': ""?> disabled>Selecciona</option>
                    <option value="no1">De esta manera solo entrará por ahí cuando las dos condiciones se cumplan</option>
                    <option value="no2">No usamos un OR, es un AND</option>
                    <option value="<?php print $preguntas[3]->respuesta; ?>">Ninguna es correcta</option>
            </select><br/><br/>
        <p><?php echo $preguntas[4]->cod;?>. <?php echo $preguntas[4]->enunciado;?></p>
            <img style="padding: 10px;" id="jugador" onclick="marcarImagen(this);" src="./img/examen/jugador.png" height="400px"></img>
            <img style="padding: 10px;" id="obstaculos" onclick="marcarImagen(this);" src="./img/examen/obstaculos.png" height="400px"></img>
            <img style="padding: 10px;" id="particulas" onclick="marcarImagen(this);" src="./img/examen/particulas.png" height="400px"></img>
            <img style="padding: 10px;" id="suelo" onclick="marcarImagen(this);" src="./img/examen/suelo.png" height="400px"></img><br/>
        <p><?php echo $preguntas[5]->cod;?>. <?php echo $preguntas[5]->enunciado;?></p>
            <label><input type="checkbox" name="variables[]" value="<?php print $preguntas[5]->respuesta[0] ?>">&nbsp; jugadorX</label><br>
            <label><input type="checkbox" name="variables[]" value="indicador">&nbsp; gravedad</label><br>
            <label><input type="checkbox" name="variables[]" value="<?php print $preguntas[5]->respuesta[1] ?>">&nbsp; stop</label><br>
            <label><input type="checkbox" name="variables[]" value="indicador">&nbsp; y</label><br/>
        <p><?php echo $preguntas[6]->cod;?>. <?php echo $preguntas[6]->enunciado;?></p>
        <div class="fondo">
            <span id="posicion" ondrop="dropRespuesta(event)" ondragover="allowDrop(event)"></span>
        </div>
        <div style="display: flex; justify-content:center;">
            <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
                <img src="./img/examen/gravedad.png" draggable="true" ondragstart="drag(event)" id="gravedad" width="42px">
            </div>
            <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)">
                <img src="./img/examen/hide.png" draggable="true" ondragstart="drag(event)" id="hide" width="32px">
            </div>
            <div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)">
                <img src="./img/examen/stop.png" draggable="true" ondragstart="drag(event)" id="stop" width="99px">
            </div>
        </div>
        <input type="hidden" name="imgSel" id="imgSel" value="">
        <input type="hidden" name="resp" id="resp" value=""><br/><br/>
        <button class="btn btn-primary" type="submit" name="submit" onclick="enviar();">Enviar</button>
    </form>
    </div>
  </div>
    <?php 
        foreach ($error as $valor) echo '<p class="text-center">' . $valor . '</p>';
        isset($_POST['submit']) ? print '<h1 class="text-center">Tu puntuación es: ' . $puntuacion .'/7</h1>' : "";
        echo $mensaxe;
        piePagina();
        scriptRuta();
    ?>
</body>
</html>