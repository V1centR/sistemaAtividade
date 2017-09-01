<?php
chdir(dirname(__DIR__));

require_once "vendor/autoload.php";

use Controller\AtividadesController;

define('VIEW', 'View/');

//get query string
$setOrder = filter_input(INPUT_GET,"sortby",FILTER_SANITIZE_STRING);
$setMode = filter_input(INPUT_GET,"edit",FILTER_SANITIZE_STRING);

$setEdit = '';
if($setMode == 'true'){
    $setEdit = true;
}

$atividades = new AtividadesController();
$dataAtividades = $atividades->index('default');
$itemsStatus = $atividades->getStatusItems();

