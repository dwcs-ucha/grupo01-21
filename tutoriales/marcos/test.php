<?php include("../../menu.php");
    include("../../clases/DAO.class.php");
    include '../clases/Tutorial.class.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>TEST SPACE INVADERS</title>
        <?php 
            linksRuta();
        ?>
    </head>
<body>
<?php
    menuRuta();

	$errores=0;
	$aciertos=0;
	if(isset($_POST['resultado'])){
		if(isset($_POST['primera']) && $_POST['primera']=="acierto1"){
				$aciertos+=1;
			}else{
				$errores+=1;
			}
		
		if(isset($_POST['segunda']) && $_POST['segunda']=="acierto2"){
				$aciertos+=1;
			}else{
				$errores+=1;
			}
		
		if(isset($_POST['tercera']) && $_POST['tercera']=="acierto3"){
				$aciertos+=1;
			}else{
				$errores+=1;
			}
		
		if(isset($_POST['cuarta']) && $_POST['cuarta']=="nave"){
				$aciertos+=1;
			}else{
				$errores+=1;
			}
		
		if(isset($_POST['quinta']) && $_POST['quinta']=="acierto5"){
				$aciertos+=1;
			}else{
				$errores+=1;
			}
			
            isset($_SESSION['usuario']) ? Tutorial::añadirPuntuacion(2,$aciertos) : "";
    }
        !isset($_SESSION['usuario']) ? $mensaxe = '<p class="text-center">Para guardar tu puntuación puedes <a href="' . $nav . 'login-registro/registro.php">registrarte</a> o <a href="' . $nav . 'login-registro/login.php">acceder</a> si ya tienes cuenta</p>' : 
        $mensaxe = '<p class="text-center">Para acceder a tu registro de puntuaciones dirígete al <a href="../../perfil.php">perfil</a></p>';	
	
?>
         <div class="container p-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="my-4 text-center text-primary">Examen de Space Invaders</h1>
            </div>
        </div>
    </div>
    <div class="row m-4 border border-primary shadow-lg p-4 bg-light text-center">
    <div class="col-lg-12">
     <form class="form" id="formulario" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"
enctype="multipart/form-data" text-align="center">
        <fieldset>
            PREGUNTA 1-¿Que es lo primero que deberiamos de hacer para despúes crear el juego?</br>
            <input type="radio" name="primera" value="error"/> Crear objetos nave y marcianos.
            <input type="radio" name="primera" value="acierto1"/> Preparar los fondos para posteriormente usarlos.
            <input type="radio" name="primera" value="error1"/> Empezar con el código directamente.</br></br>
            PREGUNTA 2-¿Con que bucle utilizaríamos para decirle a la bala que se elimine al tocar con un marciano?</br>
            <input type="radio" name="segunda" value="acierto2"/>Por siempre
            <input type="radio" name="segunda" value="error2"/>Repetir
            <input type="radio" name="segunda" value="error3"/>Esperar hasta que</br></br>
            PREGUNTA 3-¿ Selecciona lo que creas que nos indica este bloque de codigo?</br>
            <img src="capturas/codigomarciano3.JPG"/></br>
            <select name="tercera">
                <option value="nada" selected></option>
                <option value="error4">Comportamiento de la bala</option>
                <option value="error5" >Comportamiento de la nave</option>
                <option value="acierto3">comportamiento de los marcianos</option>
              </select></br></br>
            PREGUNTA 4-¿Escribe sobre que objeto trata este bloque nave/bala/marciano?<br>
            <img src="capturas/crearnave4.JPG"/></br>
            <input type="text" name="cuarta"/></br></br>
            PREGUNTA 5-¿Que cambiarias de este código para añadirle dificultad al juego?  </br>
            <img src="capturas/codigomarciano5.JPG"/></br>
            <select name="quinta">
                <option value="nada" selected/></option>
                <option value="acierto5"/>Sumar a x y a y más pixeles</option>
                <option value="error6"/>Sumar a y más pixeles</option>
                <option value="error7"/>Repetir más veces</option>
            </select></br></br>
                    <input class="btn btn-primary" type="submit" name="resultado" value="Enviar"/>
        </fieldset>
    </form>
</div>
</div>
<?php
	if(isset($_POST['resultado'])){
	
           echo '<h1 class="text-center">Has tenido '.$aciertos." aciertos y ".$errores." errores.</h1>";
			
}
    echo $mensaxe;
    piePagina(); scriptRuta();
?>
</body>
</html>