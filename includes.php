<?php
require('administrador/clases/conexion.php');
require('administrador/clases/contenidos.class.php');
$base = new BaseDeDatosmysqli("localhost","sintonia_lucas","Dbzbt4","sintonia_agencia");
$contenidos= new contenidos($base);
$consulta = $contenidos->getContenidos();
?>