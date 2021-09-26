<?php include('includes.php'); ?>
<!doctype html>
<html lang="es">
  <head>
  <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>
    <?php
    if (isset($_GET['quiniela']) && $_GET['quiniela'] == 'nacional') {
echo 'Quiniela de la ciudad';
    }
else if (isset($_GET['quiniela']) && $_GET['quiniela'] == 'provincia') {
echo 'Quiniela de la provincia de Buenos Aires';
}
else if (isset($_GET['quiniela']) && $_GET['quiniela'] == 'rionegro') {
echo 'Quiniela de Río Negro';
}
else if (isset($_GET['quiniela']) && $_GET['quiniela'] == 'neuquen') {
echo 'Quiniela de Neuquén';
}
    echo ' / '.$consulta[0]['titulo']; 
    ?> 
</title>
    <!-- Required meta tags -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">  
</head>
  <body>
<?php include('cavecera.php'); ?>
  <div class="row">
          <div class="col-lg-1-12">
          <h3>Sorteos</h3>
          <?php
require('administrador/clases/loterias.class.php');
require('administrador/clases/simple_html_dom.php');

$sorteo = new loterias();
if (isset($_GET['quiniela']) && $_GET['quiniela'] == 'nacional') {
    $juego= $sorteo->nacional('https://www.tujugada.com.ar/quiniela-nacional.asp');
}
else if (isset($_GET['quiniela']) && $_GET['quiniela'] == 'provincia') {
$juego = $sorteo->quiniela('https://www.tujugada.com.ar/quiniela_provincia_buenos_aires.asp');
}
else if (isset($_GET['quiniela']) && $_GET['quiniela'] == 'rionegro') {
$juego = $sorteo->quiniela('https://www.tujugada.com.ar/quiniela-rio-negro.asp');
}
else if (isset($_GET['quiniela']) && $_GET['quiniela'] == 'neuquen') {
$juego=$sorteo->quiniela('https://www.tujugada.com.ar/quiniela_neuquen.asp');
}
?>
                      </div>
      </div>
        </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
</body>
</html>