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
}


?>