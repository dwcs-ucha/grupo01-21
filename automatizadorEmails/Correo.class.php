<?php
    Class Correo{
        private $cabecera="From: contacto@uchatech.es";
        
        public function enviarCorreo($destinatario, $asunto, $mensaje) {
            ini_set( 'display_errors', 1 );
            error_reporting( E_ALL );
            //$from = "Enviado por contacto@uchatech.es";
            //$asunto = "Correo de prueba";
            //$mensaje = "Hola buenas tardes.\n\nEste es un correo de prueba.\n\nMuchas gracias,\nÓscar.";
            $mensaje=str_replace("<br/>","\n",$mensaje);
            //$cabecera = $from;
            mail($destinatario,$asunto,$mensaje, $this->cabecera);
            echo "El email se ha enviado correctamente";
        }
    }
?>