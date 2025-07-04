<?php

namespace App\Controller;

use App\Model\QuemSomosModel;
use Core\Library\ControllerMain;
use Core\Library\Redirect;
use Core\Library\Files;
use Core\Library\Validator;
use Core\Library\Session;
class QuemSomos extends ControllerMain
{
    protected $files;


    public function __construct()
    {
        $this->auxiliarconstruct();
        $this->loadHelper('formHelper');
        $this->files = new Files();
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
            'imagem' => $QuemSomosModel->lista('imagem'),
            'status' => $QuemSomosModel->lista('status')     
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

        if (Validator::make($post, $this->model->validationRules)) {
            return Redirect::page($this->controller . "/form/insert/0");
        } else {

            // Faz upload da imagem
            if (!empty($_FILES['imagem']['name'])) {
                $nomeRetornado = $this->files->upload($_FILES, 'quemsomos');
                if (is_bool($nomeRetornado)) {
                    Session::set('inputs', $post);
                    return Redirect::page($this->controller . "/form/insert/" . $post['id']);
                } else {
                    $post['imagem'] = $nomeRetornado[0];
                }
            } else {
                $post['imagem'] = $post['nomeImagem'] ?? null;
            }
            

            if ($this->model->insert($post)) {
                return Redirect::page($this->controller, ["msgSucesso" => "Registro inserido com sucesso."]);
            } else {
                return Redirect::page($this->controller . "/form/insert/0");
            }
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

        if (Validator::make($post, $this->model->validationRules)) {
            return Redirect::page($this->controller . "/form/update/" . $post['id']);
        } else {

            if (!empty($_FILES['imagem']['name'])) {
                $nomeRetornado = $this->files->upload($_FILES, 'quemsomos');
                if (is_bool($nomeRetornado)) {
                    Session::set('inputs', $post);
                    return Redirect::page($this->controller . "/form/update/" . $post['id']);
                } else {
                    $post['imagem'] = $nomeRetornado[0];
                }
                if (isset($post['nomeImagem'])) {
                    $this->files->delete($post['nomeImagem'], 'quemsomos');
                }
            } else {
                $post['imagem'] = $post['nomeImagem'] ?? null;
            }

            unset($post['nomeImagem']);

            if ($this->model->update($post)) {
                return Redirect::page($this->controller, ["msgSucesso" => "Registro alterado com sucesso."]);
            } else {
                return Redirect::page($this->controller . "/form/update/" . $post['id']);
            }
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
            $this->files->delete($post['nomeImagem'], "imagem");
            return Redirect::page($this->controller, ["msgSucesso" => "Registro Excluído com sucesso."]);
        } else {
            return Redirect::page($this->controller);
        }
    }
}