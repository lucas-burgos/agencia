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
<script>
  $('#contact-form').bootstrapValidator({
//        live: 'disabled',
        message: 'This value is not valid',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            Name: {
                validators: {
                    notEmpty: {
                        message: 'The Name is required and cannot be empty'
                    }
                }
            },
            email: {
                validators: {
                    notEmpty: {
                        message: 'The email address is required'
                    },
                    emailAddress: {
                        message: 'The email address is not valid'
                    }
                }
            },
            Message: {
                validators: {
                    notEmpty: {
                        message: 'The Message is required and cannot be empty'
                    }
                }
            }
        }
    });
  </script>
</head>
  <body>
<?php include('cavecera.php');       ?>
<section class="row">
<div class="col-md-6 col-lg-6 col-sm-12">
<?php
if (isset($_GET['action']) && $_GET['action'] == 'sobrenosotros') {
  ?>
<p><?php echo $consulta[0]['sobre_nosotros']; ?></p>
<?php
}
else {
require('administrador/clases/telefono.class.php');
$tel = new telefono($base);    
$celular= $tel->getTelefonos();
?>
<p><?php echo $consulta[0]['descripcion_pagina']; ?></p>
<p><a href="https://api.whatsapp.com/send?phone=<?php echo $celular[0]['telefono']; ?>"><button class="btn btn-info"><i class="fas fa-whatsapp    "></i> Jugate un número!</button></a></p>
<?php
} ?>
</div>
<div class="col-md-6 col-lg-6 col-sm-12">
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
} ?>
</div>
</section>
  <section id="contacto" class="container">
    <div class="row">
<h4 class="text-center">Contactate</h4>
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
  </section>
</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.1.1/js/all.js" integrity="sha384-BtvRZcyfv4r0x/phJt9Y9HhnN5ur1Z+kZbKVgzVBAlQZX4jvAuImlIz+bG7TS00a" crossorigin="anonymous"></script>
  </body>
</html>