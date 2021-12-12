<?php
/*
    *
    *DAO
    *@autor: Jorge Seijoso González
    *@version: 1.00.00
    *
    */

class DAO {//Pasa las preguntas del CSV al array de objetos

    public static function obterPreguntas($ficheiro) {
        //Lee el fichero csv y acumula sus valores en un array bidimensional
        $arrayD = array(); 
        global $erro;
        if ($fp = fopen($ficheiro, 'r')) {
            while ($fila=fgetcsv($fp,1000, ',')) { 
                $pregunta = new Pregunta($fila[0],$fila[1],$fila[2],$fila[3]);
                $arrayD[] = $pregunta; 
            }
        } else {
            $erro[] = 'El fichero no pudo ser abierto';
        }
        fclose($fp);
        return $arrayD; //lo devolvemos

    }
}
?>