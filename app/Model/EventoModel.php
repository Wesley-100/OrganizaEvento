<?php

namespace App\Model;

use \DateTime;
use Core\Library\ModelMain;

class EventoModel extends ModelMain
{
    protected $table = "eventos";
    
    public $validationRules = [
        "nome" => [
            "label" => 'Nome',
            "rules" => 'required|min:3|max:50'
        ],
        "cidade_id" => [
            "label" => 'Cidade',
            "rules" => 'required|int'
        ],
        "wiki" => [
            "label" => 'Wiki sobre o evento',
            "rules" => 'required|min:5'
        ],
        "data_inicio" => [
            "label" => 'Data de Início',
            "rules" => 'required|string'
        ],
        "data_termino" => [
            "label" => 'Data de Término',
            "rules" => 'required|string'
        ],
        "capacidade" => [
            "label" => 'Capacidade',
            "rules" => 'required|int'
        ],
        "status" => [
            "label" => 'Status',
            "rules" => 'required|int'
        ],
    ];

    /**
     * lista
     *
     * @param string $orderby 
     * @return array
     */
    public function listaEvento()
    {
        return $this->db->select("
            eventos.id              AS id,
            eventos.nome            AS nome,
            cidade.nome             AS cidade,
            eventos.cidade_id       AS cidade_id,
            uf.id                   AS uf_id,
            uf.sigla                AS sigla,
            eventos.wiki            AS wiki,
            eventos.data_inicio     AS data_inicio,
            eventos.data_termino    AS data_termino,
            eventos.capacidade      AS capacidade,
            eventos.status          AS status,
            eventos.imagem          AS imagem
            ")
            ->join("cidade", "cidade.id = eventos.cidade_id")
            ->join("uf", "uf.id = cidade.uf_id")
            ->orderBy("eventos.data_inicio")
            ->findAll();
    }

}