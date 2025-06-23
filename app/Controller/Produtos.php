<?php

namespace App\Controller;

use App\Model\ProdutoModel;
use Core\Library\ControllerMain;

class Produtos extends ControllerMain
{
    private $produtoModel;

    public function __construct()
    {
        $this->auxiliarconstruct();
        $this->loadHelper('formHelper');

        $this->produtoModel = new ProdutoModel();
    }

    public function index()
    {
        // Usa diretamente a propriedade instanciada
        return $this->loadView("sistema/listaProduto", $this->produtoModel->listaProdutos());
    }
}
