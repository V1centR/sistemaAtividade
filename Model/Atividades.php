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

    /**
     * 
     * @return type
     */
    public function listarAtividades() {
        $atividades = $this->em->getRepository(AtividadesEntity::class);
        $atividadesData = $atividades->findAll();

        return $atividadesData;
    }

    /**
     * 
     * @param type $setStatus
     * @return type
     */
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
        $now = date("Y-m-d");

        $dataInicio = \DateTime::createFromFormat('Y-m-d', $now);

        try {

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
        } catch (\Exception $e) {

            echo 'Houve um erro na transação, tente novamente: ', $e->getMessage(), "\n";
            return false;
            ;
        }
    }

    /**
     * 
     * @return type
     */
    public function getItemStatus() {

        $getItems = $this->em->getRepository(Status::class);
        $statusObj = $getItems->findAll();

        return $statusObj;
    }

    /**
     * 
     * @return type
     */
    public function getAtividade($idAtividade) {

        $getItem = $this->em->getRepository(AtividadesEntity::class);
        $atividadeSelected = $getItem->findOneById($idAtividade);

        return $atividadeSelected;
    }

    /**
     * 
     * @param type $data
     * @return boolean
     */
    public function updateAtividade($data) {

        $execSuccess = true;
        $now = date("Y-m-d");
        $status = $data['status'];

        if ($status == 1) {
            $dataFim = \DateTime::createFromFormat('Y-m-d', $now);
            $setDataFim = true;
            $situacao = 0;
        } else {
            $dataFim = '';
            $situacao = $data['situacao'];
            $setDataFim = false;
        }

        try {

            $getStatus = $this->em->getRepository(Status::class);
            $statusObj = $getStatus->findOneById($data['status']);

            $updateAct = $this->em->getRepository(AtividadesEntity::class)->find($data['idAtividade']);

            $updateAct->setNome($data['nome']);
            $updateAct->setDescricao($data['desc']);
            if ($setDataFim) {
                $updateAct->setDataFim($dataFim);
            }
            $updateAct->setStatus($statusObj);
            $updateAct->setSituacao($situacao);

            $this->em->flush();
            return true;
        } catch (\Exception $e) {

            echo 'Houve um erro na transação, tente novamente: ', $e->getMessage(), "\n";
            return false;
            ;
        }
    }

}
