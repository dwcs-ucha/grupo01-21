<?php
/*
*
*Clase DAO
*@autor: Jorge Seijoso González
*@version: 1.00.00
*
*/


class DAO {
	//Funcion para leer el csv
	public static function leerCSV($fichero) {
		$arrayD = array(); 
		global $error;
		if ($fp = fopen($fichero, 'r')) {
			while ($fila=fgetcsv($fp,1000, ',')) {
				$arrayD[] = $fila;
			}
		}
		else {
			$error[] = 'El fichero no pudo ser abierto';
		}
		return $arrayD;
	}

	//funcion para leer el csv en bloque
	public static function escribirCSVBloque($arrayGlobal, $fichero) {
		global $error;
		if (empty($error) &&  $fp = fopen($fichero, 'w')) {
			foreach ($arrayGlobal as $dato) { 
				fputcsv($fp, $dato);
			}
		}
		fclose($fp);
	}
	//funcion para leer el csv en linea
	public static function escribirCSVLinea($arrayGlobal, $fichero) {
		global $error;
		if (empty($error) &&  $fp = fopen($fichero, 'a')) {
				fputcsv($fp, $arrayGlobal);
		}
		fclose($fp);
	}
}
public static function obtenerUsuarios($fichero) {
        //Función que se encarga de leer el ficheiro csv y acumular sus valores en un array bidimensional
        $arrayD = array();
        global $error;
        if ($fp = fopen($fichero, 'r')) {
            while ($fila=fgetcsv($fp,1000, ',')) { //Mientras existan valores que leer
                $usuario= new Usuario($fila[0],$fila[1],$fila[2],$fila[3], $fila[4]); //creamos el objeto usuario con los valores del csv como valores de los atributos
                $arrayD[] = $usuario; //añadimos al array de datos el objeto usuario
            }
        } else {
            $error[] = 'El fichero no pudo ser abierto';
        }
        fclose($fp);
        return $arrayD; //y lo devolvemos

    }

  /*** FUNCIÓN QUE ESCRIBE USUARIOS EN UN CSV ***/

    public static function escribirUsuarios($fichero, $arrayDatos) {
        global $error;
        if (empty($error) &&  $fp = fopen($ficheiro, 'w')) { //En el caso de que no haya errores y deje entrar al archivo
            foreach ($arrayDatos as $usuario) {
                $filaDatos = array($usuario->nombreUsuario, $usuario->contraseña, $usuario->rol, $usuario->email, $usuario->activado);
                fputcsv($fp, $filaDatos); //Ponemos cada fila del csv
            }
        } else {
            $error[] = 'El fichero no puede ser modifcado';
            return false;
        }
        fclose($fp); //Cerramos el archivo
        return true;
    }
?>
