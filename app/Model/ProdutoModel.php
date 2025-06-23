<?php

namespace App\Model;

use Core\Library\ModelMain;

class ProdutoModel extends ModelMain
{
    protected $table = "eventos";

    /**
     * Retorna lista de produtos
     *
     * @return array
     */
    public function listaProdutos()
    {
        return $this->db->select("
            eventos.nome        AS nome,
            eventos.wiki        AS wiki,
            eventos.data_inicio AS data_inicio,
            eventos.data_termino AS data_termino,
            eventos.capacidade  AS capacidade
        ")
        ->orderBy("eventos.data_inicio")
        ->findAll();
    }
}
