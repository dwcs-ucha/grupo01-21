<?php 
    /*
    *
    *Clase Tutorial
    *@autor: Daniel Rivas Arévalo
    *@version: 1.00.00
    *
    */

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

    //añadirPuntuacion(): se encarga de actualizar la puntuación que el recibe el usuario de su test del tutorial pasándole dos parametros:
    //$cod: código del tutorial en csv de tutoriales
    //$puntos: puntuación obtenida en el test del tutorial
    public static function añadirPuntuacion($cod, $puntos) {
        global $usuario;
        global $error;
        $nav= $_SERVER['DOCUMENT_ROOT'] . "/grupo01-21/";
        $arrayUsuarios = DAO::obtenerUsuarios($nav . 'login-registro/csv/usuarios.csv'); //obtenemos el array de usuarios para poder escribir en el
        $puntuaciones = $usuario->getPuntuacion(); //obtenemos las puntuaciones en array del usuario en sesión:
                                                //getPuntuacion() pasa de string a array las puntuaciones
            for ($i=1; $i<=count($puntuaciones); $i++) { //bucle for de codigos de tutorial
                if($i == $cod) { //si el contador es igual al codigo del tutorial
                    if($puntuaciones[$i]<=$puntos) { //y si las puntuaciones en esa posición son menores o iguales a la obtenida 
                        $puntuaciones[$i] = $puntos; //actualizamos la puntuación
                    } else { //en caso contrario mandamos un error explicando que la puntuación del historial es mayor que la obtenida
                        $error[] = "Tu puntuación anterior en este ejercicio (" . $puntuaciones[$i] . " puntos) es superior a la actual.";
                    }
                } 
            }
        $puntuaciones = implode('-', $puntuaciones); //convertimos de nuevo a String
        $usuario->setPuntuacion($puntuaciones); //cambiamos el valo en el usuario en sesión (de forma contraria tendría que hacer logout y login)
        foreach ($arrayUsuarios as $usuarios) {
            if($usuarios->getNombreUsuario() == $usuario->getNombreUsuario()) {
                $usuarios->setPuntuacion($usuario->getPuntuacionString()); //cambiamos en el array de usuarios
            }
        }
        DAO::escribirUsuarios($nav . 'login-registro/csv/usuarios.csv', $arrayUsuarios); //y escribimos en él
    }
}


?>