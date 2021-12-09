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

        $archivo=("./csv/usuarios.csv");
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
            $captcha = $_POST['g-recaptcha-response'];
            $secret = '6LctxY0dAAAAAI-JjPSJMPUFRvfncxAGNsWq4YZ6';
            !$captcha ? $error[] = 'Tienes que verificar el captcha' : "";
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
            $arr = json_decode($response, TRUE);
            var_dump($response);
            if($arr['success'] && empty($error)) {
                Validaciones::validaLogin($usuario, $contraseña, $arrayUsuarios);
            }
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
                <div class="g-recaptcha" data-sitekey="6LctxY0dAAAAAJAIY-2GH4FsvDE5dfOglqk_EjMX"></div>
                <input type="submit" name="submit" value="Enviar"/></br></br>
                <?php
                 foreach ($error as $valor) echo '<p>' . $valor . '</p>';
                ?>
            </fieldset>
        </form>
        <p>Si no estás registrado: <a href="./registro.php">Pincha aquí</a></p>
        
        <?php piePagina(); scriptRuta(); ?>
        <script src="https://www.google.com/recaptcha/api.js"></script>
    </body>
</html>
