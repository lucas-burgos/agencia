<?php 
require('administrador/clases/loterias.class.php');
require('administrador/clases/simple_html_dom.php');

$sorteo = new loterias();
$sorteo->nacional('https://www.tujugada.com.ar/quiniela-nacional.asp');
 ?>