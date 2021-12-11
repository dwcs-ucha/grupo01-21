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
    setcookie($cookieUsuario, $valorcookie, (time() + 86400), '/');
    array_push($fechas, $_SESSION['usuario']->getNombreUsuario() . " / " . $fechayHora);
    $stringFechas = implode(',', $fechas);
    setcookie('fechas', $stringFechas, (time() + 86400), '/');
} else {
    //Cookie encargada de las visitas (seguimiento)
    setcookie($cookieUsuario, 1, (time() + 86400), '/');
    setcookie('fechas', $_SESSION['usuario']->getNombreUsuario() . " / " . $fechayHora, (time() + 86400), '/');
}
