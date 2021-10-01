<?php
session_start();
if (!$_SESSION['usuario']) {
    header("location: login.php");

}
function clean($string) {
  // Reemplaza todos los espacios por el dash
  // y convierte el nombre en minúscula
  $string = str_replace(' ', '-', strtolower($string));
  // Con preg_replace usamos una expresión regular
  // para eliminar todos los caracteres que no
  // sean letras y números normales.
  return preg_replace('/[^.A-Za-z0-9\-]/', '', $string);

}
$id="";
$titulo="";
$descripcion_logo="";
$descripcion_pagina="";
$sobre_nosotros="";
require('clases/conexion.php');
require('clases/contenidos.class.php');
$base = new BaseDeDatosmysqli("localhost","elturqui_admin","rionegro","elturqui_agencia");
$contenidos= new contenidos($base);
if (isset($_GET['editar'])) {
    $ID=$_GET['id'];
    $editar = $contenidos->getOneContenido($ID);
$id=$editar[0]['id_cont'];
$titulo=$editar[0]['titulo'];
$descripcion_pagina=$editar[0]['descripcion_pagina'];
$descripcion_logo=$editar[0]['descripcion_logo'];
$sobre_nosotros=$editar[0]['sobre_nosotros'];
}
if (isset($_GET['edit'])) {
  if ($_FILES['logo']['name'] != null) {    
    if(is_uploaded_file($_FILES['logo']['tmp_name'])) { // verifica haya sido cargado el archivo
$logo=clean($_FILES['logo']['name']);
        $ruta='../img/'.$logo;
        move_uploaded_file($_FILES['logo']['tmp_name'], $ruta);
            if(move_uploaded_file($_FILES['logo']['tmp_name'], $_FILES['logo']['name'])) { // se coloca en su lugar final
            }
    }
$logo;
}else{
echo 'Hubo un error en la carga de la imagen';
}
$id=$_POST['id'];
$titulo=$_POST['titulo'];
    $descripcion_pagina=$_POST['descripcion_pagina'];
    $descripcion_logo=$_POST['descripcion_logo'];
    $sobre_nosotros=$_POST['sobre_nosotros'];
$contenidos->editar($id,$titulo,$descripcion_pagina,$descripcion_logo,$logo,$sobre_nosotros);
if ($contenidos) {
    header("location: contenidos.php");
    ?>
    <div class="alert alert-info" role="alert">
<strong>Se a editado con éxito</strong>
</div>
<?php
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
        $contenidos->eliminar($id);
        if ($contenidos) {
            ?>
            <div class="alert alert-info" role="alert">
        <strong>Se a editado con éxito</strong>
        </div>
        <?php
        header("location: contenidos.php");
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
<!doctype html>
<html lang="es">
  <head>
    <title>Administrador de contenidos</title>
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
      <form class="form-inline" action="<?php if (isset($_GET['editar'])) { ?>contenidos.php?edit<?php } else { ?>contenidos.php<?php } ?>" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id; ?>">    
<div class="form-group">
      <label for="">Título de la página</label>
      <input type="text" value="<?php echo $titulo; ?>"
        class="form-control" name="titulo" id="" aria-describedby="helpId" placeholder="Introduzca un título">
    </div>
<div class="form-group">
  <label for="">Descripción de la página</label>
  <input type="text" value="<?php echo $descripcion_pagina; ?>"
    class="form-control" name="descripcion_pagina" id="" aria-describedby="helpId" placeholder="Introduzca una descripción o presentación de su página">
</div>
<div class="form-group">
  <label for="">Suba el logo de su página</label>
  <input type="file" class="form-control-file" name="logo" id="" placeholder="" aria-describedby="fileHelpId">
</div>
<div class="form-group">
  <label for="">Describa su logo</label>
  <input type="text" value="<?php echo $descripcion_logo; ?>"
    class="form-control" name="descripcion_logo" id="" aria-describedby="helpId" placeholder="">
</div>
<div class="form-group">
  <label for="">Texto para la sección Sobre Nosotros</label>
  <textarea class="form-control" name="sobre_nosotros" id="" rows="3"><?php echo $sobre_nosotros; ?></textarea>
</div>
<button type="submit" name="enviar" class="btn btn-primary">Listo</button>
</form>
<?php      
if (isset($_POST['enviar']) && !isset($_GET['edit'])) {
    $titulo=$_POST['titulo'];
    $descripcion_pagina=$_POST['descripcion_pagina'];
    $descripcion_logo=$_POST['descripcion_logo'];
    $sobre_nosotros=$_POST['sobre_nosotros'];
    if ($_FILES['logo']['name'] != null) {    
        if(is_uploaded_file($_FILES['logo']['tmp_name'])) { // verifica haya sido cargado el archivo
$logo=clean($_FILES['logo']['name']);
            $ruta='../img/'.$logo;
            move_uploaded_file($_FILES['logo']['tmp_name'], $ruta);
                if(move_uploaded_file($_FILES['logo']['tmp_name'], $_FILES['logo']['name'])) { // se coloca en su lugar final
                }
        }
$logo;
    }else{
echo 'Hubo un error en la carga de la imagen';
}
$contenidos->insertar_contenido($titulo,$descripcion_pagina,$descripcion_logo,$logo,$sobre_nosotros);
if ($contenidos) {
?>
<div class="alert alert-info" role="alert">
<strong>La carga a sido un éxito</strong>
</div>
<?php
}
else{
?>
<div class="alert alert-warning" role="alert">
    <strong>A ocurrido un errorg>
</div>
<?php
}
}
?>
<div class="row">
<div class="col-lg-1-12">
    <h3>Información de la página</h3>
    <?php
    $consulta = $contenidos->getContenidos();
    for ($i=0;$i<count($consulta);$i++) {
        echo '<p>'.$consulta[$i]['titulo'].'</p>';
        echo '<p>'.$consulta[$i]['descripcion_pagina'].'</p>';
        echo '<p>'.$consulta[$i]['sobre_nosotros'].'</p>';
        echo '<a href="contenidos.php?editar&id='.$consulta[$i]['id_cont'].'">Editar información</a>';
        echo '<a href="contenidos.php?eliminar&id='.$consulta[$i]['id_cont'].'">Eliminar información</a>';
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