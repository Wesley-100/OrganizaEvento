<?php

namespace App\Controller;

use App\Model\EventoModel;
use Core\Library\ControllerMain;
use Core\Library\Redirect;

class Evento extends ControllerMain
{
    public function __construct()
    {
        $this->auxiliarconstruct();
        $this->loadHelper('formHelper');
    }

    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        return $this->loadView("sistema\listaEvento", $this->model->listaEvento());
    }

    public function form($action, $id)
    {
        $EventoModel = new EventoModel();

        $dados = [
            'data' => $this->model->getById($id), 
            'nome' => $EventoModel->lista('nome'),
            'cidade' => $EventoModel->lista('nome'),
            // 'uf' => $EventoModel->lista('sigla')
            'wiki' => $EventoModel->lista('wiki'),
            'data_inicio' => $EventoModel->lista('data_inicio'),
            'data_termino' => $EventoModel->lista('data_termino'),
            'nome' => $EventoModel->lista('nome'),
            'capacidade' => $EventoModel->lista('capacidade'),
            'status' => $EventoModel->lista('status')       
        ];
        
        return $this->loadView("sistema/formEvento", $dados);
    }

    /**
     * insert
     *
     * @return void
     */
    public function insert()
    {
        $post = $this->request->getPost();

        if ($this->model->insert($post)) {
            return Redirect::page($this->controller, ["msgSucesso" => "Registro inserido com sucesso."]);
        } else {
            return Redirect::page($this->controller . "/form/insert/0");
        }
    }

    /**
     * update
     *
     * @return void
     */
    public function update()
    {
        $post = $this->request->getPost();

        if ($this->model->update($post)) {
            return Redirect::page($this->controller, ["msgSucesso" => "Registro alterado com sucesso."]);
        } else {
            return Redirect::page($this->controller . "/form/update/" . $post['id']);
        }
    }

    /**
     * delete
     *
     * @return void
     */
    public function delete()
    {
        $post = $this->request->getPost();

        if ($this->model->delete($post)) {
            return Redirect::page($this->controller, ["msgSucesso" => "Registro Excluído com sucesso."]);
        } else {
            return Redirect::page($this->controller);
        }
    }
}