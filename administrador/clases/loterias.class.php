<?php
class loterias{

    public function cavecera($url) {
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
        foreach($html->find("div") as $a) {
            $tablas[] = $a->plaintext;
        }
    /*ahora, resultados de buenosaires*/
    $primera_neuquen=$tablas[8];
    $matutina_neuquen=$tablas[9];
    $despertina_neuquen=$tablas[10];
    $nocturna_neuquen=$tablas[11];
    ?>
    <h4><?php echo $nombre_quiniela=$tablas[4]; ?></h4>
<p><?php echo $fecha_quiniela=$tablas[6]; ?></p>
<table class="table table-bordered table-inverse table-responsive" style="background-color:blue; color:yellow;">
        <thead class="thead-inverse">
            <tr>
                <th>Primera</th>
                <th>Matutina</th>
                <th>Vespertina</th>
                <th>Nocturna</th>
                        </tr>
            </thead>
            <tbody>
                <tr>
                <?php
    
    echo '<td>';
    print_r($primera_neuquen);
    
    echo '</td>';
    echo '<td>';
    print_r($matutina_neuquen);
    
    echo '</td>';
    echo '<td>';
    print_r($despertina_neuquen);
    
    echo '</td>';
    
    echo '<td>';
    print_r($nocturna_neuquen);
    
    echo '</td>';
    
    
    ?>
</tr>
            </tbody>
    </table>
<?php    
        $html->clear();
        unset($html);
}

public function premios($url) {
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
    foreach($html->find("div") as $a) {
        $tablas[] = $a->plaintext;
    }
?>    
    <div class="col-md-2 offset-md-1">
    <h4 class="text-center">Primera</h4>
    <table class="text-center table table-bordered table-inverse table-responsive" style="background-color:blue; color:yellow;">
            <thead class="thead-inverse">
            <tr>
<th>Posición</th>
<th>Resultado</th>
</tr>
</thead>
<tbody>
<?php
$k=0;
$r=19;
$p=18;
for($b = 1; $b < 21; $b++) {
echo '<tr>';
if ($b == 11) {
$p=20;
$r=21;
}
echo '<td>';
print_r($tablas[$p]);
echo '</td>';
echo '<td>';
print_r($tablas[$r]);
echo '</td>';
echo '</tr>';
$k = ($k - $k + 4);
$p = ($p + $k);
$r = ($r + $k);
$k = ($k - 2);
}
?>
</tbody>
</table>
    </div>
    <div class="col-md-2 offset-md-1">
    <h4 class="text-center">Matutina</h4>
    <table class="text-center table table-bordered table-inverse table-responsive" style="background-color:blue; color:yellow;">
            <thead class="thead-inverse">
            <tr>
<th>Posición</th>
<th>Resultado</th>
</tr>
</thead>
<tbody>
<?php
$k=0;
$r=65;
$p=64;
for($b = 1; $b < 21; $b++) {
echo '<tr>';
if ($b == 11) {
$p=66;
$r=67;
}
echo '<td>';
print_r($tablas[$p]);
echo '</td>';
echo '<td>';
print_r($tablas[$r]);
echo '</td>';
echo '</tr>';
$k = ($k - $k + 4);
$p = ($p + $k);
$r = ($r + $k);
$k = ($k - 2);
}
?>
</tbody>
</table>
</div>
<div class="col-md-2 offset-md-1">
<h4 class="text-center">Vespertina</h4>
    <table class="text-center table table-bordered table-inverse table-responsive" style="background-color:blue; color:yellow;">
            <thead class="thead-inverse">
            <tr>
<th>Posición</th>
<th>Resultado</th>
</tr>
</thead>
<tbody>
<?php
$k=0;
$r=111;
$p=110;
for($b = 1; $b < 21; $b++) {
echo '<tr>';
if ($b == 11) {
$p=112;
$r=113;
}
echo '<td>';
print_r($tablas[$p]);
echo '</td>';
echo '<td>';
print_r($tablas[$r]);
echo '</td>';
echo '</tr>';
$k = ($k - $k + 4);
$p = ($p + $k);
$r = ($r + $k);
$k = ($k - 2);
}
?>
</tbody>
</table>
</div>
<div class="col-md-2 offset-md-1">
<h4 class="text-center">Nocturna</h4>
    <table class="text-center table table-bordered table-inverse table-responsive" style="background-color:blue; color:yellow;">
            <thead class="thead-inverse">
            <tr>
<th>Posición</th>
<th>Resultado</th>
</tr>
</thead>
<tbody>
<?php
$k=0;
$r=156;
$p=157;
for($b = 1; $b < 21; $b++) {
echo '<tr>';
if ($b == 11) {
$p=158;
$r=159;
}
echo '<td>';
print_r($tablas[$p]);
echo '</td>';
echo '<td>';
print_r($tablas[$r]);
echo '</td>';
echo '</tr>';
$k = ($k - $k + 4);
$p = ($p + $k);
$r = ($r + $k);
$k = ($k - 2);
}
?>
</tbody>
</table>
</div>
<?php
    
    $html->clear();
        unset($html);
    }
    
        public function nacional($url) {
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
            foreach($html->find("div") as $a) {
                $tablas[] = $a->plaintext;
            }
        ?>
        <div class="col-md-2 offset-md-1">
        <h4 class="text-center">Primera</h4>
        <table class="text-center table table-bordered table-inverse table-responsive" style="background-color:blue; color:yellow;">
            <thead class="thead-inverse">
    <tr>
<th>Posición</th>    
<th>Resultado</th>
        </tr>
        </thead>
        <tbody>
        <?php
$k=0;
$r=19;
$p=18;
for($b = 1; $b < 21; $b++) {
echo '<tr>';
if ($b == 11) {
$p=20;
$r=21;
}
echo '<td>';
print_r($tablas[$p]);
echo '</td>';
echo '<td>';
print_r($tablas[$r]);
echo '</td>';
echo '</tr>';
$k = ($k - $k + 4);
$p = ($p + $k);
$r = ($r + $k);
$k = ($k - 2);
}
?>
</tbody>
</table>
</div>
        <div class="col-md-2 offset-md-1">
    <h4 class="text-center">Matutina</h4>
        <table class="text-center table table-bordered table-inverse table-responsive" style="background-color:blue; color:yellow;">
            <thead class="thead-inverse">
            <tr>
<th>Posición</th>
<th>Resultado</th>
</tr>
</thead>
<tbody>
<?php
$k=0;
$r=66;
$p=65;
for($b = 1; $b < 21; $b++) {
echo '<tr>';
if ($b == 11) {
$p=67;
$r=68;
}
echo '<td>';
print_r($tablas[$p]);
echo '</td>';
echo '<td>';
print_r($tablas[$r]);
echo '</td>';
echo '</tr>';
$k = ($k - $k + 4);
$p = ($p + $k);
$r = ($r + $k);
$k = ($k - 2);
}
?>
</tbody>
</table>
</div>
    <div class="col-md-2 offset-md-1">
    <h4 class="text-center">Vespertina</h4>
        <table class="text-center table table-bordered table-inverse table-responsive" style="background-color:blue; color:yellow;">
            <thead class="thead-inverse">
            <tr>
<th>Posición</th>
<th>Resultado</th>
</tr>
</thead>
<tbody>
<?php
$k=0;
$r=113;
$p=112;
for($b = 1; $b < 21; $b++) {
echo '<tr>';
if ($b == 11) {
$p=114;
$r=115;
}
echo '<td>';
print_r($tablas[$p]);
echo '</td>';
echo '<td>';
print_r($tablas[$r]);
echo '</td>';
echo '</tr>';
$k = ($k - $k + 4);
$p = ($p + $k);
$r = ($r + $k);
$k = ($k - 2);
}
?>
</tbody>
</table>
    </div>
    <div class="col-md-2 offset-md-1">
    <h4 class="text-center">Nocturna</h4>
    <table class="text-center table table-bordered table-inverse table-responsive" style="background-color:blue; color:yellow;">
            <thead class="thead-inverse">
            <tr>
<th>Posición</th>
<th>Resultado</th>
</tr>
</thead>
<tbody>
<?php
$k=0;
$r=160;
$p=159;
for($b = 1; $b < 21; $b++) {
echo '<tr>';
if ($b == 11) {
$p=161;
$r=162;
}
echo '<td>';
print_r($tablas[$p]);
echo '</td>';
echo '<td>';
print_r($tablas[$r]);
echo '</td>';
echo '</tr>';
$k = ($k - $k + 4);
$p = ($p + $k);
$r = ($r + $k);
$k = ($k - 2);
}
?>
</tbody>
</table>
        </div>
    <?php
        
        $html->clear();
            unset($html);
        }
    
}
?>