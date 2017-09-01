<?php
chdir(dirname(__DIR__));

require_once "vendor/autoload.php";

use Controller\AtividadesController;

define('VIEW', 'View/');

//get query string
$setOrder = filter_input(INPUT_GET,"sortby",FILTER_SANITIZE_STRING);
$setMode = filter_input(INPUT_GET,"edit",FILTER_SANITIZE_STRING);
$idAtividade = filter_input(INPUT_GET,"atividade",FILTER_SANITIZE_STRING);

$atividades = new AtividadesController();
$dataAtividades = $atividades->index('default');
$itemsStatus = $atividades->getStatusItems();

$setEdit = '';
$ativoChecked = 'checked';
$disableSituacao = '';
if($setMode == 'true'){
    $setEdit = true;
    
    $atividadeData = $atividades->getAtividadeEdit($idAtividade);    
    
    $atividadeId =  $atividadeData->getId();
    $atividadeNome =  $atividadeData->getNome();
    $atividadeDescricao =  $atividadeData->getDescricao();
    $atividadeStatus =  $atividadeData->getStatus()->getId();
    $atividadeSituacao =  $atividadeData->getSituacao();
    
    $inativoChecked = 'checked';
    if($atividadeSituacao == 1){                                                
        $ativoChecked = 'checked';
        $inativoChecked = '';                                                
    }
    
    if($atividadeStatus == 1){        
        $disableSituacao = 'disabled';
    }
}



