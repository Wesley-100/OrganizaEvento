<?php
namespace App\Controller;

use Core\Library\ControllerMain;
use Core\Library\Redirect;
use PHPMailer\PHPMailer\PHPMailer;

class FaleConosco extends ControllerMain
{
    public function __construct()
    {
        $this->auxiliarconstruct();
        $this->loadHelper('formHelper');
    }

    /**
     * Exibe o formulário de contato
     */
    public function index()
    {
        return $this->loadView('home/faleConosco');
    }

    /**
     * Processa o envio do formulário
     */
    public function enviar()
    {
        $post = $this->request->getPost();

        // Validação básica
        $errors = [];
        if (empty($post['nome']))    $errors[] = 'Nome é obrigatório.';
        if (empty($post['email']) || !filter_var($post['email'], FILTER_VALIDATE_EMAIL))
            $errors[] = 'E-mail inválido.';
        if (empty($post['assunto'])) $errors[] = 'Assunto é obrigatório.';
        if (empty($post['mensagem']))$errors[] = 'Mensagem é obrigatória.';

        if ($errors) {
            return $this->loadView('home/faleConosco', compact('errors', 'post'));
        }

        // Envio de e-mail via PHPMailer
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = getenv('MAIL.HOST');
            $mail->SMTPAuth   = filter_var(getenv('MAIL.SMTPAuth'), FILTER_VALIDATE_BOOLEAN);
            $mail->Username   = getenv('MAIL.USER');
            $mail->Password   = getenv('MAIL.PASSWORD');
            $mail->SMTPSecure = getenv('MAIL.SMTPSECURE');
            $mail->Port       = getenv('MAIL.PORT');

            $mail->setFrom(getenv('MAIL.USER'), getenv('MAIL.NOME'));
            $mail->addAddress(getenv('MAIL.USER'));
            $mail->addReplyTo($post['email'], $post['nome']);

            $mail->isHTML(true);
            $mail->Subject = "[Fale Conosco] {$post['assunto']}";
            $mail->Body    = '<p><strong>Nome:</strong> ' . $post['nome'] . '</p>' .
                             '<p><strong>E-mail:</strong> ' . $post['email'] . '</p>' .
                             '<p><strong>Assunto:</strong> ' . $post['assunto'] . '</p>' .
                             '<p><strong>Mensagem:</strong><br>' . nl2br($post['mensagem']) . '</p>';


            $mail->send();
            $success = 'Mensagem enviada com sucesso!';
            return $this->loadView('home/faleConosco', compact('success'));

        } catch (\Exception $e) {
            $errors[] = 'Falha ao enviar: ' . $e->getMessage();
            return $this->loadView('home/faleConosco', compact('errors', 'post'));
        }
    }
}
