<?php

namespace Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Atividades
 *
 * @ORM\Table(name="atividades", indexes={@ORM\Index(name="fk_atividades_status_idx", columns={"status"})})
 * @ORM\Entity
 */
class Atividades
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nome", type="string", length=255, nullable=false)
     */
    private $nome;

    /**
     * @var string
     *
     * @ORM\Column(name="descricao", type="string", length=600, nullable=false)
     */
    private $descricao;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataInicio", type="datetime", nullable=false)
     */
    private $datainicio;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dataFim", type="datetime", nullable=true)
     */
    private $datafim;

    /**
     * @var integer
     *
     * @ORM\Column(name="situacao", type="integer", nullable=true)
     */
    private $situacao;

    /**
     * @var \Status
     *
     * @ORM\ManyToOne(targetEntity="Status")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="status", referencedColumnName="id")
     * })
     */
    private $status;
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getDatainicio() {
        return $this->datainicio;
    }

    public function getDatafim() {
        return $this->datafim;
    }

    public function getSituacao() {
        return $this->situacao;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    public function setNome($nome) {
        $this->nome = $nome;
        return $this;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
        return $this;
    }

    public function setDatainicio(\DateTime $datainicio) {
        $this->datainicio = $datainicio;
        return $this;
    }

    public function setDatafim(\DateTime $datafim) {
        $this->datafim = $datafim;
        return $this;
    }

    public function setSituacao($situacao) {
        $this->situacao = $situacao;
        return $this;
    }

    public function setStatus(\Status $status) {
        $this->status = $status;
        return $this;
    }

}

