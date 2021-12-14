<?php

require_once('../clases/Validaciones.class.php');


class ValidacionesTest extends PHPUnit\Framework\TestCase{
    
    /** @test */
    public function testValidaciones(){
        $usuario = 'abrilyanhez';
        $this->assertEquals(Validaciones::validaUsuario('abrilyanhez'), 'abrilyanhez');

        $contraseña = '123Abcd';
        $this->assertEquals(Validaciones::validaContraseña('123Abcd'), '123Abcd');
        
        $nombre = 'Abril';
        $this->assertEquals(Validaciones::validaNombre('Abril'), 'Abril');

        $email = 'abril@gmailcom';
        $this->assertEquals(Validaciones::validaEmail('abril@gmailcom'), 'abril@gmail.com');
        
        $texto = 'Este es un test de prueba';
        $this->assertEquals(Validaciones::validaTexto('Este es un test de prueba'), 'Este es un test de prueba');
    }


}