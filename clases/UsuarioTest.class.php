<?php

require_once('Usuario.class.php');

class UsuarioTest extends PHPUnit\Framework\TestCase {

    protected function setUp() {
        $this->usuario = new Usuario('usuario','', '', '','','');
    }
}


?>