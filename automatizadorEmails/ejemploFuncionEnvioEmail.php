<?php
    //Incluímos la clase al principio de la página
    include_once("Correo.class.php");

    //Si tienes que enviarle el correo a varios destinatarios, guardarlos en un array que pasarás cuando llames a la función al final
    $destinatario=array("oscarmartinezlopez99@gmail.com", "frosty.oscar.9@gmail.com");

    //Si solo es un destinatario sería más sencillo
    //$destinatario="oscarmartinezlopez99@gmail.com";

    //Debes crear una variable con el asunto del correo que quieres enviar
    $asunto="Correo de prueba";

    //Crea también una variable para guardar el mensaje que quieres enviar
    //IMPORTANTE: si quieres hacer un salto de línea escribe <br/>, mira el ejemplo abajo
    $mensaje="Esto es un mensaje de prueba para comprobar que el método de la clase correo funciona correctamente<br/><br/>Muchas gracias,<br/>TechUcha.";

    //Finalmente llamas a la función de esta forma pasándole los parámetros en este orden
    Correo::enviarCorreo($destinatario, $asunto, $mensaje);
?>