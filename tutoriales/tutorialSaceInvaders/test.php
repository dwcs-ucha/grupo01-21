<?php
	session_start();
    include("../menu.php");
	
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"/>
        <title>TEST SPACE INVADERS</title>
    </head>
<body>
<?php
	$errores=0;
	$aciertos=0;
	if(isset($_POST['resultado'])){
		if($_POST['primera']=="acierto1"){
				$aciertos+=1;
			}else{
				$errores+=1;
			}
		
		if($_POST['segunda']=="acierto2"){
				$aciertos+=1;
			}else{
				$errores+=1;
			}
		
		if($_POST['tercera']=="acierto3"){
				$aciertos+=1;
			}else{
				$errores+=1;
			}
		
		if($_POST['cuarta']=="nave"){
				$aciertos+=1;
			}else{
				$errores+=1;
			}
		
		if($_POST['quinta']=="acierto5"){
				$aciertos+=1;
			}else{
				$errores+=1;
			}
			
			
	}
?>
     <form class="form" id="formulario" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"
enctype="multipart/form-data" text-align="center">
        <fieldset>
            <legend>TEST CONOCIMIENTOS</legend>
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
                    <input type="submit" name="resultado" value="Obtener aciertos y errores."/>
        </fieldset>
    </form>
<?php
	if(isset($_POST['resultado'])){
	
           echo "Has tenido ".$aciertos." aciertos y ".$errores." errores.";
			
}
?>
</body>
</html>