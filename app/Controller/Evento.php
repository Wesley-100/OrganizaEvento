<?php

namespace App\Controller;

use App\Model\CidadeModel;
use App\Model\EventoModel;
use Core\Library\ControllerMain;
use Core\Library\Redirect;
use \DateTime;
use Core\Library\Validator;
use Core\Library\Session;
use Core\Library\Files;
class Evento extends ControllerMain
{
    protected Files $files;
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
        return $this->loadView("sistema\listaEvento", $this->model->listaEvento());
    }

    public function form($action, $id)
    {
        $EventoModel = new EventoModel();
        $CidadeModel = new CidadeModel();

        $dados = [
            'data' => $EventoModel->getById($id),
            'cidades' => $CidadeModel->listaCidade(),
            'nome' => $EventoModel->lista('nome'),
            'wiki' => $EventoModel->lista('wiki'),
            'data_inicio' => $EventoModel->lista('data_inicio'),
            'data_termino' => $EventoModel->lista('data_termino'),
            'nome' => $EventoModel->lista('nome'),
            'capacidade' => $EventoModel->lista('capacidade'),
            'status' => $EventoModel->lista('status'),
            'imagem' => $EventoModel->lista('imagem')       
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

        if (Validator::make($post, $this->model->validationRules)) {
            return Redirect::page($this->controller . "/form/insert/0");
        } else {

            // Faz upload da imagem
            if (!empty($_FILES['imagem']['name'])) {
                $nomeRetornado = $this->files->upload($_FILES, 'imagem');
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
                $nomeRetornado = $this->files->upload($_FILES, 'imagem');
                if (is_bool($nomeRetornado)) {
                    Session::set('inputs', $post);
                    return Redirect::page($this->controller . "/form/update/" . $post['id']);
                } else {
                    $post['imagem'] = $nomeRetornado[0];
                }
                if (isset($post['nomeImagem'])) {
                    $this->files->delete($post['nomeImagem'], 'imagem');
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