<?php
session_start();

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include("../clases/Usuario.class.php");
        include("../clases/DAO.class.php");
        include("../menu.php");
        $archivo=("../CSV/usuarios.csv");
        $error="";
        $i=0;
        $encontrado=false;
        /*USUARIO ESCRITO CSV:
        nombreUsuario: admin;
        contraseña: 1234;
        rol: administrador;
        email: email@email.com;
        activado: true;
        */
        //FALTAN VALIDACIONES CRYPT CONTRASEÑA CAMPOS ETC
        if (isset($_POST['loguearse'])){
            $usuario = $_POST['nombreUsuario'];
            $contraseña = $_POST['contraseña'];
                     
            
            if (empty($usuario) || empty($contraseña)) {
                               $error = "Debes introducir usuario y contraseña";
            } else {
                $usuariosValidos=DAO::obtenerUsuarios($archivo);
              
                while(!$encontrado && $i<count($usuariosValidos)){
                    if($usuario=$usuariosValidos[$i][0])&&(password_verify($contraseña, $usuariosValidos[$i][1])){
                    $encontrado==true;
                    
                    }
                    $i++;
                }
                    if($encontrado==true){
                        $_SESSION['nombreUsuario'] = $usuario;
                        setcookie("usuario",$usuario,time()+3600);
                        header("Location: ./index.php");
            
                    }else $error="<p style ='color:red'>Las credenciales no son correctas, vuelva a intentarlo.</p></br>";
                    
            }              
                 
                      
             
            }
        }
        
    ?>  
      
          <form class="form" id="formulario" action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post"
enctype="multipart/form-data" text-align="center">
            <fieldset>
                <legend>Login</legend>
                Nombre usuario:</br>
                <input type="text" name="nombreUsuario" placeholder="Nombre Usuario"/></br></br>
                Contraseña:</br>
                <input type="password" name="contraseña" placeholder="Contraseña"/></br></br>
                <input type="submit" name="loguearse" value="Enviar"/></br></br>
                <?php
                 echo $error;
    
                ?>
            </fieldset>
        </form>
        Si no estás registrado: <a href="./registro.php">Pincha aquí</a>
      
    </body>
</html>
