<?php
require_once "../vendor/autoload.php";
use Controller\AtividadesController;
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $data = json_decode(file_get_contents('php://input'), true);
    
    $add = new AtividadesController();
    $confirmExec = $add->addAtividade($data);

    echo $confirmExec;
}