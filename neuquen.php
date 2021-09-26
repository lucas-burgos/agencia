<?php 
require('administrador/clases/loterias.class.php');
require('administrador/clases/simple_html_dom.php');

$sorteo = new loterias();
$sorteo->premios('https://www.tujugada.com.ar/quiniela_neuquen.asp');
 ?>