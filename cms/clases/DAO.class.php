<?php

class DAO {
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

}



?>