<?php
/*
*
*Clase Log
*@autor: Pablo Vázquez Pereiro
*@version: 1.00.00
*
*/

    class Log {

        public static function logLogin($mensaje){
            
            $usuario = $_SESSION['usuario'];
            $fecha = date("r");
            $ddf = fopen('../log/log.log','a'); 
            fwrite($ddf,'[' . $fecha . '] ' . $usuario->getNombreUsuario() . ' ' . $mensaje . "\r\n"); 
            fclose($ddf);
        } 

        public static function logNuevo($mensaje){
            
            global $usuario;
            $fecha = date("r");
            $ddf = fopen('../log/log.log','a'); 
            fwrite($ddf,'[' . $fecha . '] ' . $usuario->getNombreUsuario() . ' ' . $mensaje . "\r\n"); 
            fclose($ddf);
        }

        public static function logCMS($mensaje){
            
            global $usuario;
            $fecha = date("r");
            $ddf = fopen('../../log/log.log','a'); 
            fwrite($ddf,'[' . $fecha . '] ' . $usuario->getNombreUsuario() . ' ' . $mensaje . "\r\n"); 
            fclose($ddf);
        }
    }

?>