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
        <title>Revise Email</title>
    </head>
    <body>
        <h4 style="color:green">Se le ha enviado un email de verificación, por favor compruebe su correo: <?php echo $_SESSION['email'];?></h4>
<?php
    }
    else{
        header("Location: ./login.php");
    }
?> 
    </body>
</html>