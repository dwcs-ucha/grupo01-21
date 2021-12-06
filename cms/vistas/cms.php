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
    linksRuta();
    $arrayCSV = DAO::obterEntradas('../csv/entradas.csv');
    $cod = 0;
    foreach ($arrayCSV as $entrada) {
        if ($entrada->codigo > $cod) $cod=$entrada->codigo; //buscamos el código más alto y lo asignamos a una variable llamada $cod
    }
    $cod++; //añadimos un valor al código más alto
    $autor = 'admin'; //Recoge el valor de la variable de sesión de usuario 
    $error = array();
    ?>
</head>
<body>
    <?php
    menuRuta(); ?>
    <form action="./cms.php" method="post" enctype="multipart/form-data">
        <h1>Nueva entrada</h1>
        <h2>Título</h2>
        <input type="text" name="titulo">
        <h2>Entrada</h2>
        <textarea name="contenido" id="editor">
        </textarea>
        <p><button type="submit" name="submit">Enviar</button></p>
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
        header('Location: ../vistas/blog.php'); //redirigimos a blog.php
    }
    piePagina();
    scriptRuta();
?>
</body>
</html>