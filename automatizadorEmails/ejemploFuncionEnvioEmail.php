<?php
    //Esto es un ejemplo de lo que deberías de hacer para poder enviar correos correctamente usando el objeto Correo

    //Incluímos la clase al principio de la página
    include_once("Correo.class.php");

    //Si quieres enviarle el correo a varios destinatarios, guardarlos en un array que pasarás como parámetro cuando llames a la función al final
    //$destinatario=array("correoprueba@gmail.com", "ejemplo@gmail.com");

    //Si solo es un destinatario sería más sencillo
    $destinatario="correoprueba@gmail.com";

    //Debes crear una variable con el asunto del correo que quieres enviar
    $asunto="Asunto de prueba";

    //Crea también una variable para guardar el mensaje que quieres enviar
    //IMPORTANTE: A la hora de escribir el mensaje tienes que redactarlo en html, para así poder introducir links o botones como en la siguiente línea
    $mensaje="Haz clic para visitar nuestra página web del centro.<br/><br/><a href='https://cifprodolfoucha.es/'>
    <button style='padding: 10px; font-size: 15px; font-weight: bold; background-color: #0099ff; color: white; border-radius: 50px;'>Página web del centro</button>
    </a><br/><br/>Muchas gracias,<br/>TechUcha.";

    //Si quieres mandar algún archivo adjunto podrás hacerlo de dos formas, dependiendo de la cantidad que quieras mandar
    //Si solo quieres mandar uno puedes hacerlo así (asegurate de poner bien la ruta del fichero e introdúcela correctamente, acuerdate que tiene que estar guardado en el servidor)
    //IMPORTANTE: Si quieres enviar una imagen asegurate de que sea un JPG o JPEG, si envias un PNG el correo se enviará 2 veces a causa de un error
    $fichero="archivo.pdf";

    //Si quieres mandar varios tendrás que crear un array de esta forma
    //$fichero=array("./archivo1.jpg", "./archivo2.pdf");

    //IMPORTANTE: Si no quieres enviar ningún archivo escribe esto
    //$fichero=null;

    //Finalmente llamas a la función de esta forma pasándole los parámetros en este orden
    Correo::enviarCorreo($destinatario, $asunto, $mensaje, $fichero);
?>