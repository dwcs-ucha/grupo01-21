<!DOCTYPE html>
<?php
    /*
    *
    *Formulario del tutorial de Scratch: Renovable Clicker
    *@autor: Jorge Seijoso González
    *@version: 1.00.00
    *
    */
    include '../../clases/Tutorial.class.php';
    include '.././clases/Preguntas.class.php'; //añadimos la clase Pregunta
    include '../../../clases/DAO.class.php'; //añadimos la clase DAO
    include '../../../menu.php'; //añadimos el menú
    $preguntas = DAO::obterPreguntas('.././csv/preguntas.csv');
?>
<html>
<head>
    <title>Examen Renovable Clicker</title>
    <?php
    linksRuta(); //añadimos los links de estilo de Bootstrap 
    $error = array();
    $puntuacion = 0;
    $mensaxe = "";
        if(isset($_POST['submit'])) { //si el usuario envía el formulario
            /** Validación Ej. 1 **/
                if(isset($_POST['ej1'])) { //si tiene cubierta la primera pregunta
                    if($_POST['ej1']==$preguntas[0]->respuesta) { //y es igual a la respuesta del objeto en su posición
                        $puntuacion++; //aumentamos la puntuación
                    }else {
                        $error[]=$preguntas[0]->error(); //en caso contrario, enviamos el error
                    }
                }
            /** Validación Ej. 2 **/
                if(isset($_POST['ej2'])) {
                    if($_POST['ej2']==$preguntas[1]->respuesta) {
                        $puntuacion++;
                    }else {
                        $error[]=$preguntas[1]->error();
                    }
                }
            /** Validación Ej. 3 **/
		    if(isset($_POST['ej3'])) {
                    if($_POST['ej3']==$preguntas[2]->respuesta) {
                        $puntuacion++;
                    }else {
                        $error[]=$preguntas[2]->error();
                    }
                }
            /** Validación Ej. 4 **/
                if(isset($_POST['ej4'])) {
                    if($_POST['ej4']==$preguntas[3]->respuesta) {
                        $puntuacion++;
                    }else {
                        $error[]=$preguntas[3]->error();
                    }
                }
            /** Validación Ej. 5 **/
		if(isset($_POST['ej5'])) {
                    $ej5 = strtolower($_POST['ej5']);
                    $ej5 = trim($ej5);
                        if($ej5==$preguntas[4]->respuesta) {
                            $puntuacion++;
                        } else {
                            $error[]=$preguntas[4]->error();
                        }
                }
	
 	isset($_SESSION['usuario']) ? Tutorial::añadirPuntuacion(9,$puntuacion) : "";

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
                <h1 class="my-4 text-center text-primary">Examen del tutorial de SNAKE</h1>
            </div>
        </div>
</div>
	<div class="row m-4 border border-primary shadow-lg p-4 bg-light text-center">
    	<div class="col-lg-12">
    <form action="./formulario.php" method="post">
<p><?php echo $preguntas[0]->cod;?>. <?php echo $preguntas[0]->enunciado;?></p>
<input type="radio" name="ej1" value="1a">a) Espera 3 segundos</br>
<input type="radio" name="ej1" value="1b">b) Cambiar tamaño por 10</br>
<input type="radio" name="ej1" value="<?php print $preguntas[0]->respuesta; ?>">c) sumar a x 20</br>
<p><?php echo $preguntas[1]->cod;?>. <?php echo $preguntas[1]->enunciado;?></p>
<input type="radio" name="ej2" value="2a">a) Verdadero
<input type="radio" name="ej2" value="<?php print $preguntas[1]->respuesta; ?>">b) Falso
<p><?php echo $preguntas[2]->cod;?>. <?php echo $preguntas[2]->enunciado;?></p>
<select name="comandos">
<option value="" <?php !isset($_POST['condicional']) ? print 'selected="true"': ""?> disabled>--Selecciona--</option>
<option value="eventos"> Eventos</option>
<option value="control"> Control</option>
<option value="<?php print $preguntas[2]->respuesta; ?>"> Operadores</option>
<option value="aspecto">Aspecto</option>
</select>
<p><?php echo $preguntas[3]->cod;?>. <?php echo $preguntas[3]->enunciado;?></p>
<input type="radio" name="ej4" value="4a">a) Los comandos de movimiento solo pueden mover los objetos horizontalmente</br>
<input type="radio" name="ej4" value="4b">b) Los comandos de apraiencia no afectan al fondo</br>
<input type="radio" name="ej4" value="<?php print $preguntas[3]->respuesta; ?>">c) Los comando de operadores pueden comparar datos</br>
<p><?php echo $preguntas[4]->cod;?>. <?php echo $preguntas[4]->enunciado;?></p>
<input type="text" name="ej5" value=""></br></br>
<button class="btn btn-primary" name="submit" type="submit" value="resultado">Resultado</button>
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