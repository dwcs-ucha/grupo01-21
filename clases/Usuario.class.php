<?php
    class Usuario{
        private $nombreUsuario;
        private $contraseña;        
        private $rol;
        private $email;
        private $activado;
        public function getNombreUsuario() {
            return $this->nombreUsuario;
        }

        public function getContrasinal() {
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
        public function __construct($nombreUsuario, $contraseña, $rol, $email, $activado) {
            $this->nombreUsuario = $nombreUsuario;
            $this->contraseña = $contraseña;
            $this->rol = $rol;
            $this->email = $email;
            $this->activado = $activado;
        }



    }

?>
