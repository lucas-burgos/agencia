<?php
class juegos{

    public function quini6($url) {
                        //Es posible que cuando pruebes este proxy no este activo, en caso de ser asi, busca uno
                //que si lo este en cualquier pagina de proxies gratuitos en internet
            $proxyurl = '88.198.50.103:8080';
        
            $context = stream_context_create();
            stream_context_set_params($context, array(
                        'proxy' => $proxyurl,
                        'ignore_errors' => true, 
                        'max_redirects' => 3)
                        );
                        $html = file_get_html($url, 0, $context);
        
        
            $tablas = array(); 
            foreach($html->find("table") as $a) {
                $tablas[] = $a->plaintext;
            }
        /*ahora, resultados de buenosaires*/
        $fecha=$tablas[1];
        $tradicional=$tablas[3];
        $tradicional_numeros=$tablas[4];
        $segunda_buelta=$tablas[28];
        $segunda_buelta_numeros=$tablas[29];
        $revancha=$tablas[54];
        $revancha_numeros=$tablas[55];
        $siempre_sale=$tablas[74];
        $siempre_sale_numeros=$tablas[75];
        
        ?>
        <p><?php
        print_r($fecha);
        ?></p>
        <h3>
        <?php
        print_r($tradicional);
        ?></h3>
        <p>
        <?php
        print_r($tradicional_numeros);
        ?></p>
        <hr>
        <h3><?php
        print_r($segunda_buelta);
        ?></h3>
        <p><?php
        print_r($segunda_buelta_numeros);
        ?></p>
        <h3><?php
        print_r($revancha);
        ?></h3><p><?php
        print_r($revancha_numeros);
        ?></p><h3><?php
        print_r($siempre_sale);
        ?></h3><p><?php
        print_r($siempre_sale_numeros);
        ?></p>
        <?php
        
        $html->clear();
            unset($html);
        }

public function loto($url){
        //Es posible que cuando pruebes este proxy no este activo, en caso de ser asi, busca uno
        //que si lo este en cualquier pagina de proxies gratuitos en internet
        $proxyurl = '88.198.50.103:8080';

        $context = stream_context_create();
        stream_context_set_params($context, array(
                    'proxy' => $proxyurl,
                    'ignore_errors' => true, 
                    'max_redirects' => 3)
                    );
                    $html = file_get_html($url, 0, $context);
    
    
        $tablas = array(); 
        foreach($html->find("table") as $a) {
            $tablas[] = $a->plaintext;
        }
    /*ahora, resultados de buenosaires*/
    $fecha=$tablas[1];
    $tradicional=$tablas[3];
    $tradicional_numeros=$tablas[4];
    $revancha=$tablas[45];
    $revancha_numeros=$tablas[46];
    $siempre_sale=$tablas[78];
    $siempre_sale_numeros=$tablas[79];
    
    ?>
    <p><?php
    print_r($fecha);
    ?></p>
    <h3>
    <?php
    print_r($tradicional);
    ?></h3>
    <p>
    <?php
    print_r($tradicional_numeros);
    ?></p>
    <h3><?php
    print_r($revancha);
    ?></h3><p><?php
    print_r($revancha_numeros);
    ?></p><h3><?php
    print_r($siempre_sale);
    ?></h3><p><?php
    print_r($siempre_sale_numeros);
    ?></p>
    <?php
    
    $html->clear();
        unset($html);
    }

public function telequino($url) {
            //Es posible que cuando pruebes este proxy no este activo, en caso de ser asi, busca uno
        //que si lo este en cualquier pagina de proxies gratuitos en internet
	$proxyurl = '88.198.50.103:8080';

	$context = stream_context_create();
	stream_context_set_params($context, array(
				'proxy' => $proxyurl,
				'ignore_errors' => true, 
				'max_redirects' => 3)
				);
                $html = file_get_html($url, 0, $context);


	$tablas = array(); 
    foreach($html->find("table") as $a) {
        $tablas[] = $a->plaintext;
    }
/*ahora, resultados de buenosaires*/
$fecha=$tablas[0];
$tradicional=$tablas[2];
$tradicional_numeros=$tablas[3];
$revancha=$tablas[44];
$revancha_numeros=$tablas[45];
$siempre_sale=$tablas[46];

?>
<p><?php
print_r($fecha);
?></p>
<h3>
<?php
print_r($tradicional);
?></h3>
<p>
<?php
print_r($tradicional_numeros);
?></p>
<h3><?php
print_r($revancha);
?></h3><h3><?php
print_r($revancha_numeros);
?></h3><p><?php
print_r($siempre_sale);
?></p><?php

$html->clear();
	unset($html);

}

public function brinco($url) {
        //Es posible que cuando pruebes este proxy no este activo, en caso de ser asi, busca uno
        //que si lo este en cualquier pagina de proxies gratuitos en internet
        $proxyurl = '88.198.50.103:8080';

        $context = stream_context_create();
        stream_context_set_params($context, array(
                    'proxy' => $proxyurl,
                    'ignore_errors' => true, 
                    'max_redirects' => 3)
                    );
                    $html = file_get_html($url, 0, $context);
    
    
        $tablas = array(); 
        foreach($html->find("table") as $a) {
            $tablas[] = $a->plaintext;
        }
    /*ahora, resultados de buenosaires*/
    $fecha=$tablas[0];
    $tradicional=$tablas[3];
    $tradicional_numeros=$tablas[4];
    $revancha=$tablas[32];
    $revancha_numeros=$tablas[33];
    
    ?>
    <p><?php
    print_r($fecha);
    ?></p>
    <h3>
    <?php
    print_r($tradicional);
    ?></h3>
    <p>
    <?php
    print_r($tradicional_numeros);
    ?></p>
    <h3><?php
    print_r($revancha);
    ?></h3><p><?php
    print_r($revancha_numeros);
    ?></p><?php
    
    $html->clear();
        unset($html);
    }

public function loto5($url){
        //Es posible que cuando pruebes este proxy no este activo, en caso de ser asi, busca uno
        //que si lo este en cualquier pagina de proxies gratuitos en internet
        $proxyurl = '88.198.50.103:8080';

        $context = stream_context_create();
        stream_context_set_params($context, array(
                    'proxy' => $proxyurl,
                    'ignore_errors' => true, 
                    'max_redirects' => 3)
                    );
                    $html = file_get_html($url, 0, $context);
    
    
        $tablas = array(); 
        foreach($html->find("table") as $a) {
            $tablas[] = $a->plaintext;
        }
    /*ahora, resultados de buenosaires*/
    $fecha=$tablas[0];
    $tradicional=$tablas[3];
    $tradicional_numeros=$tablas[4];
    
    ?>
    <p><?php
    print_r($fecha);
    ?></p>
    <h3>
    <?php
    print_r($tradicional);
    ?></h3>
    <p>
    <?php
    print_r($tradicional_numeros);
    
    $html->clear();
        unset($html);
    }

}

?>