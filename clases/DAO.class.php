<?php
/*
*
*Clase DAO
*@autor: Jorge Seijoso González y Daniel Rivas Arévalo
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

	public static function obtenerUsuarios($fichero) {
        //Función que se encarga de leer el ficheiro csv y acumular sus valores en un array bidimensional
        $arrayD = array();
        global $error;
        if ($fp = fopen($fichero, 'r')) {
            while ($fila=fgetcsv($fp,1000, ',')) { //Mientras existan valores que leer
                $usuarioDato= new Usuario($fila[0],$fila[1],$fila[2],$fila[3], $fila[4], $fila[5]); //creamos el objeto usuario con los valores del csv como valores de los atributos
                $arrayD[] = $usuarioDato; //añadimos al array de datos el objeto usuario
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
        if ($fp = fopen($fichero, 'w')) { //En el caso de que no haya errores y deje entrar al archivo
            foreach ($arrayDatos as $usuarioDato) {
                $filaDatos = array($usuarioDato->getNombreUsuario(), $usuarioDato->getContraseña(), $usuarioDato->getRol(), $usuarioDato->getEmail(), $usuarioDato->getActivado(), $usuarioDato->getPuntuacionString());
                fputcsv($fp, $filaDatos); //Ponemos cada fila del csv
            }
        } else {
            $error[] = 'El fichero no puede ser modifcado';
            return false;
        }
        fclose($fp); //Cerramos el archivo
        return true;
    }

	/*** FUNCIÓN QUE PASA AS ENTRADAS DUN CSV A UN ARRAY DE OBXECTOS "ENTRADA" ***/

    public static function obterEntradas($ficheiro) {
        //Función que se encarga de ler o ficheiro csv e acumular os seus valores nun array bidimensional
        $arrayD = array(); 
        global $erro;
        if ($fp = fopen($ficheiro, 'r')) {
            while ($fila=fgetcsv($fp,1000, ',')) { //Mentres existan valores que ler
                $entrada = new Entrada($fila[0],$fila[1],$fila[2],$fila[3], $fila[4]);
                $arrayD[] = $entrada; //engadimos a fila ao arrayD que creamos na función
            }
        } else {
            $erro[] = 'O ficheiro non puido ser aberto';
        }
        fclose($fp);
        return $arrayD; //e devolvémolo

    }

    /*** FUNCIÓN QUE ESCREBE AS ENTRADAS NUN CSV ***/

    public static function escribirEntradas($ficheiro, $arrayDatos) {
        global $erro;
        if (empty($erro) &&  $fp = fopen($ficheiro, 'w')) { //No caso de que non haxa erros e que deixe abrir o ficheiro con permisos de escritura:
            foreach ($arrayDatos as $entrada) { 
                $filaDatos = array($entrada->codigo, $entrada->ruta, $entrada->titulo, $entrada->autor, $entrada->fecha);
                fputcsv($fp, $filaDatos); //Poñemos cada fila no CSV
            }
        } else {
            $erro[] = 'O ficheiro non puido ser modificado';
            return false;
        } 
        fclose($fp); //Pechamos o arquivo
        return true;
    }

	/*** FUNCIÓN QUE PASA LOS TUTORIALES DE UN CSV A UN ARRAY DE OBJETOS "TUTORIAL" ***/

    public static function obtenerTutoriales($ficheiro) {
        //Función que se encarga de ler o ficheiro csv e acumular os seus valores nun array bidimensional
        $arrayD = array(); 
        global $erro;
        if ($fp = fopen($ficheiro, 'r')) {
            while ($fila=fgetcsv($fp,1000, ',')) { //Mentres existan valores que ler
                $tutorial = new Tutorial($fila[0],$fila[1],$fila[2],$fila[3], $fila[4]);
                $arrayD[] = $tutorial; //engadimos a fila ao arrayD que creamos na función
            }
        } else {
            $erro[] = 'O ficheiro non puido ser aberto';
        }
        fclose($fp);
        return $arrayD; //e devolvémolo

    }

    public static function obterPreguntas($ficheiro) {
        //Función que se encarga de ler o ficheiro csv e acumular os seus valores nun array bidimensional
        $arrayD = array(); 
        global $erro;
        if ($fp = fopen($ficheiro, 'r')) {
            while ($fila=fgetcsv($fp,1000, ',')) { //Mentres existan valores que ler
                $pregunta = new Pregunta($fila[0],$fila[1],$fila[2],$fila[3]);
                $arrayD[] = $pregunta; //engadimos a fila ao arrayD que creamos na función
            }
        } else {
            $erro[] = 'O ficheiro non puido ser aberto';
        }
        fclose($fp);
        return $arrayD; //e devolvémolo

    }


}
?>
