<?php
/*
*
*Clase Idioma
*@autor: Vanesa Lourido Rivas
*@version: 1.00.00
*
*/

class Idioma {

    public static function cambiarIdioma($arrayValores) {
        if (isset($_GET['idioma']) || isset($_COOKIE['idioma'])) {
            $idioma = "";
            if (isset($_GET['idioma']) && $_COOKIE['idioma']!=$_GET['idioma']){
                setCookie('idioma', $_GET['idioma']);
                $idioma=$_GET['idioma'];
            } else {
                $idioma= $_COOKIE['idioma'];
            }
            $arrayIdioma = DAO::leerCSV($_SERVER['DOCUMENT_ROOT']. '/grupo01-21/multiidioma/csv/' . $idioma .'.csv');
            foreach ($arrayIdioma as $fila) {
                foreach ($arrayValores as $nome=>$valor) {
                    if($fila[0] == $nome){
                        $arrayValores[$nome] = $fila[1];
                    }
                }
            }
        }
        return $arrayValores;
    }
}

?>