<?php
/*
*
*Vista Blog
*@autor: Daniel Rivas Arévalo
*@version: 1.00.00
*
*/
?>
<html>
<header>
    <?php 
    include '../../menu.php';
    include '../clases/Entrada.class.php';
    include '../clases/DAO.class.php';
    linksRuta(3); //Incluimos links de header para el estilo
    ?>
    <title>Blog - UchaTech</title>
</header>
<body>
    <?php    
    menuRuta(3); //Incluimos el menú en php
    $arrayCSV = DAO::obterEntradas('../csv/entradas.csv'); //obtenemos el array de entradas
    echo '<h1>Blog UchaTech</h1>';
    echo '<div class="container">';
    for ($i=count($arrayCSV)-1; $i>=0; $i--) { //por cada entrada que parta del código más alto hacia el menor queremos
        echo '<div><h2>' . $arrayCSV[$i]->titulo . '</h2>'; //imprimir el título
        echo '<span class="datos">Escrito por ' . $arrayCSV[$i]->autor . ' el ' . $arrayCSV[$i]->fecha . '</span>'; //añadir autor y fecha
        echo '<span class="contenido">' . file_get_contents($arrayCSV[$i]->ruta) . '</span>'; //imprimir en pantalla el contenido
        echo '<span><a href="../accion/modificarEntrada.php?id=' . $arrayCSV[$i]->codigo . '">Modificar</a><a href="../accion/borrarEntrada.php?id=' . $arrayCSV[$i]->codigo . '">Borrar</a></div>';
        //añadimos la función de modificar y borrar en el caso de que el usuario sea admin.
    }
    echo '</div>';
    scriptRuta(3);
?>

</body>