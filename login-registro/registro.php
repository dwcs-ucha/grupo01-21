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
        $archivo=("./csv/usuarios.csv");
        $error = array();
        linksRuta();
        

        if(isset($_POST['submit'])){
               //FALTA LO DE CAMBIAR ACTIVADO A TRUE CUANDO PINCHARON EN EL EMAIL(NO LO SE HACER)
            $nombreUsuario=Validaciones::validaUsuario($_POST["nombreUsuario"]);
            $contraseña=Validaciones::validaContraseña($_POST['contraseña']);
            $rol="usuario"; //Todos los que hagan login desde el registro son usuarios y no administradores
            $email=Validaciones::validaEmail($_POST['email']);
            $activado=$_POST['activado'];
            $puntuacion="0-0-0-0-0-0-0-0-0";
            $captcha = $_POST['g-recaptcha-response'];
            $secret = '6LctxY0dAAAAAI-JjPSJMPUFRvfncxAGNsWq4YZ6';
            !$captcha ? $error[] = 'Tienes que verificar el captcha' : "";
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
            $arr = json_decode($response, TRUE);
            if ($arr['success'] && empty($error)) {
                $usuarioValidado=new Usuario($nombreUsuario,$contraseña,$rol,$email,$activado,$puntuacion);
                $arrayUsuarios= DAO::obtenerUsuarios($archivo);
                $arrayUsuarios[] = $usuarioValidado;
                DAO::escribirUsuarios($archivo,$arrayUsuarios);
                //header("Location: ./registrado.php") ;
            }
            
        }
        ?>
        </head>
        <body class="bg-primary bg-opacity-50">
            <?php menuRuta(); ?>
          <form class="form" id="formulario" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"
            enctype="multipart/form-data" text-align="center">
            <fieldset>
            <div class="container p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="my-4 text-center text-white">Registro</h1>
                        </div>
                    </div>
                </div>
                <div class="row m-4 border border-primary shadow-lg p-4 bg-light text-center">
                <div class="col-lg-12">
                Nombre Usuario:</br>
                <input type="text" name="nombreUsuario" placeholder="Nombre Usuario"/></br></br>
                Contraseña:</br>
                <input type="password" name="contraseña" placeholder="Contraseña"/></br></br>
                Email:</br>
                <input type="email" name="email" placeholder="Email"/></br></br>
                <input type="hidden" name="activado" value="false"/>
                <div class="g-recaptcha col-lg-12 mx-auto" data-sitekey="6LctxY0dAAAAAJAIY-2GH4FsvDE5dfOglqk_EjMX"></div>
                <input class="btn btn-primary col-lg-1" type="submit" name="submit" value="Registrarse"/> 
            </fieldset>
            </div>
                </div>
        </form>
        <?php 
        foreach ($error as $valor) echo '<p class="text-center">' . $valor . '</p>';
        piePagina(); scriptRuta(); ?>
        <script src="https://www.google.com/recaptcha/api.js"></script>
    </body>
</html>

<?php
?>
