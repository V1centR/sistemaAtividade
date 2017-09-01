<?php
require_once "../vendor/autoload.php";
use Controller\AtividadesController;
 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    
    $data = json_decode(file_get_contents('php://input'), true);
    $add = new AtividadesController();
    
    if($data['idAtividade']){
        $confirmExec = $add->updateAtividade($data);
    }else{
        $confirmExec = $add->addAtividade($data);
    }
    echo $confirmExec;
}