<?php
require('administrador/clases/telefono.class.php');
$tel = new telefono($base);    
$celular= $tel->getTelefonos();
?>
<div class="container">
        <header class="row">
<div class="col-md-12 col-xs-1-12">
  <h1>Agencia el Turquito</h1>
</div>
<div class="col-lg-9 offset-lg-1 col-md-9 offset-md-1 col-sm-12" style="color: red;">
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
    <form role="form" id="contact-form" class="contact-form" action="index.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="Name" autocomplete="off" id="Name" placeholder="Nombre">
                        </div>
                    </div>
                        <div class="col-md-6">
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" autocomplete="off" id="email" placeholder="Correo electrónico">
                        </div>
                    </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                        <div class="form-group">
                            <textarea class="form-control textarea" rows="3" name="Message" id="Message" placeholder="Escribe tu mensaje"></textarea>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">
                  <button type="submit" class="btn main-btn pull-right">Envía tu mensaje</button>
                  </div>
                  </div>
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
<div class="col-lg-2 col-md-2 col-sm-12">
<p><?php echo $consulta[0]['descripcion_pagina']; ?></p>
</div>
</header>
