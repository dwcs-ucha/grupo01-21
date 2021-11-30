<?php
    /*
    *
    *Borrar entrada
    *@autor: Daniel Rivas Arévalo
    *@version: 1.00.00
    *
    */

    include '../clases/Entrada.class.php'; //clase Entrada
    include '../clases/DAO.class.php'; //clase DAO
    $arrayCSV = DAO::obterEntradas('../csv/entradas.csv'); //array de entradas
    for ($i=0; $i<=count($arrayCSV); $i++) {
        if ($arrayCSV[$i]->codigo == $_GET['id']) unset($arrayCSV[$i]);
    } //si encontramos la posición del array de objetos entrada que tiene como código el que le pasamos por $_GET, lo eliminamos del array. 
    DAO::escribirEntradas('../csv/entradas.csv', $arrayCSV); //escribimos de nuevo en el fichero
    header('Location: ../vistas/blog.php'); //devolvemos a la página
?>
