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
    <?php
    include '../clases/DAO.class.php';
    include '../menu.php';
    linksRuta(); //imprimimos en el header los links de estilo de Bootstrap

    ?>
</head>


<body class="bg-primary bg-opacity-50">
    <?php
    menuRuta(); //Incluimos el menú en php (No funciona en casa)
    ?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-12">
                <h1 class="my-4 text-center text-white">Visitas de usuarios</h1>
            </div>
        </div>
    </div>
    <div class="row m-4 border border-primary shadow-lg p-4 bg-light text-center">
    <div class="col-lg-12">
    <table class="table text-center">
        <?php
        //Pone la cabecera de la tabla
        $cabecera = array('Usuario', 'Día', 'Mes', ' Año ', 'Hora');
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
        </div>
        </div>
<?php
        }
?>

<?php piePagina();
scriptRuta(); ?>
</body>

</html>
