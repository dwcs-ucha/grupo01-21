<?php
/*
*
*Registrado
*@autor: Marcos
*@version: 1.00.00
*
*/
    session_start();
    include("../menu.php");
    if(isset($_POST['nombreUsuario'])){
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Revise Email</title>
    </head>
    <body>
        <h4 style="color:green">Email de verificación enviado a: <?php echo $_SESSION['email'];?></h4>
        
    </body>

</html>
<?php
    }
    else{
        header("Location: ./login.php");

    }
?>
