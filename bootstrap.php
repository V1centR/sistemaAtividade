<?php
chdir(dirname(__DIR__));

require_once "vendor/autoload.php";

use Controller\AtividadesController;

define('VIEW', 'View/');


//get query string
$setOrder = filter_input(INPUT_GET,"sortby",FILTER_SANITIZE_STRING);
$setType = filter_input(INPUT_GET,"type",FILTER_SANITIZE_STRING);

$atividades = new AtividadesController();
$dataAtividades = $atividades->index('default');

