<?php
session_start();
if (!$_SESSION['usuario']) {
    header("location: login.php");

}
include ('clases/conexion.php');
    include('clases/usuarios.class.php');
    include('clases/clsFiltroSql.php');
    include('clases/password.php');
$con=mysqli_connect("localhost","sintonia_lucas","Dbzbt4","sintonia_agencia");    
    $filtro = new clsFiltroSql($con);
    
    $base = new BaseDeDatosmysqli("localhost","sintonia_lucas","Dbzbt4","sintonia_agencia");
    $us = new usuarios($base);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Administrador de usuarios</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
</head>
  <body>
<div class="container">
<div class="row">
    <div class="col-lg-1-12">
    <h3>Administrador de usuarios</h3>
    <?php include('cavecera.php'); ?>
<?php
    $id="";
    $usuario="";
$clave="";
if (isset($_GET['editar'])) {
    $ID=$_GET['id'];
    $editar = $us->getOneUsuario($ID);
$id=$editar[0]['id_us'];
$usuario=$editar[0]['usuario'];

}
if (isset($_GET['edit'])) {
    $id=$_POST['id'];
    $_POST = $filtro->filtrar($_POST);
    
    $usuario=$filtro->filtrar($_POST['usuario']);
$clave=$_POST['clave'];
    $clave2=password_hash($clave, PASSWORD_DEFAULT, array('cost'=> 4));
    
$us->editar($id,$usuario,$clave2);
if ($us) {
    ?>
    <div class="alert alert-info" role="alert">
<strong>Se a editado con éxito</strong>
</div>
<?php
header("location: usuarios.php");
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
        $us->eliminar($id);
        if ($us) {
            ?>
            <div class="alert alert-info" role="alert">
        <strong>Se a editado con éxito</strong>
        </div>
        <?php
        header("location: usuarios.php");
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
    <div class="container">
            <form action="<?php if (isset($_GET['editar'])) {?>usuarios.php?edit<?php } else {?>usuarios.php<?php } ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $id; ?>">    
            <div class="form-group row">
                    <label for="inputName" class="col-sm-1-12 col-form-label">Introduce tu mail</label>
                    <div class="col-sm-1-12">
                        <input type="mail" class="form-control" name="usuario" id="inputName" placeholder="Introduce el usuario" value="<?php echo $usuario; ?>">
                    </div>
                </div>
<div class="form-group">
  <label for="" class="col-sm-1-12 col-form-label">Introduce tu contraseña</label>
  <input type="password" class="form-control" name="clave" id="" placeholder="Introduce tu contraseña" value="<?php echo $clave; ?>">
</div>
                <div class="form-group row">
                    <div class="offset-sm-2 col-sm-10">
                        <button name="enviar" type="submit" class="btn btn-primary"><i class="fa fa-registered" aria-hidden="true"> </i> Registrar</button>
                    </div>
                </div>
            </form>
        </div>
        <?php
if (isset($_POST['enviar']))
{
        
    $_POST = $filtro->filtrar($_POST);
    
    $usuario=$filtro->filtrar($_POST['usuario']);
$clave=$_POST['clave'];
    $clave2=password_hash($clave, PASSWORD_DEFAULT, array('cost'=> 4));

$us->insertar_usuario($usuario,$clave2);
if ($us) {
    echo 'Usuario registrado correctamente';
}
else {
    echo 'hubo un error en la carga del usuario';
}


}
?>
    </div>
</div>
<div class="row">
    <div class="col-lg-1-12">
        <h3>Lista de usuarios</h3>
        <?php
$us->getUsuarios();
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