<?php

namespace App\Controller;

use Core\Library\ControllerMain;
use Core\Library\Session;
use Core\Library\Email;

class Faleconosco extends ControllerMain
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Exibe o formulário de contato
     */
    public function index()
    {
        $this->loadView("comuns/faleconosco");
    }

    public function enviar()
    {
        $nome = trim($_POST['nome'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $mensagem = trim($_POST['mensagem'] ?? '');

        if (empty($nome) || empty($mensagem) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            Session::set("msgError", "Preencha todos os campos corretamente.");
            return \Core\Library\Redirect::page("faleconosco");
        }

        $assunto = "Novo contato pelo site";
        $corpoEmail = "<h1>Mensagem de $nome</h1><p>$mensagem</p><p>Email: $email</p>";

        $enviado = Email::enviaEmail(
            "no-reply@seudominio.com",
            "Fale Conosco",
            $assunto,
            $corpoEmail,
            "nexxcommsistemas@gmail.com"
        );

        if ($enviado) {
            Session::set("msgSuccess", "Sua mensagem foi enviada com sucesso!");
        } else {
            Session::set("msgError", "Não foi possível enviar a sua mensagem no momento.");
        }

        return \Core\Library\Redirect::page("faleconosco");
    }
}
