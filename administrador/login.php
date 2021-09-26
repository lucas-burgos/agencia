<?php
session_start();
require('clases/conexion.php');
require('clases/usuarios.class.php');
include('clases/clsFiltroSql.php');
include('clases/password.php');
$con=mysqli_connect("localhost","sintonia_lucas","Dbzbt4","sintonia_agencia");    
$filtro = new clsFiltroSql($con);

$base = new BaseDeDatosmysqli("localhost","sintonia_lucas","Dbzbt4","sintonia_agencia");
$us = new usuarios($base);
if (isset($_SESSION['usuario'])) {
    header("location: index.php");
}
?>
<!doctype html>
<html lang="es">

<head>
    <title>Inicio de sesión</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <h1>Inicio de sesión</h1>
    <form class="form-inline" action="login.php" method="POST">
        <div class="form-group">
            <label for="">Introduzca su usuario</label>
            <input type="email" class="form-control" name="usuario" id="" aria-describedby="emailHelpId" placeholder="Introduzca su Email">
        </div>
        <div class="form-group">
            <label for="">Introduzca su contraseña</label>
            <input type="password" class="form-control" name="clave" id="" placeholder="">
        </div>
        <button name="enviar" type="submit" class="btn btn-primary">Ingresar</button>
    </form>
    <?php
    if (isset($_POST['enviar'])) {
        $_POST = $filtro->filtrar($_POST);
    
        $usuario=$filtro->filtrar($_POST['usuario']);
    $clave=$_POST['clave'];
    $us->verificar_usuario($usuario,$clave);
if ($us) {
    header("location: index.php");
if ($usuario == 'lucasprogramador2020@gmail.com') {
$_SESSION['nivel'] = 'administrador';
}
else {
$_SESSION['nivel'] = 'editor';
}
}    
}
    ?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>