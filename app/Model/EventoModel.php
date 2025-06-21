<?php

namespace App\Model;

use Core\Library\ModelMain;

class EventoModel extends ModelMain
{
    protected $table = "eventos";
    
    public $validationRules = [
        "nome"  => [
            "label" => 'Nome',
            "rules" => 'required|min:3|max:50'
        ],
        "cidade"  => [
            "label" => 'Cidade',
            "rules" => 'required|min:3|max:50'
        ],
        "uf"  => [
            "label" => 'UF',
            "rules" => 'required|min:2|max:2'
        ],
        
        "wiki"  => [
            "label" => 'Wiki sobre o evento',
            "rules" => 'required|min:5'
        ],
        "dataInicio"  => [
            "label" => 'Data de inicio',
            "rules" => 'required|datetime'
        ],
        "dataTermino"  => [
            "label" => 'Data de Termino',
            "rules" => 'required|datetime'
        ],
        "cidade"  => [
            "label" => 'ID da cidade',
            "rules" => 'required|int'
        ],
        "capacidade"  => [
            "label" => 'Wiki sobre a cidade',
            "rules" => 'required|int'
        ],
        "status"  => [
            "label" => 'Status',
            "rules" => 'required|int'
        ],
        "created_at"  => [
            "label" => 'Data de criação',
            "rules" => 'required|datetime'
        ],
        "update_at"  => [
            "label" => 'Data de alteração',
            "rules" => 'required|datetime'
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
                                eventos.id AS 'id',
                                eventos.nome AS 'nome',
                                cidade.nome AS 'cidade',
                                uf.id AS 'uf_id',
                                uf.sigla AS 'sigla',
                                eventos.wiki AS 'wiki',
                                eventos.data_inicio AS 'data_inicio',
                                eventos.data_termino AS 'data_termino',
                                eventos.capacidade AS 'capacidade',
                                eventos.status AS 'status'
                                ")->join("cidade", "cidade.id = eventos.cidade_id")->join("uf", "uf.id = cidade.uf_id")->orderBy("eventos.data_inicio")->findAll();
    }

}