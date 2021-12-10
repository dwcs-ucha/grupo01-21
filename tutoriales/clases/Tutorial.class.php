<?php 

class Tutorial {
    public $cod;
    public $titulo;
    public $autor;
    public $ruta;
    public $img;

    public function __construct($cod, $titulo, $autor, $ruta, $img) {
        $this->cod = $cod;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->ruta = $ruta;
        $this->img = $img;    
    }

    public static function añadirPuntuacion($cod, $puntos) {
        global $usuario;
        $nav= $_SERVER['DOCUMENT_ROOT'] . "/grupo01-21/";
        $arrayUsuarios = DAO::obtenerUsuarios($nav . 'login-registro/csv/usuarios.csv');
        $puntuaciones = $usuario->getPuntuacion();
            for ($i=1; $i<=count($puntuaciones); $i++) {
                if($i == $cod) {
                    $puntuaciones[$i] = $puntos;
                }
            }
        $puntuaciones = implode('-', $puntuaciones);
        $usuario->setPuntuacion($puntuaciones);
        foreach ($arrayUsuarios as $usuarios) {
            if($usuarios->getNombreUsuario() == $usuario->getNombreUsuario()) {
                $usuarios->setPuntuacion($usuario->getPuntuacionString());
            }
        }
        DAO::escribirUsuarios($nav . 'login-registro/csv/usuarios.csv', $arrayUsuarios);
    }
}


?>