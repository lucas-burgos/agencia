<?php include('includes.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <title><?php if (isset($_GET['action']) && $_GET['action'] == 'sobrenosotros') {
echo 'Sobre nosotros / ';
    }
echo $consulta[0]['titulo']; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){			
			$("#llamar_nacional").on("click", function(e){
				e.preventDefault();
				$("#resultados").load("nacional.php");
			});
		});
    $(document).ready(function(){			
			$("#llamar_bsas").on("click", function(e){
				e.preventDefault();
				$("#resultados").load("bsas.php");
			});
		});
    $(document).ready(function(){			
			$("#llamar_neuquen").on("click", function(e){
				e.preventDefault();
				$("#resultados").load("neuquen.php");
			});
		});
    $(document).ready(function(){			
			$("#llamar_rionegro").on("click", function(e){
				e.preventDefault();
				$("#resultados").load("rionegro.php");
			});
		});
    </script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" integrity="sha384-O8whS3fhG2OnA5Kas0Y9l3cfpmYjapjI0E4theH4iuMD+pLhbf6JI0jIMfYcK3yZ" crossorigin="anonymous">
<style>
.contact-form{ margin-top:15px;}
.contact-form .textarea{ min-height:220px; resize:none;}
.form-control{ box-shadow:none; border-color:#eee; height:49px;}
.form-control:focus{ box-shadow:none; border-color:#00b09c;}
.form-control-feedback{ line-height:50px;}
.main-btn{ background:#00b09c; border-color:#00b09c; color:#fff;}
.main-btn:hover{ background:#00a491;color:#fff;}
.form-control-feedback {
line-height: 50px;
top: 0px;
}
  </style>
</head>
  <body>
<?php include('cavecera.php');       ?>
<section class="row">
<div class="col-md-12 col-lg-12 col-sm-12 text-center">
<div class="row">
<?php
if (isset($_GET['action']) && $_GET['action'] == 'sobrenosotros') {
  ?>
<div class="col-md-1-12 text-center">
<h2 class="text-center">Sobre nosotros</h2>
<p><?php echo $consulta[0]['sobre_nosotros']; ?></p>
  </div>
<?php
}
else {
?>
<div class="col-md-5 offset-md-1">
  <div class="col-md-6">
<h2 class="text-center">Sorteos</h2>
<h3 class="right-text"><a href="#" id="llamar_nacional">Quiniela de la ciudad</a></h3>
<h3 class="right-text"><a href="#" id="llamar_bsas">Quiniela de la provincia de Buenos Aires</a></h3>
<h3 class="right-text"><a href="#" id="llamar_neuquen">Quiniela de Neuquén</a></h3>
<h3 class="right-text"><a href="#" id="llamar_rionegro">Quiniela de Río Negro</a></h3>
  </div>
  <div class="col-md-6" id="resultados">
<h3>Pizarra</h3>
</div>

</div>
<div class="col-md-6 col-lg-6 col-sm-12 text-center">
<h3 class="text-center">Novedades</h3>
<?php
require('administrador/clases/novedades.class.php');
    $nuevaNovedades = new novedades($base);
    $novedades = $nuevaNovedades->getNovedades();
    for ($i=0;$i<count($novedades);$i++) {
        ?>
<div class="card border-info">
    <div class="card-body">
      <h4 class="card-title"><?php echo $novedades[$i]['titulo']; ?></h4>
      <p class="card-text"><?php echo $novedades[$i]['fecha']; ?></p>
    <p class="card-text"><?php echo $novedades[$i]['novedad']; ?></p>
    <p class="card-text"><a href="comentarios.php?id=<?php echo $novedades[$i]['id_novedad']; ?>"><i class="fas fa-comment    "></i> Deja un comentario</a></p>
      </div>
  </div>
<?php
    }
}
?>
</div>
</section>
<footer>
  <h2>Seguinos en nuestras redes</h2>
  <p><i class="fas fa-facebook-square    "></i> Facebook</p>
</footer>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  </body>
</html>