<?php
  $captcha;
	if(isset($_POST['g-recaptcha-response'])){
       $captcha=$_POST['g-recaptcha-response'];}
	if(!$captcha){
       echo 'Chequea la Captcha';}
	$secretKey = "6LfgFZ8cAAAAALAl3YzZtvSaMMR7L5xvL48PesxD";
    $ip = $_SERVER['REMOTE_ADDR'];
	//Chequear captcha con Google
	$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
    $responseKeys = json_decode($response,true);
    if(intval($responseKeys["success"]) !== 1) {
    // Si el correo es enviado correctamente, mostramos un mensaje

    $a = 0;
    $b = "<div class='alert alert-success'>Tu Mensaje ha sido enviado Correctamente !</div>";

    $dab = array(
"a" => $a,
"b" => $b
);

    echo(json_encode($dab));
        } else {
            //si la captcha es correcta se escribe los datos introducidos

            if (!$_POST) {
                exit;
            }

            // Verificación del Correo (No tocar)
            function isEmail($email)
            {
                return(preg_match("/^[-_.[:alnum:]]+@((([[:alnum:]]|[[:alnum:]][[:alnum:]-]*[[:alnum:]])\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|me|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|ws|ye|yt|yu|za|zm|zw)$|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/i", $email));
            }

            if (!defined("PHP_EOL")) {
                define("PHP_EOL", "\r\n");
            }

            $nya    = $_POST['nya'];
            $email    = $_POST['email'];
            $mensaje    = $_POST['mensaje'];


            if (trim($nya) == '') {
                $a = 0;
                $b = '<div class="alert alert-danger alert-dismissable" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Por favor, ingresa tus Nombres y Apellidos.</div>';

                $dab = array(
    "a" => $a,
    "b" => $b
  );

                echo(json_encode($dab));
                exit();
            } elseif (trim($email) == '') {
                $a = 0;
                $b = '<div class="alert alert-danger alert-dismissable" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Por favor, ingresa tu Email.</div>';

                $dab = array(
    "a" => $a,
    "b" => $b
  );

                echo(json_encode($dab));
                exit();
            } elseif (!isEmail($email)) {
                $a = 0;
                $b = '<div class="alert alert-danger alert-dismissable" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Por favor, ingresa tu Email correctamente.</div>';

                $dab = array(
    "a" => $a,
    "b" => $b
  );

                echo(json_encode($dab));
                exit();
            } elseif (trim($mensaje) == '') {
                $a = 0;
                $b = '<div class="alert alert-danger alert-dismissable" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Por favor, ingresa tu Mensaje.</div>';

                $dab = array(
    "a" => $a,
    "b" => $b
  );

                echo(json_encode($dab));
                exit();
            }


            /* Configuración para el envio del Correo */

            //Correo a donde caeran los mensajes del formulario
$correo = "elturquitoag93@gmail.com"; //


// Asunto
            $e_asunto= 'Mensaje de Contacto';



            // Preparamos el encabezado del correo
            $e_bodya = "Nombres y Apellidos: $nya" . PHP_EOL . PHP_EOL;
            $e_reply = "Email: $email" . PHP_EOL . PHP_EOL;
            $e_bodyc = "Mensaje: $mensaje" . PHP_EOL . PHP_EOL;

            $msg = wordwrap($e_bodya . $e_bodyc . $e_reply, 80);

            // Creamos el encabezado del correo
            $headers = "From: ".$nya." <".$email.">" . PHP_EOL;
            $headers .= "Reply-To: $email" . PHP_EOL;
            $headers .= "MIME-Version: 1.0" . PHP_EOL;
            $headers .= "Content-type: text/plain; charset=utf-8" . PHP_EOL;
            $headers .= "Content-Transfer-Encoding: quoted-printable" . PHP_EOL;


            if (mail($correo, $e_asunto, $msg, $headers)) {

    // Si el correo es enviado correctamente, mostramos un mensaje

                $a = 1;
                $b = "<div class='alert alert-success' role='alert'>Tu Mensaje ha sido enviado Correctamente !</div>";

                $dab = array(
    "a" => $a,
    "b" => $b
  );

                echo(json_encode($dab));
            } else {
                echo 'ERROR!';
            }


          }
          ?>