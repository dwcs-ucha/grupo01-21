<!DOCTYPE html>
<?php
    /*
    *
    *Vista CMS
    *@autor: Daniel Rivas Arévalo
    *@version: 1.00.00
    *
    */
?>
<html>
<head>
    <title>Nueva entrada - UchaTech</title>
    <script src="../ckeditor/ckeditor.js"></script>
    <?php
    include '../clases/Entrada.class.php';
    include '../../clases/DAO.class.php';
    include '../../menu.php';
    include '../../automatizadorEmails/Correo.class.php';
if (!isset($_SESSION['usuario'])) { //No caso de que o usuario non estea identificado:
    die("<p>Error - debe <a href='index.php'>identificarse</a>.</p>");
}
else if($usuario->getRol()!='administrador') {
    die("<p>Error - No tiene acceso a esta página.</p>");
}
else {
    if(isset($_POST['titulo']) && isset($_POST['contenido']) && isset($_POST['submit'])) {
        header('Location: ./blog.php');
    }
    linksRuta();
    $arrayCSV = DAO::obterEntradas('../csv/entradas.csv');
    $cod = 0;
    foreach ($arrayCSV as $entrada) {
        if ($entrada->codigo > $cod) $cod=$entrada->codigo; //buscamos el código más alto y lo asignamos a una variable llamada $cod
    }
    $cod++; //añadimos un valor al código más alto
    $autor = $usuario->getNombreUsuario(); //Recoge el valor de la variable de sesión de usuario 
    $error = array();
    $valoresBlog = array (
        'nuevaEntrada' => 'Nueva entrada',
        'titulo' => 'Titulo',
        'entrada' => 'Entrada'
    );
    $valoresBlog = Idioma::cambiarIdioma($valoresBlog);
    ?>
</head>
<body class="bg-primary bg-opacity-50">
    <?php
    menuRuta(); ?>
    <div class="container p-4">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="my-4 text-center text-white"><?php echo $valoresBlog['nuevaEntrada'] ?></h1>
                </div>
            </div>
        </div>
    <form action="./cms.php" method="post" enctype="multipart/form-data">
    <div class="row m-4 border border-primary shadow-lg p-0 bg-light text-center">
    <div class="col-lg-12">
        <h2 class="p-2"><?php echo $valoresBlog['titulo'] ?></h2>
        <input type="text" name="titulo">
        <h2 class="p-2"><?php echo $valoresBlog['entrada'] ?></h2>
        <textarea name="contenido" id="editor">
        </textarea>
        <p><button class="btn btn-primary m-4" type="submit" name="submit">Enviar</button></p>
    </div>
    </div>  
    </form>
<script>
        CKEDITOR.replace('editor', {
            filebrowserUploadUrl: "../accion/upload.php"
        });
</script>
<?php 
    
    if(isset($_POST['titulo']) && isset($_POST['contenido']) && isset($_POST['submit'])) {
        //Guardamos la entrada en un archivo .html y en el csv que asocia la entrada a un índice
        $ruta = '../entradas/' . $cod . '.html'; //llevamos el archivo a la carpeta /entradas
        file_put_contents($ruta, $_POST['contenido']); //metemos el HTML en la ruta elegida
        //Gardamos o obxecto entrada no CSV de entradas
        $fecha = date("j/n/Y - g:i a");  //variable que guarda la fecha actual
        $entrada = new Entrada($cod, $ruta, $_POST['titulo'], $autor, $fecha); //creamos objeto de entrada
        $arrayCSV[] = $entrada;  //guardamos en el array de entradas
        DAO::escribirEntradas('../csv/entradas.csv', $arrayCSV);  //escribimos de nuevo el archivo
        $arrayUsuarios = DAO::obtenerUsuarios('../../login-registro/csv/usuarios.csv');
        $destinatarios = array();
        foreach ($arrayUsuarios as $usuarioDato) {
            $destinatarios[] = $usuarioDato->getEmail();
        }
        $fichero=null;
        $asunto='Nueva entrada de UchaTech: "' . $_POST['titulo'] . '"';
        Correo::enviarCorreo($destinatarios,$asunto, file_get_contents($ruta), $fichero);
    }
    piePagina();
    scriptRuta();
}
?>
</body>
</html>