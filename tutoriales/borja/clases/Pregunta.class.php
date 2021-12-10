<?php
   /*
    *Titulo: tutorial de Scratch
    *@autor: Borja Mosquera Fernández
    *@version: 1.00.00
    *fecha ultima modificacion: 04/12/2021
    */

    class Pregunta {
        public $cod;
        public $enunciado;
        public $respuesta;
        public $tipo;

        public function __construct($cod, $enunciado, $respuesta, $tipo){
            $this->cod = $cod;
            $this->enunciado = $enunciado;
            if ($tipo == 'multiple') {
                $this->respuesta = explode('-', $respuesta);
            } else {
                $this->respuesta = $respuesta;
            }
            $this->tipo = $tipo;
        }

        public function error() {
            $error;
            if ($this->tipo == 'simple') { 
                $error = 'La respuesta correcta de la pregunta ' . $this->cod . ' es: ' . $this->respuesta;
            }
            else if($this->tipo == 'multiple') {
                $error = 'Las respuestas correctas de la pregunta ' . $this->cod . ' son: <br>';
                foreach ($respuesta as $valor) {
                    $error+= '$valor<br>';
                }
            }
            return $error;
        }
    }

?>
