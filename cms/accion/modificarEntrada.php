<!DOCTYPE html>
<?php
    /*
    *
    *Modificar entrada
    *@autor: Daniel Rivas Arévalo
    *@version: 1.00.00
    *
    */
    include '../../menu.php';
    include '../clases/Entrada.class.php'; //clase Entrada
    include '../clases/DAO.class.php'; //clase DAO
    linksRuta();
    $arrayCSV = DAO::obterEntradas('../csv/entradas.csv'); //array de entradas
    $autor = 'admin'; //Recoge el valor de la variable de sesión de usuario 
    $cod = $_GET['id'];
    
    for ($i=0; $i<=count($arrayCSV); $i++) {
        if ($arrayCSV[$i]->codigo == $_GET['id']) break; //si coincide con el codigo, rompemos el bucle y nos quedamos con esa posición de $arrayCSV[$i]
    } 
    ?>
    <script src="../ckeditor/ckeditor.js"></script>
</head>
<body>
    <?php menuRuta(); ?>
    <form action="./modificarEntrada.php?id=<?php echo $cod; ?>" method="post" enctype="multipart/form-data">
        <h1>Modificar entrada</h1>
        <h2>Título</h2>
        <input type="text" name="titulo" value="<?php echo $arrayCSV[$i]->titulo; ?>">
        <h2>Entrada</h2>
        <textarea name="contenido" id="editor"><?php  echo file_get_contents($arrayCSV[$i]->ruta); ?>
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
        $arrayCSV[$i] = $entrada;  //guardamos en el array de entradas en la posición del código
        DAO::escribirEntradas('../csv/entradas.csv', $arrayCSV); 
        header('Location: ../vistas/blog.php');
    }
    piePagina();
    scriptRuta();
?>
</body>
</html>