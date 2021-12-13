<?php
/*
*
*Clase Validaciones
*@autor: Pablo Vázquez Pereiro
*@version: 1.00.00
*
*/

class Validaciones {
    const usuarioExp = '/[A-Za-z0-9]/'; 
    const contraseñaExp = '/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{6,16}$/';
    const nombreExp = '/^[A-ZÁÉÍÓÚ][a-záéíóú]*$/';
    const textoExp = '/[A-ZáéíóúÁÉÍÓÚñÑa-z0-9-.¿?!¡:;,]/'; 

public static function validaUsuario($usuario) {
    global $error;
    $usuarioValidado = "";
    if (!empty($usuario) && isset($_POST['submit'])) {
        if (preg_match(self::usuarioExp, $usuario)) {
            $usuarioValidado=$usuario;
        } else {
            $error[]= "O usuario só pode ter letras e números";
            $usuarioValidado="";
        }
    } else {
        $error[] = "Debe seleccionar un usuario";
        $usuarioValidado = "";
    }
    return $usuarioValidado;
}

public static function validaContraseña($contraseña) {
    global $error;
    $contraseñaValidada = "";
    if (!empty($contraseña) && isset($_POST['submit'])) {
         if (preg_match(self::contraseñaExp, $contraseña)) {
            $contraseñaValidada = crypt($contraseña, 'saltdeproba');
        } else {
            $error[] = "La contraseña debe tener entre 6 e 16 caracteres, una minúscula, una mayúscula y un dígito como mínimo.";
            $contraseñaValidada="";
        }
    } else {
        $error[] = "Debe seleccionar una contraseña";
        $contraseñaValidada="";
    }
    return $contraseñaValidada;
}

public static function validaLogin($usuario, $contraseña, $arrayCSV) {
    global $error;
    $encontrada = false;
    $coinciden = false;
    $activado = false;
    $i = 0; 
    while(!$encontrada && $i<count($arrayCSV)) { //mentres que $encontrada sexa false
         if ($arrayCSV[$i]->getNombreUsuario() == $usuario) { //se o array na posición $i, 1 (usuario) é igual ao usuarioValidado
             $encontrada = true; //$encontrada será true e sairá do bucle
         }
         $i++; //sumamos o valor do contador $i
    }
    if ($encontrada) { //no caso de que estea encontrada
        $cifrada=$arrayCSV[$i-1]->getContraseña(); //asignamos unha variable á súa contrasinal. A primeira posición do array é $i-1 debido a que 
                                     //ao saír do anterior bucle sumamos un valor de $i aínda que xa a tivéramos atopado
        if (hash_equals($cifrada, $contraseña)) { //se o usuario e contrasinal coinciden 
             $coinciden = true;
             if($arrayCSV[$i-1]->getActivado() == "true") { //Comprobamos que el atributo activado sea igual a true para que solo pueda acceder si ha verificado su cuenta
                $activado=true;
                $_SESSION['usuario'] = $arrayCSV[$i-1];
                include_once('../visitas/registrarVisita.php');//encargado de añadir el seguimiento de ese día
                header("Location: ../index.php"); //levamos ao usuario á páxina de control de usuarios
             } else $error[]="Debes activar el correo en el link que enviamos a " . $arrayCSV[$i-1]->getEmail();
        } else { $error[]="La contraseña no coincide con el usuario"; //en caso contrario enviamos erro
     }

    } else $error[]="El usuario no existe"; //en caso de que non se atope no CSV enviamos erro
    return $coinciden;
 }

 public static function comparaUsuarios($usuario, $arrayCSV) { //Función que se encarga de comparar o usuario ingresado cos que xa están rexistrados
    global $erro;
    $repetido = false;
    $i = 0;
    while(!$repetido && $i<count($arrayCSV)) { //mentres que non estea repetido e o contador sexa menor á lonxitude do array
        if ($arrayCSV[$i]->getNombreUsuario() == $usuario) { //se coinciden
            $repetido = true; //repetido é true
            $error[]="El usuario ya está registrado"; 
        }
        $i++; //sumamos contador
    }
    return $repetido; //devolvemos true no caso de que o usuario exista no ficheiro
}

 


public static function validaNombre($nombre) {
    global $error; 
    if(isset($nombre) && preg_match(self::nombreExp, $nombre) && filter_var($nombre, FILTER_SANITIZE_STRING)) {
        trim($nombre);
        $nombre=filter_var($nombre, FILTER_SANITIZE_STRING);
    }
    else {
        $nombre = "";
        $error[] = "El nombre no es correcto";
    }
    return $nombre;
}

public static function validaEmail($email) {
    global $error;
    if(isset($email) && filter_var($email, FILTER_SANITIZE_EMAIL)) {
        trim($email);
        $email=filter_var($email, FILTER_SANITIZE_EMAIL);
    }
    else {
        $email = "";
        $error[] = "El email no es correcto";
    }
    return $email;
}

public static function validaTexto($texto) {
    global $error;
    if(isset($texto) && preg_match(self::textoExp, $texto) && filter_var($texto, FILTER_SANITIZE_STRING)) {
        trim($texto);
        $texto=filter_var($texto, FILTER_SANITIZE_STRING);
    }
    else {
        $texto = "";
        $error[] = "O texto non é correcto (baleiro ou contén carácteres especiais non permitidos)";
    }
    $arrayDatos[]=$texto;
    return $texto;
}
}


?>
