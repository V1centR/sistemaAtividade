<?php

namespace Model;

use Model\Entity\Atividades as AtividadesEntity;

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

}
