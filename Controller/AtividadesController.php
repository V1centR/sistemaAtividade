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
    public function index($set) {

        //função injeta a conexão e busca os dados na classe da model
        $arrAtividades = [];
        $containerIndex = [];
        $lista = new Atividades($this->em);

        if ($set === 'default' || $set == null || $set == 0) {
            $listaDeAtividades = $lista->listarAtividades();

            foreach ($listaDeAtividades as $data1) {

                $dataInicio = date_format($data1->getDatainicio(), 'd/m/Y H:i');
                $dataFim = date_format($data1->getDatafim(), 'd/m/Y H:i');

                $arrAtividades[$data1->getId()]['nome'] = $data1->getNome();
                $arrAtividades[$data1->getId()]['descricao'] = $data1->getDescricao();
                $arrAtividades[$data1->getId()]['dataInicio'] = $dataInicio;
                $arrAtividades[$data1->getId()]['dataFim'] = $dataFim;
                $arrAtividades[$data1->getId()]['status'] = $data1->getStatus()->getNome();
                $arrAtividades[$data1->getId()]['statusId'] = $data1->getStatus()->getId();
                $arrAtividades[$data1->getId()]['situacao'] = $data1->getSituacao();
            }
            $listaDeAtividades = json_encode($arrAtividades);
        } else {
            $listaDeAtividades = $lista->orderAtividades($set);

            foreach ($listaDeAtividades as $data1) {
                $arrAtividades[$data1->getId()] = $data1->getNome();
            }
            $listaDeAtividades = json_encode($arrAtividades);
        }

        return $listaDeAtividades;
    }
}
