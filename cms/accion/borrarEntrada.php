<?php
    /*
    *
    *Borrar entrada
    *@autor: Daniel Rivas Arévalo
    *@version: 1.00.00
    *
    */
    include '../../menu.php';
if (!isset($_SESSION['usuario'])) { //No caso de que o usuario non estea identificado:
    die("<p>Error - debe <a href='index.php'>identificarse</a>.</p>");
}
else if($usuario->getRol()!='administrador') {
    die("<p>Error - No tiene acceso a esta página.</p>");
}
else {
    include '../clases/Entrada.class.php'; //clase Entrada
    include '../../clases/DAO.class.php'; //clase DAO
    Log::logCMS('ha eliminado una entrada en el blog');//añadimos al log el movimiento
    $arrayCSV = DAO::obterEntradas('../csv/entradas.csv'); //array de entradas
    for ($i=0; $i<=count($arrayCSV); $i++) {
        if ($arrayCSV[$i]->codigo == $_GET['id']) unset($arrayCSV[$i]);
    } //si encontramos la posición del array de objetos entrada que tiene como código el que le pasamos por $_GET, lo eliminamos del array. 
    DAO::escribirEntradas('../csv/entradas.csv', $arrayCSV); //escribimos de nuevo en el fichero
    header('Location: ../vistas/blog.php'); //devolvemos a la página
}
?>
