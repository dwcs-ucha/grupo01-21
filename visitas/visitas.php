<!DOCTYPE html>
<?php
/*
 *
 * Index
 * @autor: FranGB
 * @version: 1.00.00
 *Ultima Vez 11/12/2021
 */
?>
<html lang="es">

<head>
    <title>Visitas - UchaTech</title>
    <link rel="stylesheet" href="./css/estilo.css">
    <?php
    include '../clases/DAO.class.php';
    include '../menu.php';
    linksRuta(); //imprimimos en el header los links de estilo de Bootstrap

    ?>
</head>


<body>
    <?php
    menuRuta(); //Incluimos el menú en php (No funciona en casa)
    ?>

    <br><h1 id="titulo" align="center">Visitas</h1><br><br>
    <table align="center">
        <?php
        //Pone la cabecera de la tabla
        $cabecera = array('Usuario', 'día da semana', 'Mes do Ano', ' Ano ', 'Hora da visita');
        for ($i = 0; $i < count($cabecera); $i++) {
            echo '<th>' . $cabecera[$i] . '</th>';
        }

        //Se encarga de poner los campos
        if (isset($_COOKIE['fechas'])) {
            //Primero convierte la cookie en un array
            $fechas = explode(',', $_COOKIE['fechas']);
            for ($index = 0; $index < count($fechas); $index++) {
                //Segundo se divide en partes de la fecha dentro del array
                $fechaPartida = explode('/', $fechas[$index]);
                echo '<tr>'; 
                //Se muestra de una forma más ordenada
                for ($index1 = 0; $index1 < count($fechaPartida); $index1++) {
                    echo '<td>' . $fechaPartida[$index1] . '</td>';
                }
                echo '</tr>';
            }
        ?>
    </table>
<?php
        }
?>

<?php piePagina();
scriptRuta(); ?>
</body>

</html>
