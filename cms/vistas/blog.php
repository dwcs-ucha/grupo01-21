<!DOCTYPE html>
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
<head>
    <?php 
    include '../../menu.php';
    include '../clases/Entrada.class.php';
    include '../../clases/DAO.class.php';
    linksRuta(); //Incluimos links de header para el estilo
    ?>
    <title>Blog - UchaTech</title>
    <style>
        div p {
            text-align:justify;
        }
    </style>
</head>
<body class="bg-primary bg-opacity-50">
    <?php    
    menuRuta(); //Incluimos el menú en php
    $arrayCSV = DAO::obterEntradas('../csv/entradas.csv'); //obtenemos el array de entradas
    echo '<div class="container p-4">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="my-4 text-center text-white">Blog</h1>
                </div>
            </div>
        </div>';
    echo '<div class="container">';
    for ($i=count($arrayCSV)-1; $i>=0; $i--) { //por cada entrada que parta del código más alto hacia el menor queremos
        echo '<div class="row m-4 border rounded border-primary shadow-lg p-4 bg-light"><h2 class="text-dark text-center">' . $arrayCSV[$i]->titulo . '</h2>'; //imprimir el título
        echo '<hr class="color-primary m-2">';
        echo '<h6>Autor: ' . $arrayCSV[$i]->autor . '</h6><h6>Fecha: ' . $arrayCSV[$i]->fecha . '</h6>'; //añadir autor y fecha
        echo '<div class="col-lg-12">' . file_get_contents($arrayCSV[$i]->ruta) . '</div>'; //imprimir en pantalla el contenido
        if(isset($_SESSION['usuario']) && $usuario->getRol() == "administrador") {
            echo '<a class="col-lg-1 mx-auto" href="../accion/modificarEntrada.php?id=' . $arrayCSV[$i]->codigo . '"><button class="btn btn-primary">Modificar</button></a>
            <a class="col-lg-1 mx-auto" href="../accion/borrarEntrada.php?id=' . $arrayCSV[$i]->codigo . '"><button class="btn btn-danger">Borrar</button></a>';
        } //añadimos la función de modificar y borrar en el caso de que el usuario sea admin.
        echo '</div>';
    }
    echo '</div>';
    piePagina();
    scriptRuta();
?>

</body>
</html>