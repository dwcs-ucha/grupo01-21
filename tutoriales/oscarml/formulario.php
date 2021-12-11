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
    include './clases/Pregunta.class.php'; //añadimos la clase Pregunta
    include '../../clases/DAO.class.php'; //añadimos la clase DAO
    include '../../menu.php'; //añadimos el menú
    $preguntas = DAO::obterPreguntas('./csv/preguntas.csv');
?><html>
<head>
    <title>Examen Geometry Dash</title>
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
            /** Validación Ej. 2 **/
                if(isset($_POST['obstaculos'])) {
                    if($_POST['obstaculos']==$preguntas[1]->respuesta) {
                        $puntuacion++;
                    }else {
                        $error[]=$preguntas[1]->error();
                    }
                }
            /** Validación Ej. 3 **/
                if(!empty($_POST['Win'])) {
                    $ej3 = strtolower($_POST['Win']);
                    $ej3 = trim($ej3);
                        if($ej3==$preguntas[2]->respuesta) {
                            $puntuacion++;
                        } else {
                            $error[]=$preguntas[2]->error();
                        }
                }
            /** Validación Ej. 4 **/
                if(isset($_POST['particulas'])) {
                    if($_POST['particulas']==$preguntas[3]->respuesta) {
                        $puntuacion++;
                    }else {
                        $error[]=$preguntas[3]->error();
                    }
                }
            /** Validación Ej. 5 **/
                if(isset($_POST['variables'])) {
                    $ej5=$_POST['variables'];
                    if(in_array('indicador', $ej5)) {
                        $error[] = '5. Las respuestas correctas son: 
                        <br>jugadorX
                        <br>stop';
                    } else {
                        in_array($preguntas[4]->respuesta[0], $ej5) ? $puntuacion+=0.5 : $error[] = "5. Respuesta correcta: Prescindir de las bombillas incandescentes y optar por halógenas o LED";
                        in_array($preguntas[4]->respuesta[1], $ej5) ? $puntuacion+=0.5 : $error[] = "5. Respuesta correcta: Tratar de que nuestros electrodomésticos cuenten con la etiqueta de eficiencia energética más elevada (A++ o A+)";
                    }
                }
             
                isset($_SESSION['usuario']) ? Tutorial::añadirPuntuacion(1,$puntuacion) : "";
        }
        !isset($_SESSION['usuario']) ? $mensaxe = '<p class="text-center">Para guardar tu puntuación puedes <a href="' . $nav . 'login-registro/registro.php">registrarte</a> o <a href="' . $nav . 'login-registro/login.php">acceder</a> si ya tienes cuenta</p>' : 
        $mensaxe = '<p class="text-center">Para acceder a tu registro de puntuaciones dirígete al <a href="../../../perfil.php">perfil</a></p>';
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
    <form action="./formulario.php" method="post">
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
            </select>
        <p><?php echo $preguntas[4]->cod;?>. Selecciona las opciones correctas. <br>
        <?php echo $preguntas[4]->enunciado;?></p>
            <label><input type="checkbox" name="variables[]" value="<?php print $preguntas[4]->respuesta[0] ?>">&nbsp; jugadorX</label><br>
            <label><input type="checkbox" name="variables[]" value="indicador">&nbsp; gravedad</label><br>
            <label><input type="checkbox" name="variables[]" value="<?php print $preguntas[4]->respuesta[1] ?>">&nbsp; stop</label><br>
            <label><input type="checkbox" name="variables[]" value="indicador">&nbsp; y</label><br>
        <button class="btn btn-primary" type="submit" name="submit">Enviar</button>
    </form>
    </div>
  </div>
    <?php 
        foreach ($error as $valor) echo '<p class="text-center">' . $valor . '</p>';
        isset($_POST['submit']) ? print '<h1 class="text-center">Tu puntuación es: ' . $puntuacion .'/5</h1>' : "";
        echo $mensaxe;
        piePagina();
        scriptRuta();
    ?>
</body>
</html>