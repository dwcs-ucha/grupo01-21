<?php
    /*
    *
    *Clase Pregunta
    *@autor: Daniel Rivas Arévalo
    *@version: 1.00.00
    *
    */
    /** CLASE PREGUNTA
     *  Se encarga de instanciar objetos que procesen información sobre las preguntas del examen **/
    class Pregunta {
        public $cod; //codigo de la pregunta
        public $enunciado; //enunciado de la pregunta
        public $respuesta; //respuesta(s) de la pregunta, guarda un String separado por guiones ("-") en el caso de ser múltiple
        public $tipo; //simple o multiple
        /** Constructor **/
        public function __construct($cod, $enunciado, $respuesta, $tipo){
            $this->cod = $cod;
            $this->enunciado = $enunciado;
            if ($tipo == 'multiple') { //en el caso de que sea múltiple, lo convertimos a Array
                $this->respuesta = explode('-', $respuesta);
            } else {
                $this->respuesta = $respuesta;
            }
            $this->tipo = $tipo;
        }
        /** Método error()
         * Se encarga de enviar un error con la respuesta válida en el caso de ser de tipo simple
         * múltiple en el caso de ser de tipo múltiple
         */
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