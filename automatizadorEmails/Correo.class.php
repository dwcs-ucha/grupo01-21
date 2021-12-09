<?php
    Class Correo{
        //Definimos un atributo estático para la cabecera
        private static $cabecera="MIME-VERSION: 1.0\r\n"."Content-type: multipart/mixed;"."boundary=\"=S=E=P=A=R=A=D=O=R=\"\r\n"."From: TechUcha <grupo012122dwcs@hl107.lucushost.org>"."\r\n";

        public static function enviarCorreo($destinatario, $asunto, $mensaje, $ficheros) { //Creamos la función para poder enviar correos
            ini_set( 'display_errors', 1 ); //Se encargará de los errores
            error_reporting( E_ALL );
            if(!is_array($destinatario)) //Comprobamos si el destinatario no es un array, que se dará el caso cuando solo se pase un destinatario
                $destinatario=array($destinatario); //Si es asi creamos un array con una sola posición para que no nos de problemas en el bucle

            if($ficheros!=null){ //Comprobamos si se quiere enviar algún archivo adjunto
                if(!is_array($ficheros)) //De haber algún fichero, comprobamos si no es un array, que se dará el caso cuando solo se pase un fichero
                    $ficheros=array($ficheros); //Si es asi creamos un array con una sola posición para que no nos de problemas en el bucle
            }

            //Mensaje de texto
            $cuerpo = "--=S=E=P=A=R=A=D=O=R=\r\n"; //Ponemos el separador para diferenciar las distintas partes del correo
            $cuerpo .= "Content-Type: text/html; charset=utf-8\r\n"; //Indicamos que tipo es
            $cuerpo .= "\r\n"; // Salto de línea
            $cuerpo .= $mensaje."\r\n";
            $cuerpo .= "\r\n";// Salto de línea

            //Archivos adjuntos
            if($ficheros!=null){
                foreach($ficheros as $fichero){
                    /*if(preg_match("/.png*$/", $fichero)){
                        $image = imagecreatefrompng($fichero);
                        $bg = imagecreatetruecolor(imagesx($image), imagesy($image));
                        imagefill($bg, 0, 0, imagecolorallocate($bg, 255, 255, 255));
                        imagealphablending($bg, TRUE);
                        imagecopy($bg, $image, 0, 0, 0, 0, imagesx($image), imagesy($image));
                        imagedestroy($image);
                        $quality = 50; // 0 = worst / smaller file, 100 = better / bigger file 
                        imagejpeg($bg, $fichero . ".jpg", $quality);
                        imagedestroy($bg);
                    }*/
                    $cuerpo .= "--=S=E=P=A=R=A=D=O=R=\r\n"; //Ponemos de nuevo el separador para indicar que termina la parte anterior y empieza otra con un contenido diferente
                    $cuerpo .= "Content-Type: application/octet-stream; "; //Declaramos el tipo
                    $cuerpo .= "name=" . $fichero . "\r\n";
                    $cuerpo .= "Content-Transfer-Encoding: base64\r\n";
                    $cuerpo .= "Content-Disposition: attachment; ";
                    $cuerpo .= "filename=" . $fichero . "\r\n";
                    $cuerpo .= "\r\n"; // Salto de línea

                
                    $fp = fopen($fichero, "rb"); //Abrimos el fichero que nos pasan
                    $file = fread($fp, filesize($fichero)); //Leemos del fichero el número de bytes indicados
                    $file = chunk_split(base64_encode($file)); //Se encarga de dividir una cadena en segmentos más pequeños
                    fclose($fp); //Cerramos el fichero

                    $cuerpo .= "$file\r\n"; //Incluimos el fichero en el cuerpo
                }
            }

            $cuerpo .= "\r\n"; // Salto de línea
            $cuerpo .= "--=S=E=P=A=R=A=D=O=R=--\r\n"; // Indicamos que aquí termina el mensaje
            
            //Hacemos un bucle for para recorrer el array de destinatarios y llamamos a la función mail para cada destinatario y mandarle un correo individual a cada uno
            foreach($destinatario as $para){
                mail($para,$asunto,$cuerpo,self::$cabecera); //Llamamos a la función mail para enviar el correo y le pasamos los parámetros necesarios
            }
        }
    }
?>