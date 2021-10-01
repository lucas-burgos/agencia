<?php 
require('administrador/clases/loterias.class.php');
require('administrador/clases/simple_html_dom.php');
try {
$sorteo = new loterias();
$sorteo->nacional('https://www.tujugada.com.ar/quiniela-nacional.asp');
}
catch(Exception $e) {
print $e->getMessage();
}

 ?>