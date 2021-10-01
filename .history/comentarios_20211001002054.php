<?php include('includes.php'); 
    require('administrador/clases/clsFiltroSql.php');
$con=mysqli_connect("localhost","elturqui_admin","rionegro","elturqui_agencia");    
    $filtro = new clsFiltroSql($con);

$id=$_GET['id'];
require('administrador/clases/novedades.class.php');
$novedades = new novedades($base);
$consulta = $novedades->getOneNovedades($id);

?>
<!doctype html>
<html lang="es">
  <head>
    <title><?php echo $consulta[0]['titulo']; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
</head>
  <body>
      <?php include('cavecera.php'); 
?>
  <h3><?php echo $consulta[0]['titulo']; ?></h3>
<p><?php echo $consulta[0]['fecha']; ?></p>
<p><?php echo $consulta[0]['novedad']; ?></p>
<h4>Comentarios en esta publicación</h4>
<p>Deja tu comentario</p>
<form action="comentarios.php?id=<?php echo $id; ?>" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>">
      Nombre: <br />
    <input type="text" name="nombre" /><br />
    e-mail: <br />
    <input type="text" name="email" /><br />
    Comentarios: <br />
    <textarea name="comentarios" cols="40" rows="4"></textarea><br />
    <input type="submit" value="Insertar comentario" />   
</form>
<?php
      require('administrador/clases/comentarios.class.php');
      $comentario1 = new Comentario($base);
      if (isset($_POST['nombre'])) {
        $_POST = $filtro->filtrar($_POST);
    
    
        $comentario1->insertar_comentario($_POST['id'], $filtro->filtrar($_POST['nombre']), $filtro->filtrar($_POST['email']), $filtro->filtrar($_POST['comentarios']));
          unset($_POST);
      }
      $comentario1->paginado(5,$id);
include('footer.php');
?>
          <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
</body>
</html>