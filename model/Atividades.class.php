<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Atividades
 *
 * @author Vicent
 */
class Atividades {    
    
    /**
     * ExecFormController constructor.
     * @param $em
     */
    public function __construct($em)
    {
        $this->em = $em;
    }
    
    public function listarAtividades()
    {

        return "Listar Atividades ok";

    }
    
    
}
