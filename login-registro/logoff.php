<?php
/*
*
*Logoff
*@autor: Marcos
*@version: 1.00.00
*
*/
// Se recupera la sesión
 

 include("../menu.php");
 Log::logNuevo('ha cerrado la sesión');
 // Se elimina
 session_unset();
 // Y se redirige de nuevo al index
 header("Location: ../index.php");
?>