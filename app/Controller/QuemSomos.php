<?php

namespace App\Controller;

use App\Model\QuemSomosModel;
use Core\Library\ControllerMain;
use Core\Library\Redirect;
class QuemSomos extends ControllerMain
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
        return $this->loadView("sistema\listaQuemSomos", $this->model->listaQuemSomos());
    }

    public function form($action, $id)
    {
        $QuemSomosModel = new QuemSomosModel();
        

        $dados = [
            'data' => $QuemSomosModel->getById($id),
            'titulo' => $QuemSomosModel->lista('titulo'),
            'texto' => $QuemSomosModel->lista('texto'),
            'imagem1' => $QuemSomosModel->lista('imagem1'),
            'imagem2' => $QuemSomosModel->lista('imagem2'),
            'statusRegistro' => $QuemSomosModel->lista('statusRegistro')     
        ];

        return $this->loadView("sistema/formQuemSomos", $dados);
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