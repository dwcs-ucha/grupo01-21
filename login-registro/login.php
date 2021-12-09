<?php
/*
*
*Login
*@autor: Marcos
*@version: 1.00.00
*
*/

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Login - UchaTech</title>
        <?php
        include("../clases/DAO.class.php");
        include("../clases/Validaciones.class.php");
        include("../menu.php");
        linksRuta();

        $archivo=("../CSV/usuarios.csv");
        $error = array();
        /*USUARIO ESCRITO CSV:
        nombreUsuario: admin;
        contraseña: Abc123;
        rol: administrador;
        email: email@email.com;
        activado: true;
        puntos:0;
        */
        //FALTAN VALIDACIONES CRYPT CONTRASEÑA CAMPOS ETC
        if (isset($_POST['submit'])){
            $usuario = Validaciones::validaUsuario($_POST['nombreUsuario']);
            $contraseña = Validaciones::validaContraseña($_POST['contraseña']);
            $arrayUsuarios=DAO::obtenerUsuarios($archivo);
            empty($error) ? Validaciones::validaLogin($usuario, $contraseña, $arrayUsuarios) : "";
            }              
            
    ?>  
        <body>
        <?php menuRuta();//Incluimos el menú en php?>
          <form class="form" id="formulario" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"
            enctype="multipart/form-data" text-align="center">
            <fieldset>
                <legend>Login</legend>
                Nombre usuario:</br>
                <input type="text" name="nombreUsuario" placeholder="Nombre Usuario"/></br></br>
                Contraseña:</br>
                <input type="password" name="contraseña" placeholder="Contraseña"/></br></br>
                <input type="submit" name="submit" value="Enviar"/></br></br>
                <?php
                 foreach ($error as $valor) echo '<p>' . $valor . '</p>';
                ?>
            </fieldset>
        </form>
        <p>Si no estás registrado: <a href="./registro.php">Pincha aquí</a></p>
        
        <?php piePagina(); scriptRuta(); ?>
    </body>
</html>
