<?php

namespace App\Model;

use Core\Library\ModelMain;

class QuemSomosModel extends ModelMain
{
    protected $table = "quemsomos";
    
    public $validationRules = [
        "titulo" => [
            "label" => 'Título',
            "rules" => 'required|min:3|max:50'
        ],
        "texto" => [
            "label" => 'Texto',
            "rules" => 'required|min:3|max:1000'
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
    public function listaQuemSomos()
    {
        return $this->db->select("
                id,
                titulo,
                statusRegistro
            ")
            ->orderBy("id", "DESC")
            ->findAll();
    }


}