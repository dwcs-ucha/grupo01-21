<?php
/*
*
*Login
*@autor: Marcos y Daniel Rivas
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
        $valoresLogin = array (
            'usuario' => 'Usuario',
            'contraseña' => 'Contraseña',
            'enviar' => 'Enviar'
        ); //array para el multiidioma
        $valoresLogin = Idioma::cambiarIdioma($valoresLogin);
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
            if(empty($error)) {
                Validaciones::validaLogin($usuario, $contraseña, $arrayUsuarios);
            }
        }              
    ?>  
       <body class="bg-primary bg-opacity-50">
        <?php menuRuta();//Incluimos el menú en php?>
          <form class="form" id="formulario" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"
            enctype="multipart/form-data" text-align="center">
            <fieldset>
                <div class="container p-4">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="my-4 text-center text-white">Login</h1>
                        </div>
                    </div>
                </div>
                <div class="row m-4 border border-primary shadow-lg p-4 bg-light text-center">
                <div class="col-lg-12">
                <?php echo $valoresLogin['usuario'] ?></br>
                <input type="text" name="nombreUsuario" placeholder="Nombre Usuario"/></br></br>
                <?php echo $valoresLogin['contraseña'] ?></br>
                <input type="password" name="contraseña" placeholder="Contraseña"/></br></br>
                <input class="btn btn-primary" type="submit" name="submit" value="<?php echo $valoresLogin['enviar'] ?>"/></br></br>
                </div>
                </div>
                <?php
                 foreach ($error as $valor) echo '<p class="text-center">' . $valor . '</p>';
                ?>
            </fieldset>
        </form>
        <p class="text-center">Si no estás registrado: <a href="./registro.php">Pincha aquí</a></p>
        
        <?php piePagina(); scriptRuta(); ?>
        
    </body>
</html>
