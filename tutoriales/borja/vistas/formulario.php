<?php
   /*
    *Titulo: tutorial de Scratch
    *@autor: Borja Mosquera Fernández
    *@version: 1.00.00
    *fecha ultima modificacion: 04/12/2021
    */
    include '../../clases/Tutorial.class.php';
    include '../../clases/Pregunta.class.php'; //añadimos la clase Pregunta
    include '../../../clases/DAO.class.php'; //añadimos la clase DAO
    include '../../../menu.php'; //añadimos el menú
    $preguntas = DAO::obterPreguntas('.././csv/preguntas.csv');
?>
<html>
<head>
    <title>Examen Cuento energetico</title>
    <?php
    linksRuta(); //añadimos los links de estilo de Bootstrap 
    $error = array();
    $puntuacion = 0;
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
                if(isset($_POST['bucle'])) {
                    if($_POST['bucle']==$preguntas[1]->respuesta) {
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
                if(isset($_POST['ahorroAgua'])) {
                    if($_POST['ahorroAgua']==$preguntas[3]->respuesta) {
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
                        <br>Cambiar las bombillas por bombillas led
                        <br>Instalar termostatos en las habitaciones';
                    } else {
                        in_array($preguntas[4]->respuesta[0], $ej5) ? $puntuacion+=0.5 : $error[] = "5. Respuesta correcta: Cambiar las bombillas por bombillas led";
                        in_array($preguntas[4]->respuesta[1], $ej5) ? $puntuacion+=0.5 : $error[] = "5. Respuesta correcta: Instalar termostatos en las habitaciones";
                    }
                }
                isset($_SESSION['usuario']) ? Tutorial::añadirPuntuacion(4,$puntuacion) : "";
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
                <h1 class="my-4 text-center text-primary">Examen Cuento energetico</h1>
            </div>
        </div>
    </div>
    <div class="row m-4 border border-primary shadow-lg p-4 bg-light text-center">
    <div class="col-lg-12">
    <form action="./formulario.php" method="post">
        <p><?php echo $preguntas[0]->cod;?>. <?php echo $preguntas[0]->enunciado;?></p>
            <select name="condicional">
                <option value="" <?php !isset($_POST['condicional']) ? print 'selected="true"': ""?> disabled>Selecciona</option>
                <option value="<?php print $preguntas[0]->respuesta; ?>">for</option>
                <option value="inicio">if</option>
                <option value="disfraz">Ninguna es correcta</option>
            </select>
        <p><?php echo $preguntas[1]->cod;?>. <?php echo $preguntas[1]->enunciado;?></p>
            <input type="radio" value="<?php print $preguntas[1]->respuesta; ?>" name="bucle">
            <label for="correcto">Correcto</label>
            <input type="radio" value="falso" name="bucle">
            <label for="falso">Falso</label>
        <p><?php echo $preguntas[2]->cod;?>. <?php echo $preguntas[2]->enunciado;?></p>
            <input type="text" name="variable">
        <p><?php echo $preguntas[3]->cod;?>. <?php echo $preguntas[3]->enunciado;?></p>
            <select name="ahorroAgua">
                    <option value="" <?php !isset($_POST['ahorroAgua']) ? print 'selected="true"': ""?> disabled>Selecciona</option>
                    <option value="x">Cerrar el grifo al lavar los dientes </option>
                    <option value="y">Vigilar posibles fugas de agua en cocina y baño</option>
                    <option value="<?php print $preguntas[3]->respuesta; ?>">Ambas son correctas</option>
            </select>
        <p><?php echo $preguntas[4]->cod;?>. Selecciona las opciones correctas. <br>
        <?php echo $preguntas[4]->enunciado;?></p>
            <label><input type="checkbox" name="eficiencia[]" value="<?php print $preguntas[4]->respuesta[0] ?>">Cambiar las bombillas por bombillas led</label><br>
            <label><input type="checkbox" name="eficiencia[]" value="<?php print $preguntas[4]->respuesta[1] ?>">Instalar termostatos en las habitaciones</label><br>
            <label><input type="checkbox" name="eficiencia[]" value="indicador">Poner la calefaccion a 28 grados para no tener frio en casa.</label><br>
        <button class="btn btn-primary" type="submit" name="submit">Enviar</button>
    </form>
	</div>
	</div>
    <?php 
        foreach ($error as $valor) echo '<p class="text-center" style="color:red">' . $valor . '</p>';
        isset($_POST['submit']) ? print '<p class="text-center">Tu puntuación es: ' . $puntuacion .'/5</p>' : "";
        echo $mensaxe;
        piePagina(); scriptRuta();
    ?>
</body>
</html>