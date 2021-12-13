<?php
/*
*
*Registro
*@autor: Marcos y Óscar (parte verificación correo)
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
         include("../automatizadorEmails/Correo.class.php"); //Incluimos la clase Correo
        $archivo=("./csv/usuarios.csv");
        $error = array();
        linksRuta();
        

        if(isset($_POST['submit'])){
            $nombreUsuario=Validaciones::validaUsuario($_POST["nombreUsuario"]);
            $contraseña=Validaciones::validaContraseña($_POST['contraseña']);
            $rol="usuario"; //Todos los que hagan login desde el registro son usuarios y no administradores
            $email=Validaciones::validaEmail($_POST['email']);
            $activado=$_POST['activado'];
            $puntuacion="0-0-0-0-0-0-0-0-0-0-0"; //tantos 0s como numero de tutoriales + 1 (posición 0)
            $captcha = $_POST['g-recaptcha-response'];
            $secret = '6LctxY0dAAAAAI-JjPSJMPUFRvfncxAGNsWq4YZ6';
            !$captcha ? $error[] = 'Debe verificar el captcha' : "";
            $response = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secret&response=$captcha");
            $arr = json_decode($response, TRUE);
            if ($arr['success'] && empty($error)) {
                $usuarioValidado=new Usuario($nombreUsuario,$contraseña,$rol,$email,$activado,$puntuacion);
                $arrayUsuarios= DAO::obtenerUsuarios($archivo);
                $arrayUsuarios[] = $usuarioValidado;
                DAO::escribirUsuarios($archivo,$arrayUsuarios);
                $url="https://grupo012122dwcs.uchaweb2.es/grupo01-21/login-registro/verificacionCuenta.php?usuario=".$_POST['nombreUsuario']; //url del enlace del mensaje con el nombre del usuario
                $mensaje="Gracias por registrarte en nuestra página ".$_POST['nombreUsuario']."!<br/><br/>Haz clic en este enlace para verificar tu cuenta:<br/><br/>
                <a style='padding: 10px; font-size: 15px; font-weight: bold; background-color: #0099ff; color: white; border-radius: 50px;'
                href=$url>Verificar su cuenta</a>"; //Mensaje para email
                Correo::enviarCorreo($_POST['email'], "Verificación de cuenta", $mensaje, null); //Llamamos a la función para enviar un email
                $_SESSION['nombreUsuario']=$_POST['nombreUsuario']; //Creamos un $_SESSION para que solo se pueda acceder a la página de registrado.php si estás registrado
                $_SESSION['email']=$_POST['email']; //Guardamos el email en $_SESSION para poder usarlo en registrado.php
              ?>
             
              <?php
            }
            
        }
        $valoresRegistro = array (
            'registro' => 'Registro',
            'usuario' => 'Usuario',
            'contraseña' => 'Contraseña',
            'email' => 'Email',
            'enviar' => 'Enviar'
        );
        $valoresRegistro = Idioma::cambiarIdioma($valoresRegistro);
        ?>
        <style>
            .hijo {
                margin-left:33vw;
            }
            
        </style>
        </head>
        <body class="bg-primary bg-opacity-50">
            <?php menuRuta(); ?>
          <form class="form" id="formulario" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"
            enctype="multipart/form-data" text-align="center">
            <fieldset>
                <?php
                foreach ($error as $valor) echo '<br/><h4 style="color:red" class="text-center">' . $valor . '</h4>';
                 if(isset($_POST['submit'])){ //ifs para mostrar este mensaje por pantalla cuando se registra correctamente
                      if ($arr['success'] && empty($error)) {
                          ?>
                          </br>
                          <h4 style="color:green; text-align: center">Email de verificación enviado a: <?php echo $_POST['email'];?></h4>
                          <?php
                      }
                     
                 }
                ?>
            <div class="container p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="my-4 text-center text-white"><?php echo $valoresRegistro['registro'] ?></h1>
                        </div>
                    </div>
                </div>
                <div class="row m-4 border border-primary shadow-lg p-4 bg-light text-center">
                <div class="col-lg-12">
                <?php echo $valoresRegistro['usuario'] ?></br>
                <input type="text" name="nombreUsuario" placeholder="Nombre Usuario"/></br></br>
                <?php echo $valoresRegistro['contraseña'] ?></br>
                <input type="password" name="contraseña" placeholder="Contraseña"/></br></br>
                <?php echo $valoresRegistro['email'] ?></br>
                <input type="email" name="email" placeholder="Email"/></br></br>
                <input type="hidden" name="activado" value="false"/>
                <div class="g-recaptcha hijo" data-sitekey="6LctxY0dAAAAAJAIY-2GH4FsvDE5dfOglqk_EjMX"></div> <br>
                <input class="btn btn-primary col-lg-1" type="submit" name="submit" value="Registrarse"/> 
            </fieldset>
            </div>
                </div>
        </form>
        <?php 
        piePagina(); scriptRuta(); ?>
        <script src="https://www.google.com/recaptcha/api.js"></script>
    </body>
</html>

<?php
?>
