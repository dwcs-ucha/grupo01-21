<?php
   /*
    *Titulo: tutorial de Scratch
    *@autor: Borja Mosquera Fernández
    *@version: 1.00.00
    *fecha ultima modificacion: 04/12/2021
    */

?>
<?php

class DAO {
 /* Pasamos las preguntas del csv al array "preguntas" */

    public static function obterPreguntas($ficheiro) {
        //Función que se encarga de leer el ficheiro csv 
        $arrayD = array(); 
        global $erro;
        if ($fp = fopen($ficheiro, 'r')) {
            while ($fila=fgetcsv($fp,1000, ',')) { //Mientras hayan valores que leer
                $pregunta = new Pregunta($fila[0],$fila[1],$fila[2],$fila[3]);
                $arrayD[] = $pregunta; 
            }
        } else {
            $erro[] = 'EL fichero no se pudo abrir';
        }
        fclose($fp);
        return $arrayD; 
    }
}

?>
