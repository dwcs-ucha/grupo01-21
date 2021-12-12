<!DOCTYPE html>
<?php
    /*
    *
    *Formulario del tutorial de Scratch: Snake
    *@autor: Abril Yáñez Darriba
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
    <title>Examen Labirinthya</title>
    <?php
    linksRuta(); //añadimos los links de Bootstrap 
    $error = array();
    $puntuacion = 0;
    $mensaxe = "";
        if(isset($_POST['submit'])) { //si el usuario envía el formulario
            /* Validación Ejercicio 1 */
                if(isset($_POST['extension'])) { //si tiene cubierta la primera pregunta
                    if($_POST['extension']==$preguntas[0]->respuesta) { //y es igual a la respuesta del objeto en su posición
                        $puntuacion++; //aumentamos la puntuación
                    }else {
                        $error[]=$preguntas[0]->error(); //en caso contrario, enviamos el error
                    }
                }
            /* Validación Ejercicio 2 */
                if(isset($_POST['variables'])) {
                    if($_POST['variables']==$preguntas[1]->respuesta) {
                        $puntuacion++;
                    }else {
                        $error[]=$preguntas[1]->error();
                    }
                }
            /* Validación Ejercicio 3 */
                if(isset($_POST['listas'])) {
                    $ej3 = strtolower($_POST['listas']);
                    $ej3 = trim($ej3);
                        if($ej3==$preguntas[2]->respuesta) {
                            $puntuacion++;
                        } else {
                            $error[]=$preguntas[2]->error();
                        }
                }
            /* Validación Ejercicio 4 */
                if(isset($_POST['intervalo'])) {
                    if($_POST['intervalo']==$preguntas[3]->respuesta) {
                        $puntuacion++;
                    }else {
                        $error[]=$preguntas[3]->error();
                    }
                }
            /* Validación Ejercicio 5 */
                if(isset($_POST['eficiencia'])) {
                    $ej5=$_POST['eficiencia'];
                    if(in_array('luces', $ej5)) {
                        $error[] = '5. Las respuestas correctas son: 
                        <br>Utilizar bombillas económicas
                        <br>Elegir electrodomésticos eficientes';
                    } else {
                        in_array($preguntas[4]->respuesta[0], $ej5) ? $puntuacion+=0.5 : $error[] = "5. Respuesta correcta: Utilizar bombillas económicas";
                        in_array($preguntas[4]->respuesta[1], $ej5) ? $puntuacion+=0.5 : $error[] = "5. Respuesta correcta: Elegir electrodomésticos eficientes";
                    }
                }
	
 	isset($_SESSION['usuario']) ? Tutorial::añadirPuntuacion(5,$puntuacion) : "";

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
                <h1 class="my-4 text-center text-primary">Examen del tutorial de Labirinthya</h1>
            </div>
        </div>
</div>
	<div class="row m-4 border border-primary shadow-lg p-4 bg-light text-center">
    	<div class="col-lg-12">
    <form action="./formulario.php" method="post">
        <p><?php echo $preguntas[0]->cod;?>. <?php echo $preguntas[0]->enunciado;?></p>
            <select name="extension">
                <option value="" <?php !isset($_POST['extension']) ? print 'selected="true"': ""?> disabled>Selecciona</option>
                <option value="<?php print $preguntas[0]->respuesta; ?>">D-Monkey</option>
                <option value="musica">Sol</option>
                <option value="traductor">Soy Yo</option>
            </select>
        <p><?php echo $preguntas[1]->cod;?>. <?php echo $preguntas[1]->enunciado;?></p>
            <input type="radio" value="<?php print $preguntas[1]->respuesta; ?>" name="variables">
            <label for="correcto">Correcto</label>
            <input type="radio" value="falso" name="variables">
            <label for="falso">Falso</label>
        <p><?php echo $preguntas[2]->cod;?>. <?php echo $preguntas[2]->enunciado;?></p>
            <input type="text" name="listas">
        <p><?php echo $preguntas[3]->cod;?>. <?php echo $preguntas[3]->enunciado;?></p>
            <select name="intervalo">
                    <option value="" <?php !isset($_POST['intervalo']) ? print 'selected="true"': ""?> disabled>Selecciona</option>
                    <option value="borde">Si toca el borde</option>
                    <option value="banderaVerde">Al hacer click en la bandera verde...</option>
                    <option value="<?php print $preguntas[3]->respuesta; ?>">Espera x segundos</option>
            </select>
        <p><?php echo $preguntas[4]->cod;?>. Selecciona las opciones correctas. <br>
        <?php echo $preguntas[4]->enunciado;?></p>
            <label><input type="checkbox" name="eficiencia[]" value="<?php print $preguntas[4]->respuesta[0] ?>">Vivir en el monte</label><br>
            <label><input type="checkbox" name="eficiencia[]" value="<?php print $preguntas[4]->respuesta[1] ?>">Apagar las luces al salir de una habitacion</label><br>
            <label><input type="checkbox" name="eficiencia[]" value="luces">No hacer nada</label><br>
        <button class="btn btn-primary" type="submit" name="submit">Enviar</button>
    </form>
    </div>
</div>
    <?php 
        foreach ($error as $valor) echo '<p  class="text-center" style="color:red">' . $valor . '</p>';
        isset($_POST['submit']) ? print '<p class="text-center">Tu puntuación es: ' . $puntuacion .'/5</p>' : "";
        echo $mensaxe;
        piePagina();
        scriptRuta();
    ?>
</body>
</html>