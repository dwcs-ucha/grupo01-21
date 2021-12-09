<?php

/*
*
*Borrar usuario
*@autor: Daniel Rivas Arévalo
*@version: 1.00.00
*
*/
session_start();
include("../clases/DAO.class.php");
include("../clases/Usuario.class.php");
$arrayCSV = DAO::obtenerUsuarios('./csv/usuarios.csv'); //array do CSV
unset($arrayCSV[$_GET['id']]); //borramos aquel usuario que estea na posición asignada
DAO::escribirUsuarios('./csv/usuarios.csv', $arrayCSV); //escribimos de novo o ficheiro
header("Location: ./gestionUsuarios.php"); //redireccionamos a usuarios.php
?>
