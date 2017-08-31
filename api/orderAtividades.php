<?php
require_once "../vendor/autoload.php";
$setType = filter_input(INPUT_GET,"setType",FILTER_SANITIZE_STRING);

use Controller\AtividadesController;

$getOrder = new AtividadesController();
$dataType = $getOrder->index($setType);
echo $dataType;
