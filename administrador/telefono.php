<?php
session_start();
if (!$_SESSION['usuario']) {
    header("location: login.php");

}
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Administrador de teléfono</title>
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
    $telefono="";
    require('clases/conexion.php');
require('clases/telefono.class.php');
$base = new BaseDeDatosmysqli("localhost","elturqui_admin","rionegro","elturqui_agencia");
$tel = new telefono($base);
if (isset($_GET['editar'])) {
    $ID=$_GET['id'];
    $editar = $tel->getOneTelefono($ID);
$id=$editar[0]['id_tel'];
$telefono=$editar[0]['telefono'];
}
if (isset($_GET['edit'])) {
    $id=$_POST['id'];
    $telefono=$_POST['telefono'];
$tel->editar($id,$telefono);
if ($tel) {
    ?>
    <div class="alert alert-info" role="alert">
<strong>Se a editado con éxito</strong>
</div>
<?php
header("location: telefono.php");
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
        $tel->eliminar($id);
        if ($tel) {
            ?>
            <div class="alert alert-info" role="alert">
        <strong>Se a editado con éxito</strong>
        </div>
        <?php
        header("location: telefono.php");
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
<form class="form-inline" action="<?php if (isset($_GET['editar'])) { ?>telefono.php?edit<?php } else { ?>telefono.php<?php } ?>" method="POST">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <div class="form-group">
      <label for="">Número telefónico</label>
      <input type="tel"
        class="form-control" name="telefono" title="Recuerde introducir el cod de área (+54 para Argentina)" value="<?php echo $telefono; ?>" id="" aria-describedby="helpId" placeholder="Introduzca un celular">
    </div>
<button type="submit" name="enviar" class="btn btn-primary">Listo</button>
</form>
<?php      
if (isset($_POST['enviar']) && !isset($_GET['edit'])) {
    $telefono=$_POST['telefono'];
    $tel->insertar_telefono($telefono);
if ($tel) {
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
    <h3>Números de teléfono</h3>
    <?php
    $consulta = $tel->getTelefonos();
    if ($consulta) {
        for ($i=0;$i<count($consulta);$i++) {
            echo '<p>'.$consulta[$i]['telefono'].'</p>';
        echo '<a href="telefono.php?editar&id='.$consulta[$i]['id_tel'].'">Editar celular</a>';
        echo '<a href="telefono.php?eliminar&id='.$consulta[$i]['id_tel'].'">Eliminar celular</a>';
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