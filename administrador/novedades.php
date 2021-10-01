<?php
session_start();
if (!$_SESSION['usuario']) {
    header("location: login.php");

}
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Administrador de novedades</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">  
</head>
  <body>
      <h3>Administrador de contenidos</h3>
      <?php include('cavecera.php'); ?>
<?php
    $id="";
    $titulo="";
    $novedad="";
    require('clases/conexion.php');
require('clases/novedades.class.php');
$base = new BaseDeDatosmysqli("localhost","elturqui_admin","rionegro","elturqui_agencia");
$novedades = new novedades($base);
if (isset($_GET['editar'])) {
    $ID=$_GET['id'];
    $editar = $novedades->getOneNovedades($ID);
$id=$editar[0]['id_novedad'];
$titulo=$editar[0]['titulo'];
$novedad=$editar[0]['novedad'];
}
if (isset($_GET['edit'])) {
    $id=$_POST['id'];
    $titulo=$_POST['titulo'];
    $novedad=$_POST['novedad'];
    $fecha=$_POST['fecha'];
$novedades->editar($id,$titulo,$novedad,$fecha);
if ($novedades) {
    ?>
    <div class="alert alert-info" role="alert">
<strong>Se a editado con éxito</strong>
</div>
<?php
header("location: novedades.php");
}
    else {
?>
<div class="alert alert-warning" role="alert">
    <strong>A ocurrido un error</strong>
</div>
<?php
}
}
if (isset($_GET['eliminar'])) {
    $id=$_GET['id'];
        $novedades->eliminar($id);
        if ($novedades) {
            ?>
            <div class="alert alert-info" role="alert">
        <strong>Se a editado con éxito</strong>
        </div>
        <?php
        header("location: novedades.php");
        }
            else {
        ?>
        <div class="alert alert-warning" role="alert">
            <strong>A ocurrido un error</strong>
        </div>
        <?php
        }
        }
?>
<form class="form-inline" action="<?php if (isset($_GET['editar'])) { ?>novedades.php?edit<?php } else { ?>novedades.php<?php } ?>" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-group">
      <label for="">Título de la Novedad</label>
      <input type="text"
        class="form-control" name="titulo" value="<?php echo $titulo; ?>" id="" aria-describedby="helpId" placeholder="Introduzca un título">
    </div>
<div class="form-group">
  <label for="">Texto de la novedad</label>
  <textarea class="form-control" name="novedad" id="" rows="3"><?php echo $novedad; ?></textarea>
</div>
<?php
if (isset($_GET['editar'])) {
    ?>
<div class="form-group">
  <label for="">Introduce una fecha</label>
<input type="datetime-local" name="fecha" id="fecha">
</div>
<?php
} ?>
<button type="submit" name="enviar" class="btn btn-primary">Listo</button>
</form>
<?php      
if (isset($_POST['enviar']) && !isset($_GET['edit'])) {
    $titulo=$_POST['titulo'];
$novedad=$_POST['novedad'];
    $novedades->insertar_novedades($titulo,$novedad);
if ($novedades) {
?>
<div class="alert alert-info" role="alert">
<strong>La carga a sido un éxito</strong>
</div>
<?php
}
else{
?>
<div class="alert alert-warning" role="alert">
    <strong>A ocurrido un error</strong>
</div>
<?php
}
}
?>
<div class="row">
<div class="col-lg-1-12">
    <h3>novedades</h3>
    <?php
    $consulta = $novedades->getNovedades();
    if ($consulta) {
        for ($i=0;$i<count($consulta);$i++) {
            echo '<h4>'.$consulta[$i]['titulo'].'</h4>';
            echo '<p>'.$consulta[$i]['fecha'].'</p>';
            echo '<p>'.$consulta[$i]['novedad'].'</p>';
        echo '<a href="novedades.php?editar&id='.$consulta[$i]['id_novedad'].'">Editar novedad</a>';
        echo '<a href="novedades.php?eliminar&id='.$consulta[$i]['id_novedad'].'">Eliminar novedad</a>';
                }
    }
?>
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