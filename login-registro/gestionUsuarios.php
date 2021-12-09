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
        <title>Login - UchaTech</title>
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
        ?>
    </head>
    <body>
        <?php menuRuta(); ?>
        <h1>Ingreso de usuarios</h1>
        <form action="./gestionUsuarios.php" method="post">
        <div class="campos">
            <p>Rol</p>
            <select name="rol">
            <option disabled <?php !isset($_POST['rol']) ? print 'selected="true"' : "";?>>Seleccione rol</option>
            <option value="administrador">Administrador</option>
            <option value="usuario">Usuario</option>
            </select>   
            <?php 
                if (isset($_POST['rol'])) { //No caso de que estea asignado un rol
                    $rol = $_POST['rol']; //Metemos o valor no array de datos
                } else if (!isset($_POST['rol']) && isset($_POST['submit'])) $error[] = "Debes asignarle un rol al usuario."; 
                //En caso contrario, mandamos un error
            ?>
            <p>Usuario</p>
            <input type="text" id="usuario" name="usuario" value="<?php isset($_POST['usuario']) ? $usuarioValidado = Validaciones::validaUsuario($_POST['usuario']) : "";?>">
            <?php
                if(isset($_POST['usuario'])) { //función que compara usuario con array
                    Validaciones::comparaUsuarios($usuarioValidado, $arrayCSV);
                }
            ?> <br/>
            <p>Contraseña</p>
            <input type="password" id="contrasinal" name="contrasinal" value=""> <br/>
            <?php isset($_POST['contrasinal']) ? $contraseña = Validaciones::validaContraseña($_POST['contrasinal']) : ""; ?>
            <p>Correo electrónico</p>
            <input type="email" name="email" value="<?php isset($_POST['email']) ? print $correo=Validaciones::validaEmail($_POST['email']) : ""; ?>"> <br>
        </div>
            <button type="submit" name="submit">Enviar</button>
        </form>


        <?php 
            foreach ($error as $valor) echo '<p class=error>' . $valor . '</p>';
            if (empty($error) && isset($_POST['submit'])) {
                $usuarioNuevo = new Usuario($usuarioValidado, $contraseña, $rol, $correo, false, 0-0-0-0-0-0-0-0-0);
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
                echo "<h1>Tabla de usuarios</h1>";
                echo '<table><tr>';
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
                    echo '<td><a href="borrarUsuario.php?id=' . array_search($usuarioDato,$arrayCSV) . '">Borrar</a></td>';
                    echo '</tr>'; //pechamos fila
                }
                echo '</table>';  
    }   
                piePagina(); scriptRuta(); 
    ?>
    </body>
    </html>