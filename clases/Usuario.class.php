<?php
/*
*
*Clase Usuario
*@autor: Marcos
*@version: 1.00.00
*
*/
    class Usuario{
        private $nombreUsuario;
        private $contraseña;        
        private $rol;
        private $email;
        private $activado;
        private $puntuacion;

        public function getNombreUsuario() {
            return $this->nombreUsuario;
        }

        public function getContraseña() {
            return $this->contraseña;
        }

        public function getRol() {
            return $this->rol;
        }

        public function getEmail() {
            return $this->email;
        }
        public function getActivado(){
            return $this->activado;
        }
        public function getPuntuacion(){
            return explode('-', $this->puntuacion);
        }
        public function getPuntuacionString(){
            return $this->puntuacion;
        }
        public function setPuntuacion($puntuacion){
            return $this->puntuacion = $puntuacion;
        }

        public function __construct($nombreUsuario, $contraseña, $rol, $email, $activado, $puntuacion) {
            $this->nombreUsuario = $nombreUsuario;
            $this->contraseña = $contraseña;
            $this->rol = $rol;
            $this->email = $email;
            $this->activado = $activado;
            $this->puntuacion = $puntuacion;
        }



    }

?>
