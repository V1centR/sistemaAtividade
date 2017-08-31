<?php

namespace Controller;

use Model\Atividades;
use Controller\ApplicationRun;

class AtividadesController {
    
    private $view = null;
    
    /**
     * Connect dataBase service
     * 
     */
    public function __construct() {
        
        $em = new applicationRun();
        $this->em = $em->databaseRun();
       
    }


    /**
     * 
     */
    public function index() {
        
        //esta função injeta a conexão e busca os dados na classe da model
        $lista = new Atividades($this->em);
        $listaDeAtividades = $lista->listarAtividades();
        
//        $dados = [];
//        $dados[] = "AAA";
//        $dados[] = "BBB";
//        $dados[] = "CCC";
//        $dados[] = "DDD";
//        $dados[] = "EEE";
        
       // $view = new View();
        
        return $listaDeAtividades;
        
    }
    
    
}
