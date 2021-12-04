<?php
    Class Correo{
        //Definimos un atributo estático para la cabecera
        private static $cabecera="MIME-Version: 1.0"."\r\n"."Content-type: text/plain; charset=utf-8"."\r\n"."To: "."\r\n"."From: contacto@uchatech.es"."\r\n";

        public static function enviarCorreo($destinatario, $asunto, $mensaje) { //Creamos la función para poder enviar correos
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            if(!is_array($destinatario)) //Comprobamos si el destinatario no es un array, que se dará el caso cuando solo se pase un destinatario
                $destinatario=array($destinatario); //Si es asi creamos un array con una sola posición para que no nos de problemas en el bucle

            $mensaje=str_replace("<br/>","\n",$mensaje); //En el mensaje sustituímos los <br/> por \n para que se produzcan saltos de línea
            
            //Hacemos un bucle for para recorrer el array de destinatarios y llamamos a la función mail para cada destinatario y mandarle un correo individual a cada uno
            for($i=0; $i<count($destinatario); $i++){
                mail($destinatario[$i],$asunto,$mensaje, self::$cabecera); //Llamamos a la función mail para enviar el correo y le pasamos los parámetros necesarios
            }
        }
    }
?>