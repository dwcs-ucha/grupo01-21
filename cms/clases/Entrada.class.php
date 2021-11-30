<?php
    /*
    *
    *Clase Pregunta
    *@autor: Daniel Rivas Arévalo
    *@version: 1.00.00
    *
    */

    class Entrada {
        public $codigo;
        public $ruta;
        public $titulo;
        public $autor;
        public $fecha; 
        
        public function __construct($codigo, $ruta, $titulo, $autor, $fecha) {
            $this->codigo = $codigo;
            $this->ruta = $ruta;
            $this->titulo = $titulo;
            $this->autor = $autor;
            $this->fecha = $fecha;
        }

        public function guardarEntrada() {

        }
        
    }