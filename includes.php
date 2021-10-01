<?php
require('administrador/clases/conexion.php');
require('administrador/clases/contenidos.class.php');
$base = new BaseDeDatosmysqli("localhost","elturqui_admin","rionegro","elturqui_agencia");
$contenidos= new contenidos($base);
$consulta = $contenidos->getContenidos();
?>