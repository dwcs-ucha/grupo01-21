<?php
/*
*
*Registrado
*@autor: Marcos y Óscar
*@version: 1.00.00
*
*/
    include("../menu.php");
    if(isset($_SESSION['nombreUsuario'])){
?>
<!DOCTYPE html>
<html>
    <head>
        <?php linksRuta(); ?>
        <title>Revise Email</title>
    </head>
    <body>
    <?php menuRuta(); ?>
        <h4 class="text-center" style="color:green">Se le ha enviado un email de verificación, por favor compruebe su correo: <?php echo $_SESSION['email'];?></h4>
<?php
    }
    else{
        header("Location: ./login.php");
    }
    piePagina(); scriptRuta();
?> 
    </body>
</html>