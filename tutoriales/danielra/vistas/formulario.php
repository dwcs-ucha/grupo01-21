<!DOCTYPE html>
<?php
    /*
    *
    *Formulario del tutorial de Scratch: "Falling Balloons"
    *@autor: Daniel Rivas Arévalo
    *@version: 1.00.00
    *
    */
    include '../../clases/Tutorial.class.php';
    include '../../clases/Pregunta.class.php'; //añadimos la clase Pregunta
    include '../../../clases/DAO.class.php'; //añadimos la clase DAO
    include '../../../menu.php'; //añadimos el menú
    $preguntas = DAO::obterPreguntas('.././csv/preguntas.csv');
?><html>
<head>
    <title>Examen Falling Balloons</title>
    <?php
    linksRuta(); //añadimos los links de estilo de Bootstrap 
    $error = array();
    $puntuacion = 0;
    $mensaxe = "";
        if(isset($_POST['submit'])) { //si el usuario envía el formulario
            /** Validación Ej. 1 **/
                if(isset($_POST['condicional'])) { //si tiene cubierta la primera pregunta
                    if($_POST['condicional']==$preguntas[0]->respuesta) { //y es igual a la respuesta del objeto en su posición
                        $puntuacion++; //aumentamos la puntuación
                    }else {
                        $error[]=$preguntas[0]->error(); //en caso contrario, enviamos el error
                    }
                }
            /** Validación Ej. 2 **/
                if(isset($_POST['numAleatorio'])) {
                    if($_POST['numAleatorio']==$preguntas[1]->respuesta) {
                        $puntuacion++;
                    }else {
                        $error[]=$preguntas[1]->error();
                    }
                }
            /** Validación Ej. 3 **/
                if(!empty($_POST['variable'])) {
                    $ej3 = strtolower($_POST['variable']);
                    $ej3 = trim($ej3);
                        if($ej3==$preguntas[2]->respuesta) {
                            $puntuacion++;
                        } else {
                            $error[]=$preguntas[2]->error();
                        }
                }
            /** Validación Ej. 4 **/
                if(isset($_POST['puntoAleatorio'])) {
                    if($_POST['puntoAleatorio']==$preguntas[3]->respuesta) {
                        $puntuacion++;
                    }else {
                        $error[]=$preguntas[3]->error();
                    }
                }
            /** Validación Ej. 5 **/
                if(isset($_POST['eficiencia'])) {
                    $ej5=$_POST['eficiencia'];
                    if(in_array('indicador', $ej5)) {
                        $error[] = '5. Las respuestas correctas son: 
                        <br>Prescindir de las bombillas incandescentes y optar por halógenas o LED
                        <br>Tratar de que nuestros electrodomésticos cuenten con la etiqueta de eficiencia energética más elevada (A++ o A+)';
                    } else {
                        in_array($preguntas[4]->respuesta[0], $ej5) ? $puntuacion+=0.5 : $error[] = "5. Respuesta correcta: Prescindir de las bombillas incandescentes y optar por halógenas o LED";
                        in_array($preguntas[4]->respuesta[1], $ej5) ? $puntuacion+=0.5 : $error[] = "5. Respuesta correcta: Tratar de que nuestros electrodomésticos cuenten con la etiqueta de eficiencia energética más elevada (A++ o A+)";
                    }
                }
            /** Validación Ej. 6 **/
                if(isset($_POST['seccion'])) {
                    if($_POST['seccion']==$preguntas[5]->respuesta) {
                        $puntuacion++;
                    }else {
                        $error[]=$preguntas[5]->error();
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
                <h1 class="my-4 text-center text-primary">Examen del tutorial de Falling Ballons</h1>
            </div>
        </div>
    </div>
    <div class="row m-4 border border-primary shadow-lg p-4 bg-light text-center">
    <div class="col-lg-12">
    <form action="./formulario.php" method="post">
        <p><?php echo $preguntas[0]->cod;?>. <?php echo $preguntas[0]->enunciado;?></p>
            <select name="condicional">
                <option value="" <?php !isset($_POST['condicional']) ? print 'selected="true"': ""?> disabled>Selecciona</option>
                <option value="<?php print $preguntas[0]->respuesta; ?>">Si (condición) entonces (acción)</option>
                <option value="inicio">Al hacer click en la bandera verde...</option>
                <option value="disfraz">Siguiente disfraz</option>
            </select>
        <p><?php echo $preguntas[1]->cod;?>. <?php echo $preguntas[1]->enunciado;?></p>
            <input type="radio" value="<?php print $preguntas[1]->respuesta; ?>" name="numAleatorio">
            <label for="correcto">Correcto</label>
            <input type="radio" value="falso" name="numAleatorio">
            <label for="falso">Falso</label>
        <p><?php echo $preguntas[2]->cod;?>. <?php echo $preguntas[2]->enunciado;?></p>
            <input type="text" name="variable">
        <p><?php echo $preguntas[3]->cod;?>. <?php echo $preguntas[3]->enunciado;?></p>
            <select name="puntoAleatorio">
                    <option value="" <?php !isset($_POST['puntoAleatorio']) ? print 'selected="true"': ""?> disabled>Selecciona</option>
                    <option value="x">ir a x: [número aleatorio entre -240 y 240] </option>
                    <option value="y">ir a y: [número aleatorio entre -180 y 180]</option>
                    <option value="<?php print $preguntas[3]->respuesta; ?>">Ambas son correctas</option>
            </select>
        <p><?php echo $preguntas[4]->cod;?>. Selecciona las opciones correctas. <br>
        <?php echo $preguntas[4]->enunciado;?></p>
            <label><input type="checkbox" name="eficiencia[]" value="<?php print $preguntas[4]->respuesta[0] ?>">Prescindir de las bombillas incandescentes y optar por halógenas o LED</label><br>
            <label><input type="checkbox" name="eficiencia[]" value="<?php print $preguntas[4]->respuesta[1] ?>">Tratar de que nuestros electrodomésticos cuenten con la etiqueta de eficiencia energética más elevada (A++ o A+)</label><br>
            <label><input type="checkbox" name="eficiencia[]" value="indicador">No apagar el indicador de apagado de la televisión</label><br>
        <p><?php echo $preguntas[5]->cod;?>. Selecciona la opción correcta. <br>
        <?php echo $preguntas[5]->enunciado;?></p>
            <input type="radio" value="<?php print $preguntas[5]->respuesta; ?>" name="seccion">
            <label for="<?php print $preguntas[5]->respuesta; ?>"><img src="../img/apariencia.JPG"></label>
            <input type="radio" value="control" name="seccion">
            <label for="control"><img src="../img/control.JPG"></label>
            <input type="radio" value="movimiento" name="seccion">
            <label for="movimiento"><img src="../img/movimiento.JPG"></label>
             <br>
        <button class="btn btn-primary" type="submit" name="submit">Enviar</button>
    </form>
    </div>
  </div>
    <?php 
        foreach ($error as $valor) echo '<p class="text-center">' . $valor . '</p>';
        isset($_POST['submit']) ? print '<h1 class="text-center">Tu puntuación es: ' . $puntuacion .'/6</h1>' : "";
        echo $mensaxe;
        piePagina();
        scriptRuta();
    ?>
</body>
</html>