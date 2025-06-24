<?php
// app\controller\Home.php

namespace App\Controller;

use Core\Library\ControllerMain;

class Home extends ControllerMain
{
    public function index()
    {
        $EventoModel = new \App\Model\EventoModel();
        $dados = $EventoModel->listaEvento();
        return $this->loadView("home", ['dados' => $dados]);
    }

    public function sobre($action = null)
    {
        echo "Página sobre nós. AÇÃO: {$action}";
    }

    public function produtos()
    {
        $EventoModel = new \App\Model\EventoModel();
        $dados = $EventoModel->listaEvento(); // ou o método correto para listar produtos/eventos
        return $this->loadView("produtos", ['dados' => $dados]);
    }

    public function detalhes($action = null, $id = null, ...$params)
    {
        echo "Detalhes: <br />";
        echo "<br />Ação: " . $action;
        echo "<br />ID: " . $id;
        echo "<br />PARÂMETROS: " . implode(", ", $params);
    }

    public function quemSomos()
    {
        $quemSomosModel = new \App\Model\QuemSomosModel();
        $dados = $quemSomosModel->listaQuemSomos();
        return $this->loadView("quemsomos", ['dados' => $dados]);
    }
}