<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registro</title>
    </head>
    <body>
        <?php
     
         include("./clases/Usuario.class.php");
         include("./clases/DAO.class.php");
         include("./menu.php");
        $archivo=("./CSV/usuarios.csv");
      

        if(isset($_POST['registro'])){
               //FALTAN VALIDACIONES DE CAMPOS Y A MAYORES QUE LAS CONTRASEÑAS SEAN IGUALES
               //FALTA LO DE CAMBIAR ACTIVADO A TRUE CUANDO PINCHARON EN EL EMAIL(NO LO SE HACER)
           
            $nombreUsuario=$_POST["nombreUsuario"];
            $contraseña=$_POST['contraseña'];
            $rol=$_POST['rol'];
            $email=$_POST['email'];
            $activado=$_POST['activado'];
            $arrayDatos=new Usuario($nombreUsuario,$contraseña,$rol,$email,$activado);
            DAO::leerCSV($archivo);
            DAO::escribirUsuario($archivo,$arrayDatos);
          
            $_SESSION['email']=$email;
            header("Location: ./registrado.php") ;
            
        }
        ?>
          <form class="form" id="formulario" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"
enctype="multipart/form-data" text-align="center">
            <fieldset>
                <legend>Registro</legend>
                Nombre Usuario:</br>
                <input type="text" name="nombreUsuario" placeholder="Nombre Usuario"/></br></br>
                Contrasinal:</br>
                <input type="password" name="contraseña" placeholder="Contraseña"/></br></br>
                Confirmar contraseña:</br>
                <input type="password" name="contraseña1" placeholder="Confirma contraseña"/></br></br>
                <input type="hidden" name="rol" value="usuario"/>
                Email:</br>
                <input type="email" name="email" placeholder="Email"/></br></br>
                <input type="hidden" name="activado" value="false"/>
                <input type="submit" name="registro" value="Registrarse"/> 
            </fieldset>
        </form>
    
    </body>
</html>

<?php
    //$usuario= new Usuario($nombreUsuario,)
?>