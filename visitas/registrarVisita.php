<?php
$cookieUsuario = "visitas";
$fechayHora = date('D d / F / Y / H:i:s');
 
if (isset($_COOKIE['fechas'])) {

    $fechas = explode(',', $_COOKIE['fechas']);
} else {

    $fechas = array();
}

if (!empty($_COOKIE[$cookieUsuario])) {

    $valorcookie = intval($_COOKIE[$cookieUsuario]) + 1;
    setcookie($cookieUsuario, $valorcookie);
    array_push($fechas, $_SESSION['usuario'] . " / " . $fechayHora);
    $stringFechas = implode(',', $fechas);
    setcookie('fechas', $stringFechas);
} else {
    //Cookie encargada de las visitas (seguimiento)
    setcookie($cookieUsuario, 1);
    setcookie('fechas', $_SESSION['usuario'] . " / " . $fechayHora);
}
