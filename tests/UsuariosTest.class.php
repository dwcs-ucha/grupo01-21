<?php

require_once('../clases/Usuario.class.php');

class UsuariosTest extends PHPUnit\Framework\TestCase{
    
    /** @test */
    public function testUsuario(){
        $usuario = new Usuario('Abril','123Abc.','Administrador', 'abrildarribagmail@.com','true','0-0-0-0-0');
        $this->assertEquals($usuario->puntuacionTotal(),0);
    }

}

