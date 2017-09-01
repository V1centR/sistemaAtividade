<?php

namespace Model;

use Model\Entity\Atividades as AtividadesEntity;
use Model\Entity\Status;

class Atividades {

    /**
     * ExecFormController constructor.
     * @param $em
     */
    public function __construct($em) {
        $this->em = $em;
    }

    public function listarAtividades() {
        $atividades = $this->em->getRepository(AtividadesEntity::class);
        $atividadesData = $atividades->findAll();

        return $atividadesData;
    }

    public function orderAtividades($setStatus) {
        
        $filter = ['status' => $setStatus];

        $atividades = $this->em->getRepository(AtividadesEntity::class);
        $atividadesData = $atividades->findBy($filter);

        return $atividadesData;
    }
    
    /**
     * 
     * @param type $data
     * @return boolean
     */
    public function addAtividade($data) {
        
        $execSuccess = true;
        
        $now =  date("Y-m-d");
        
        $dataInicio = \DateTime::createFromFormat('Y-m-d', $now);

            try{
                
                $getStatus = $this->em->getRepository(Status::class);
                $statusObj = $getStatus->findOneById($data['status']);
                
                $addAct = new AtividadesEntity();
                $addAct->setNome($data['nome']);
                $addAct->setDescricao($data['desc']);
                $addAct->setDatainicio($dataInicio);
                $addAct->setStatus($statusObj);
                $addAct->setSituacao($data['situacao']);

                $this->em->persist($addAct);
                $this->em->flush();
                
                return true;

            }catch (\Exception $e){

                echo 'Houve um erro na transação, tente novamente: ',  $e->getMessage(), "\n";
                return false;;
            }
        
    }
    
     public function getItemStatus() {
        
            $getItems = $this->em->getRepository(Status::class);
            $statusObj = $getItems->findAll();
            
            return $statusObj;
    }

}
