<?php
/*
*
*Menú
*@autor: Pablo Vázquez Pereiro y Daniel Rivas Arévalo
*@version: 1.00.00
*
*/

?>
<html>

<head>
    <style>
        .aviso {
            box-sizing:border-box;
            position:fixed;
            width:50%;
            height:25%;
            text-align: center;
            background-color: white;
            border: 4px solid orange;
            bottom:25%;
            top:65%;
            left: 25%;;
            right:25%;
            margin: 0 auto;
            z-index: 10;
            box-shadow: -3px 5px 23px rgba(87, 87, 87, 0.3)  ; 
            -webkit-box-shadow: -3px 5px 23px rgba(87, 87, 87, 0.3)  ; 
            -moz-box-shadow: -3px 5px 23px rgba(87, 87, 87, 0.2)  ;
        }

        p.avisoTexto {
            text-align: center;
            font-family:verdana;
            margin-top:10px;
        }

        input {
            margin-bottom: 10px
        }

    </style>
    <?php
    if (!isset($_COOKIE['aceptadas'])) {
        if (isset($_POST['aceptoCookies'])) {
          setcookie('aceptadas', 1, (time() + 86400), '/');
          header('Location: ./index.php');
        } 
      }
    ?>
<body>

<div class="aviso">
    <br>
    <form method="post" action="<?php echo $nav . "avisoCookies.php"?>">
    <p class="avisoTexto">Utilizamos cookies para mejorar tu experiencia en UchaTech</p>
    <input type="submit" name="aceptoCookies" class="btn btn-primary" value="Aceptar">
    </form>
</div>
</body>
</html>
