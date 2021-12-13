<?php
/*
*
*Login
*@autor: Daniel Rivas Arévalo
*@version: 1.00.00
*
*/

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Usuarios - UchaTech</title>
        <?php
         include("../clases/DAO.class.php");
         include("../clases/Validaciones.class.php");
         include("../menu.php");
         linksRuta();   
         $archivo=("./csv/usuarios.csv");
         $error = array();
         $arrayCSV = DAO::obtenerUsuarios('./csv/usuarios.csv');
    if (!isset($_SESSION['usuario'])) { //No caso de que o usuario non estea identificado:
        die("<p>Error - debe <a href='index.php'>identificarse</a>.</p>");
    }
    else if($usuario->getRol()!='administrador') {
        die("<p>Error - No tiene acceso a esta página.</p>");
    }
    else {
        $valoresUsuarios = array (
            'contraseña' => 'Contraseña',
            'email'=>'Email',
            'gestionUsuarios' => 'Gestión de usuarios',
            'tablaUsuarios' => 'Tabla de usuarios',
            'rol' => 'Rol',
            'enviar' => 'Enviar',
            'eliminar' => 'Eliminar',
            'administrador' => 'Administrador',
            'usuario' => 'Usuario'
        );
        $valoresUsuarios = Idioma::cambiarIdioma($valoresUsuarios);
        ?>
    </head>
    <body class="bg-primary bg-opacity-50">
        <?php menuRuta(); ?>
        <div class="container p-4">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="my-4 text-center text-white"><?php echo $valoresUsuarios['gestionUsuarios'] ?></h1>
                </div>
            </div>
        </div>
        <form action="./gestionUsuarios.php" method="post">
        <div class="row m-4 border rounded border-primary shadow-lg p-4 bg-light">
        <div class="col-lg-12 text-center">
            <p><?php echo $valoresUsuarios['rol'] ?></p>
            <select name="rol">
            <option disabled <?php !isset($_POST['rol']) ? print 'selected="true"' : "";?>><?php echo $valoresUsuarios['rol'] ?></option>
            <option value="administrador"><?php echo $valoresUsuarios['administrador'] ?></option>
            <option value="usuario"><?php echo $valoresUsuarios['usuario'] ?></option>
            </select>   
            <?php 
                if (isset($_POST['rol'])) { //No caso de que estea asignado un rol
                    $rol = $_POST['rol']; //Metemos o valor no array de datos
                } else if (!isset($_POST['rol']) && isset($_POST['submit'])) $error[] = "Debes asignarle un rol al usuario."; 
                //En caso contrario, mandamos un error
            ?>
            <p><?php echo $valoresUsuarios['usuario'] ?></p>
            <input type="text" id="usuario" name="usuario" value="<?php isset($_POST['usuario']) ? $usuarioValidado = Validaciones::validaUsuario($_POST['usuario']) : "";?>">
            <?php
                if(isset($_POST['usuario'])) { //función que compara usuario con array
                    Validaciones::comparaUsuarios($usuarioValidado, $arrayCSV);
                }
            ?> <br/>
            <p><?php echo $valoresUsuarios['contraseña'] ?></p>
            <input type="password" id="contrasinal" name="contrasinal" value=""> <br/>
            <?php isset($_POST['contrasinal']) ? $contraseña = Validaciones::validaContraseña($_POST['contrasinal']) : ""; ?>
            <p>Email</p>
            <input type="email" name="email" value="<?php isset($_POST['email']) ? print $correo=Validaciones::validaEmail($_POST['email']) : ""; ?>"> <br>
        </div>
            <button class="btn btn-primary m-4 col-lg-1 mx-auto" type="submit" name="submit"><?php echo $valoresUsuarios['enviar'] ?></button>
        </form>
            </div>
            </div>


        <?php 
            $puntuacion="0-0-0-0-0-0-0-0-0-0-0";
            $activado=false;
            foreach ($error as $valor) echo '<p class=error>' . $valor . '</p>';
            if (empty($error) && isset($_POST['submit'])) {
                $usuarioNuevo = new Usuario($usuarioValidado, $contraseña, $rol, $correo, $activado, $puntuacion);
                $arrayCSV[] = $usuarioNuevo;
                DAO::escribirUsuarios('./csv/usuarios.csv', $arrayCSV);
            }
                /*No caso de que non haxa erros, incluímos o $arrayDatos do formulario validado ao $arrayGlobal,
                resultante da lectura do CSV */
            //Se non hai erros e prememos submit, queremos que este $arrayGlobal se inclua no ficheiro CSV
                $arrayCSV = DAO::obtenerUSuarios('./csv/usuarios.csv'); //Lemos de novo o CSV actualizando o $arrayGlobal
                /***TÁBOA DE USUARIOS ***/
                $cabecera = array ( //array dos datos da cabeceira
                    'Usuario',
                    'Contraseña',
                    'Rol',
                    'Correo electrónico',
                ); //cabeceira da táboa
                echo ' <div class="container p-4">
                <div class="row">
                        <div class="col-md-12">
                            <h1 class="my-4 text-center text-white">' . $valoresUsuarios['tablaUsuarios'] . '</h1>
                        </div>
                    </div>
                </div>';
                echo '<div class="row m-4 border rounded border-primary shadow-lg p-4 bg-light">';
                echo '<div class="col-lg-12 text-center mx-auto">';
                echo '<table class="table"><tr>';
                foreach ($cabecera as $datoCabecera) { //Imprimimos os datos da cabeceira
                    echo '<td class="cabecera">' . $datoCabecera . '</td>';
                }
                echo '</tr>';
                foreach ($arrayCSV as $usuarioDato) { //Por cada array interno ao array global (o cal, resulta unha fila)
                    echo '<tr>'; //abrimos fila
                        echo '<td>' . $usuarioDato->getNombreUsuario() . '</td>';
                        echo '<td>' . $usuarioDato->getContraseña() . '</td>';
                        echo '<td>' . $usuarioDato->getRol() . '</td>';
                        echo '<td>' . $usuarioDato->getEmail() . '</td>';
                    echo '<td><a href="borrarUsuario.php?id=' . array_search($usuarioDato,$arrayCSV) . '"><button class="btn btn-danger me-3">Borrar</button></a></td>';
                    echo '</tr>'; //pechamos fila
                }
                echo '</table></div></div>';  
    }   
                piePagina(); scriptRuta(); 
    ?>
    </body>
    </html>
