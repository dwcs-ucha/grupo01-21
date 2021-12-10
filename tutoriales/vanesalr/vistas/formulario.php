<?php
    /*
    *
    *Formulario del tutorial de Scratch: "Solar Jump"
    *@autor: Vanesa Lourido Rivas
    *@version: 1.00.00
    *
    */
    include '../../clases/Tutorial.class.php';
    include '.././clases/Pregunta.class.php'; //añadimos la clase Pregunta
    include '../../../clases/DAO.class.php'; //añadimos la clase DAO
    include '../../../menu.php'; //añadimos el menú
    $preguntas = DAO::obterPreguntas('.././csv/preguntas.csv');
?><html>
<head>
    <title>Examen Solar Jump</title>
    <?php
    linksRuta(); //añadimos los links de estilo de Bootstrap 
    $error = array();
    $puntuacion = 0;
    $mensaxe="";
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
                if(isset($_POST['dialogo'])) {
                    if($_POST['dialogo']==$preguntas[1]->respuesta) {
                        $puntuacion++;
                    }else {
                        $error[]=$preguntas[1]->error();
                    }
                }
                /** Validación Ej. 3 **/
                if(isset($_POST['bloque'])) {
                    if($_POST['bloque']==$preguntas[2]->respuesta) {
                        $puntuacion++;
                    }else {
                        $error[]=$preguntas[2]->error();
                    }
                }
            /** Validación Ej. 4 **/
                if(!empty($_POST['variable'])) {
                    $ej3 = strtolower($_POST['variable']);
                    $ej3 = trim($ej3);
                        if($ej3==$preguntas[3]->respuesta) {
                            $puntuacion++;
                        } else {
                            $error[]=$preguntas[3]->error();
                        }
                }
            
            /** Validación Ej. 5 **/
                if(isset($_POST['energia'])) {
                    $ej5=$_POST['energia'];
                    if(in_array('energiaNo', $ej5)) {
                        $error[] = '5. Las respuestas correctas son: 
                        <br>La energía solar
                        <br>La energía eólica';
                    } else {
                        in_array($preguntas[4]->respuesta[0], $ej5) ? $puntuacion+=0.5 : $error[] = "5. Respuesta correcta: La energía solar";
                        in_array($preguntas[4]->respuesta[1], $ej5) ? $puntuacion+=0.5 : $error[] = "5. Respuesta correcta: La energía eólica";
                    }
                }
                isset($_SESSION['usuario']) ? Tutorial::añadirPuntuacion(3,$puntuacion) : "";
        }
        !isset($_SESSION['usuario']) ? $mensaxe = '<p class="text-center">Para guardar tu puntuación puedes <a href="' . $nav . 'login-registro/registro.php">registrarte</a> o <a href="' . $nav . 'login-registro/login.php">acceder</a> si ya tienes cuenta</p>' : "";
    ?>
</head>
<body>
    <?php menuRuta(); ?>
    
    <div class="container p-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="my-4 text-center text-primary">Examen del tutorial de Solar Jump</h1>
            </div>
        </div>
    </div>
    <div class="row m-4 border border-primary shadow-lg p-4 bg-light text-center">
    <div class="col-lg-12">
    
    <form action="./formulario.php" method="post">
        <p><?php echo $preguntas[0]->cod;?>. <?php echo $preguntas[0]->enunciado;?></p>
            <select name="condicional">
                <option value="" <?php !isset($_POST['condicional']) ? print 'selected="true"': ""?> disabled>Selecciona</option>
                <option value="<?php print $preguntas[0]->respuesta; ?>">Por siempre</option>
                <option value="inicio">Si (condición) entonces (acción)</option>
                <option value="disfraz">Repetir hasta que</option>
            </select>
        <p><?php echo $preguntas[1]->cod;?>. <?php echo $preguntas[1]->enunciado;?></p>
            <input type="radio" value="<?php print $preguntas[1]->respuesta; ?>" name="dialogo">
            <label for="correcto">Apariencia</label>
            <input type="radio" value="falso" name="dialogo">
            <label for="falso">Eventos</label>
        <p><?php echo $preguntas[2]->cod;?>. <?php echo $preguntas[2]->enunciado;?></p>
        <select name="bloque">
                    <option value="" <?php !isset($_POST['bloque']) ? print 'selected="true"': ""?> disabled>Selecciona</option>
                    <option value="x">Bloque dialogo inicial </option>
                    <option value="y">Bloque colocarse </option>
                    <option value="<?php print $preguntas[2]->respuesta; ?>">Ambas son correctas</option>
            </select>
        <p><?php echo $preguntas[3]->cod;?>. <?php echo $preguntas[3]->enunciado;?></p>
        <input type="text" name="variable">
            
        <p><?php echo $preguntas[4]->cod;?>. Selecciona las opciones correctas. <br>
        <?php echo $preguntas[4]->enunciado;?></p>
            <label><input type="checkbox" name="energia[]" value="<?php print $preguntas[4]->respuesta[0] ?>">La energía solar</label><br>
            <label><input type="checkbox" name="energia[]" value="<?php print $preguntas[4]->respuesta[1] ?>">La energía eólica</label><br>
            <label><input type="checkbox" name="energia[]" value="energiaNo">La energía nuclear</label><br>
        <button class="btn btn-primary" type="submit" name="submit">Enviar</button>
    </form>
    </div>
    </div>
    <?php 
        foreach ($error as $valor) echo '<p style="color:red">' . $valor . '</p>';
        isset($_POST['submit']) ? print '<p>Tu puntuación es: ' . $puntuacion .'/5</p>' : "";
        echo $mensaxe;
        piePagina();
        scriptRuta();
    ?>
</body>
</html>
