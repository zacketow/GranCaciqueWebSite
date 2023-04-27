<?php
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    die();
}

if($_GET and isset($_GET['tarifas'])){
    $tarifas = "../../api/tarifas.json";
    unlink($tarifas);
    $file = fopen($tarifas, "w") or die("Unable to open file!");
    $txt = $_POST['data'];
    fwrite($file, $txt);
    fclose($file);
}
if($_GET and isset($_GET['noticias'])){
    $noticias = "../../api/noticias.json";
    unlink($noticias);
    $file = fopen($noticias, "w") or die("Unable to open file!");
    $txt = $_POST['data'];
    fwrite($file, $txt);
    fclose($file);
}

?>