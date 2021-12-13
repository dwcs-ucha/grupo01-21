<?php
/*
*
*Clase Log
*@autor: Pablo Vázquez Pereiro
*@version: 1.00.00
*
*/

    class Log {
        private $usuario;
        private $mensaje;
        private $fecha;

        public function __construct($usuario, $mensaje){
            $this->$fecha = date("r");
            $this->$usuario = $usuario;
            $this->$mensaje = $mensaje;
            $ddf = fopen('../log/log.txt','a'); 
            fwrite($ddf,'[' . $fecha . '] ' . $usuario . ' ' . $mensaje . '\r\n'); 
            fclose($ddf); 
        } 
    }

?>