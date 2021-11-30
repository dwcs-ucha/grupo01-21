<?php

class DAO {
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
}
?>