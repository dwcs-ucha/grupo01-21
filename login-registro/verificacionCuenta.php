<?php
/*
*
*Verificación cuenta
*@autor: Óscar Martínez López
*@version: 1.00.00
*
*/
    include_once("../menu.php"); //Incluímos todo el código necesario
    include_once("../clases/DAO.class.php");
    include_once("../clases/Usuario.class.php");
    include_once("../clases/Validaciones.class.php");
    $archivo=("./csv/usuarios.csv");
    $arrayUsuarios= DAO::obtenerUsuarios($archivo); //Guardamos en este array todos los usuarios del CSV
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Verificación cuenta</title>
    </head>
    <body>
        <?php
            if(isset($_GET["usuario"])){ //Se comprueba si se ha pasado algún usuario en la url
                $usuarioVerificar=$_GET["usuario"]; //De haberla, la guardamos en esta variable
                $cont=0; //Iniciamos un contador a 0 para el bucle while
                $verificado=false; //Creamos una variable booleana para saber cuando verificamos al usuario
                while($verificado==false && $cont<count($arrayUsuarios)){ //Este bucle se repetirá mientras la variable verificado sea falsa y el contador sea menor que la cantidad de usuarios registrados
                        if($arrayUsuarios[$cont]->getNombreUsuario()==$usuarioVerificar){ //Si coincide el nombre de la url con uno del array
                                $arrayUsuarios[$cont]->verificarUsuario(); //Llamamos a la función verificarUsuario, que modificará su atributo activado de false a true 
                                $verificado=true; //Y se iguala la variable $verificado a true para indicar que se ha encontrado uno con el mismo nombre y así salir del bucle
                        }
                        $cont++;
                }
                if($verificado){
                    DAO::escribirUsuarios($archivo, $arrayUsuarios); //Actualizamos el archivo usuarios.csv
                    echo "<h4 style='color:green; text-align:center'>Usuario ".$usuarioVerificar.' verificado exitosamente! Pulse <a href="./login.php">aquí</a> para hacer login</h4>'; //Mensaje que verá el usuario cuando verifiquemos su usuario
                }else
                    echo "<h4 style='color:red; text-align:center'>No se ha podido verificar ningún usuario.</h4>";
            }
            else
                echo "<h4 style='color:red; text-align:center'>No hay ningún usuario que verificar.</h4>";
        ?>
    </body>
</html>