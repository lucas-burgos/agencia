<header class="row">
<ul class="nav justify-content-center">
    <li class="nav-item">
        <a class="nav-link active" href="index.php"><i class="fas fa-home    "></i> Inicio</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="novedades.php"> <i class="fas fa-info-circle    "></i> Novedades</a>
    </li>
<?php if($_SESSION['nivel'] == 'administrador') { ?>
    <li class="nav-item">
        <a class="nav-link" href="usuarios.php"><i class="fas fa-user    "></i> Usuarios</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="contenidos.php"> <i class="fas fa-info-circle    "></i> Configuración de la página</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="telefono.php"><i class="fas fa-whatsapp"></i> Configuración del celular para whatsapp</a>
    </li>
<?php } ?>
    <li class="nav-item">
        <a class="nav-link" href="unlogin.php"><i class="fas fa-user-lock"></i> Cerrar sessión</a>
    </li>
</ul>


</header>