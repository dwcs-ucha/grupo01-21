<?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "From: contacto@uchatech.es";
    $to = "oscarmartinezlopez99@gmail.com";
    $subject = "Correo de prueba";
    $message = "Hola buenas tardes.\n\nEste es un correo de prueba.\n\nMuchas gracias,\nÓscar.";
    $headers = $from;
    mail($to,$subject,$message, $headers);
    echo "The email message was sent.";
?>