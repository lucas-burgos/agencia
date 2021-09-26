<div class="container">
        <header class="row">
<div class="col-md-12 col-xs-1-12">
  <h1>Agencia el Turquito</h1>
</div>
<div class="col-lg-1-12">
  <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #e3f2fd;">
  <a class="navbar-brand" href="#">
      <img src="img/<?php echo $consulta[0]['logo']; ?>" alt="<?php echo $consulta[0]['descripcion_logo']; ?>" width="30" height="24">
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
                  <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Loterías</a>
                  <div class="dropdown-menu" aria-labelledby="dropdownId">
                      <a class="dropdown-item" href="loterias.php?quiniela=nacional">Quiniela de la ciudad</a>
                      <a class="dropdown-item" href="loterias.php?quiniela=provincia">Lotería de la provincia de Buenos Aires</a>
                      <a class="dropdown-item" href="loterias.php?quiniela=neuquen">Lotería de Neuquén</a>
                      <a class="dropdown-item" href="loterias.php?quiniela=rionegro">Lotería de Río Negro</a>
                                      </div>
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
                  <a class="nav-link" href="index.php#contacto"><i class="fas fa-inbox    "></i> Contactate</a>
              </li>
          </ul>
      </div>
  </nav>
</div>
</header>
