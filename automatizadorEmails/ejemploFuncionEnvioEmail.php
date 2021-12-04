<?php
    //Esto es un ejemplo de lo que deberías de hacer para poder enviar correos correctamente usando el objeto Correo

    //Incluímos la clase al principio de la página
    include_once("Correo.class.php");

    //Si quieres enviarle el correo a varios destinatarios, guardarlos en un array que pasarás como parámetro cuando llames a la función al final
    $destinatario=array("oscarmartinezlopez99@gmail.com", "frosty.oscar.9@gmail.com");

    //Si solo es un destinatario sería más sencillo
    //$destinatario="oscarmartinezlopez99@gmail.com";

    //Debes crear una variable con el asunto del correo que quieres enviar
    $asunto="Correo de prueba";

    //Crea también una variable para guardar el mensaje que quieres enviar
    //IMPORTANTE: si quieres hacer un salto de línea escribe <br/>, como en el ejemplo de la siguiente línea
    $mensaje="Esto es un mensaje de prueba para comprobar que el método de la clase Correo funciona correctamente.<br/><br/>Muchas gracias,<br/>TechUcha.";

    //Finalmente llamas a la función de esta forma pasándole los parámetros en este orden
    Correo::enviarCorreo($destinatario, $asunto, $mensaje);
?>