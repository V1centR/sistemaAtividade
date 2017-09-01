<?php

namespace Controller;

use Controller\ApplicationRun;
use Model\Atividades;

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
     * @param type $set
     * @return type
     */
    public function index($set) {

        //função injeta a conexão e busca os dados na classe da model
        $arrAtividades = [];

        $lista = new Atividades($this->em);

        if ($set === 'default' || $set == null || $set == 0) {

            $listaDeAtividades = $lista->listarAtividades();
            $listaDeAtividades = json_encode($this->containerData($listaDeAtividades));
        } else {
            $listaDeAtividades = $lista->orderAtividades($set);
            $listaDeAtividades = json_encode($this->containerData($listaDeAtividades));
        }

        return $listaDeAtividades;
    }

    /**
     * 
     * @param type $dataItem
     * @return type
     */
    private function containerData($dataItem) {

        $arrAtividades = [];

        foreach ($dataItem as $data1) {

            $dataInicio = date_format($data1->getDatainicio(), 'd/m/Y H:i');
            $dataFim = date_format($data1->getDatafim(), 'd/m/Y H:i');

            $arrAtividades[$data1->getId()]['id'] = $data1->getId();
            $arrAtividades[$data1->getId()]['nome'] = $data1->getNome();
            $arrAtividades[$data1->getId()]['descricao'] = $data1->getDescricao();
            $arrAtividades[$data1->getId()]['dataInicio'] = $dataInicio;
            $arrAtividades[$data1->getId()]['dataFim'] = $dataFim;
            $arrAtividades[$data1->getId()]['status'] = $data1->getStatus()->getNome();
            $arrAtividades[$data1->getId()]['statusId'] = $data1->getStatus()->getId();
            $arrAtividades[$data1->getId()]['situacao'] = $data1->getSituacao();
        }
        return $arrAtividades;
    }

    /**
     * 
     * @param type $data
     * @return boolean|int
     */
    public function addAtividade($data) {
        $execSuccess = true;
        $emptyValues = false;

        $checkEmptyValue = in_array("", $data);

        if (!$checkEmptyValue) {

            $addData = new Atividades($this->em);
            $execSuccess = $addData->addAtividade($data);
        } else {
            $execSuccess = false;
        }

        return $execSuccess;
    }

    public function getStatusItems() {
        $getItems = new Atividades($this->em);

        return $getItems->getItemStatus();
    }

}
