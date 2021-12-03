<?php
    Class Correo{
        private static $cabecera="From: contacto@uchatech.es\r\n";
        
        public static function enviarCorreo($destinatario, $asunto, $mensaje) {
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            if(is_array($destinatario)) //Comprobamos si el destinatario es un array
                $destinatario=implode(",", $destinatario); //De serlo, lo convertimos en un array que divimos por comas
            $mensaje=str_replace("<br/>","\n",$mensaje); //En el mensaje sustituímos los <br/> por \n para que se produzcan saltos de línea
            self::$cabecera.="Bcc: $destinatario\r\n";
            mail($destinatario,$asunto,$mensaje, self::$cabecera); //Llamamos a la función mail para enviar el correo
            echo "El email se ha enviado correctamente";
        }
    }
?>