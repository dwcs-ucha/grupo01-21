<?php
/*
*
*Registro
*@autor: Marcos
*@version: 1.00.00
*
*/
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Registro</title>
        <?php
         include("../clases/DAO.class.php");
         include("../clases/Validaciones.class.php");
         include("../menu.php");
        $archivo=("../CSV/usuarios.csv");
        $error = array();
        linksRuta();
        

        if(isset($_POST['submit'])){
               //FALTA LO DE CAMBIAR ACTIVADO A TRUE CUANDO PINCHARON EN EL EMAIL(NO LO SE HACER)
            $nombreUsuario=Validaciones::validaUsuario($_POST["nombreUsuario"]);
            $contraseña=Validaciones::validaContraseña($_POST['contraseña']);
            $rol="usuario"; //Todos los que hagan login desde el registro son usuarios y no administradores
            $email=Validaciones::validaEmail($_POST['email']);
            $activado=$_POST['activado'];
            if (empty($error)) {
                $usuarioValidado=new Usuario($nombreUsuario,$contraseña,$rol,$email,$activado,0-0-0-0-0);
                $arrayUsuarios= DAO::obtenerUsuarios($archivo);
                $arrayUsuarios[] = $usuarioValidado;
                DAO::escribirUsuarios($archivo,$arrayUsuarios);
                //header("Location: ./registrado.php") ;
            }
            
        }
        ?>
        </head>
        <body>
            <?php menuRuta(); ?>
          <form class="form" id="formulario" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"
            enctype="multipart/form-data" text-align="center">
            <fieldset>
                <legend>Registro</legend>
                Nombre Usuario:</br>
                <input type="text" name="nombreUsuario" placeholder="Nombre Usuario"/></br></br>
                Contrasinal:</br>
                <input type="password" name="contraseña" placeholder="Contraseña"/></br></br>
                Email:</br>
                <input type="email" name="email" placeholder="Email"/></br></br>
                <input type="hidden" name="activado" value="false"/>
                <input type="submit" name="submit" value="Registrarse"/> 
            </fieldset>
        </form>
        <?php 
        foreach ($error as $valor) echo '<p>' . $valor . '</p>';
        piePagina(); scriptRuta(); ?>
    </body>
</html>

<?php
?>
