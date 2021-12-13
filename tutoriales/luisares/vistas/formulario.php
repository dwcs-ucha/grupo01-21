<!DOCTYPE html>
<?php
/*
 *
 * Formulario del tutorial de Scratch: "Tres en Raya"
 * @autor: Luis Angel Ares Prieto
 * @version: 1.00.00
 *
 */
include '../../clases/Tutorial.class.php';
include '../../clases/Pregunta.class.php';
include '../../../clases/DAO.class.php';
include '../../../menu.php';
$preguntas = DAO::obterPreguntas('.././csv/preguntas.csv');
?><html>
    <head>
        <title>Examen Scratch: "Tres en Raya"</title>
        <?php
        linksRuta(); //añadimos los links de estilo de Bootstrap 
        $error = array();
        $puntuacion = 0;
        $mensaxe = "";
        if (isset($_POST['submit'])) { //si el usuario envía el formulario
            /** Validación Ej. 1 * */
            if (isset($_POST['variables'])) { //si tiene cubierta la primera pregunta
                if ($_POST['variables'] == $preguntas[0]->respuesta) { //y es igual a la respuesta del objeto en su posición
                    $puntuacion++; //aumentamos la puntuación
                } else {
                    $error[] = $preguntas[0]->error(); //en caso contrario, enviamos el error
                }
            }
            /** Validación Ej. 2 * */
            if (isset($_POST['version'])) {
                if ($_POST['version'] == $preguntas[1]->respuesta) {
                    $puntuacion++;
                } else {
                    $error[] = $preguntas[1]->error();
                }
            }
            /** Validación Ej. 3 * */
            if (!empty($_POST['tablero'])) {
                $ej3 = strtolower($_POST['tablero']);
                $ej3 = trim($ej3);
                if ($ej3 == $preguntas[2]->respuesta) {
                    $puntuacion++;
                } else {
                    $error[] = $preguntas[2]->error();
                }
            }
            
            /** Validación Ej. 4 * */
            
            if (isset($_POST['nombre'])) {
                if ($_POST['nombre'] == $preguntas[3]->respuesta) {
                    $puntuacion++;
                } else {
                    $error[] = $preguntas[3]->error();
                }
            }

             if (isset($_POST['definicion'])) {
                if ($_POST['definicion'] == $preguntas[4]->respuesta) {
                    $puntuacion++;
                } else {
                    $error[] = $preguntas[4]->error();
                }
            }
            isset($_SESSION['usuario']) ? Tutorial::añadirPuntuacion(7, $puntuacion) : "";
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
                    <h1 class="my-4 text-center text-primary">Examen del tutorial de Scratch: "Tres en Raya"</h1>
                </div>
            </div>
        </div>
        <div class="row m-4 border border-primary shadow-lg p-4 bg-light text-center">
            <div class="col-lg-12">
                <form action="./formulario.php" method="post">
                    <p><?php echo $preguntas[0]->cod; ?>. <?php echo $preguntas[0]->enunciado; ?></p>
                    <select name="variables">
                        <option value="" <?php !isset($_POST['variables']) ? print 'selected="true"' : "" ?> disabled>Selecciona</option>
                        <option value="una">Una</option>
                        <option value="<?php print $preguntas[0]->respuesta; ?>">Dos</option>
                        <option value="mas">Más de dos</option>
                        <option value="ninguna">Ninguna</option>
                    </select>

                    <p><?php echo $preguntas[1]->cod; ?>. <?php echo $preguntas[1]->enunciado; ?></p>


                    <input type="radio" value="correcto" name="version">
                    <label for="correcto">Correcto</label>

                    <input type="radio" value="<?php print $preguntas[1]->respuesta; ?>" name="version">
                    <label for="falso">Falso</label>



                    <p><?php echo $preguntas[2]->cod; ?>. <?php echo $preguntas[2]->enunciado; ?></p>
                    <input type="text" name="tablero">

                    <p><?php echo $preguntas[3]->cod; ?>. <?php echo $preguntas[3]->enunciado; ?></p>

                    <input type="radio" value="<?php print $preguntas[3]->respuesta; ?>" name="nombre">
                    <label for="verdadero">3 en Raya</label>
                    
                    <input type="radio" value="falso" name="nombre">
                    <label for="falso">4 en Raya</label>
                    
                     <p><?php echo $preguntas[4]->cod; ?>. <?php echo $preguntas[4]->enunciado; ?></p>


                    <input type="radio" value="correcto" name="definicion">
                    <label for="correcto">es una instrucción o grupo de instrucciones que se pueden ejecutar o no en función del valor de una condición.</label>
<br>
                    <input type="radio" value="<?php print $preguntas[4]->respuesta; ?>" name="definicion">
                    <label for="falso">es una secuencia de instrucciones de código que se ejecuta repetidas veces, hasta que la condición asignada a dicho bucle deja de cumplirse</label>
<br>


                    
                    

                    <button class="btn btn-primary" type="submit" name="submit">Enviar</button>
                </form>
            </div>
        </div>
        <?php
        foreach ($error as $valor) {
            echo '<p class="text-center">' . $valor . '</p>';
        }
        isset($_POST['submit']) ? print '<h1 class="text-center">Tu puntuación es: ' . $puntuacion . '/5</h1>' : "";
        echo $mensaxe;
        piePagina();
        scriptRuta();
        ?>
    </body>
</html>