<?php
require('administrador/clases/telefono.class.php');
$tel = new telefono($base);    
$celular= $tel->getTelefonos();
?>
<div class="container">
        <header class="row">
<div class="col-md-12 col-xs-1-12">
  <h1><?php echo $consulta[0]['titulo']; ?> "<small class="text-muted"><?php echo $consulta[0]['descripcion_pagina']; ?></<small>"</h1>
</div>
<div class="text-center col-lg-12 col-md-12 col-sm-12" style="color: red;">
  <nav class="navbar navbar-expand-lg" style="background-color: #90EE90;">
  <a class="navbar-brand" href="#">
      <img src="img/<?php echo $consulta[0]['logo']; ?>" alt="<?php echo $consulta[0]['descripcion_logo']; ?>" width="50" height="70">
    </a>
  <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
          aria-expanded="false" aria-label="Menú principal"></button>
      <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
              <li class="nav-item active">
                  <a class="nav-link" href="index.php"><i class="fas fa-home    "></i> Inicio</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="index.php?action=sobrenosotros"><i class="fas fa-info    "></i> Sobre nosotros</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Juegos</a>
                  <div class="dropdown-menu" aria-labelledby="dropdownId">
                      <a class="dropdown-item" href="juegos.php?juego=quini">Quini-6</a>
                      <a class="dropdown-item" href="juegos.php?juego=telequino">Telequino</a>
                      <a class="dropdown-item" href="juegos.php?juego=brinco">Brinco</a>
                      <a class="dropdown-item" href="juegos.php?juego=loto5">Loto-5</a>
                      <a class="dropdown-item" href="juegos.php?juego=loto">Loto</a>
                                                          </div>
              </li>
              <li class="nav-item">
              <a class="nav-link" href="https://api.whatsapp.com/send?phone=<?php echo $celular[0]['telefono']; ?>"><i class="fas fa-whatsapp-square"></i> Jugate un número!</a>
            </li>
              <li class="nav-item">
              <a class="nav-link btn btn-primary btn-lg" data-toggle="modal" href="#modelId">
<i class="fas fa-inbox"></i> Contacto
</a>

<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contacto</h5>
            </div>
            <div class="modal-body">
            <div class="row">
    <script type="text/javascript" src="js/app.js"></script>
    <script async src="https://www.google.com/recaptcha/api.js"></script>
                    <form name="formulario_contacto" id="formulario_contacto" enctype="multipart/form-data">

                        <div class="form-group">
                            <label for="nya" class="txt_negrita">Nombres y Apellidos</label>
                            <input type="text" class="form-control" name="nya" id="nya" aria-describedby="nyaHelp">
                            <small id="nyaHelp" class="form-text text-muted">Ejemplo: Jose Juan Perez Diaz</small>
                        </div>

                        <div class="form-group">
                            <label for="email" class="txt_negrita">Email</label>
                            <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
                            <small id="emailHelp" class="form-text text-muted">Ejemplo: email@gmail.com</small>
                        </div>

                        <div class="form-group">
                            <label for="mensaje" class="txt_negrita">Mensaje</label>
                            <textarea type="text" class="form-control" name="mensaje" id="mensaje" aria-describedby="mensajeHelp"></textarea>
                        </div>
                        <div class="g-recaptcha" data-sitekey="6LfgFZ8cAAAAABljA7BK5jKfMVbsgRjo2D0rzLyW"></div>
                        <!-- Mensajes de Validación -->
                        <div class="msg mt-3 mb-3"></div>

                        <button type="submit" class="btn btn-primary" id="btnenviar" name="btnenviar">Enviar</button>

                    </form>

    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
</li>
</ul>
      </div>
  </nav>
</div>
</header>
