<?php

use Core\Library\Session;

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sobre Nós | AtomPHP</title>

    <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Fontawesome -->
    <link href="<?= baseUrl() ?>assets/fontawesome-free-6.7.2-web/css/all.css" rel="stylesheet" />

    <!-- Fonte Mulish -->
    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />

    <style>
        body {
            font-family: 'Mulish', sans-serif;
            background-color: #f5f7fa;
            margin: 0;
            padding: 0;
        }
        main {
            padding: 60px 20px 80px;
            max-width: 900px;
            margin: 0 auto;
        }
        h2 {
            text-align: center;
            margin-bottom: 40px;
            font-weight: 700;
            color: #222;
        }
        .sobre-nos-form {
            display: flex;
            justify-content: center;
            margin-bottom: 60px;
        }
        .sobre-nos-form form {
            width: 100%;
            max-width: 600px;
            background: #fff;
            padding: 30px 35px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .sobre-nos-form form input,
        .sobre-nos-form form textarea {
            width: 100%;
            margin-bottom: 20px;
            padding: 14px 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 1rem;
            transition: border-color 0.3s ease;
        }
        .sobre-nos-form form input:focus,
        .sobre-nos-form form textarea:focus {
            border-color: #007bff;
            outline: none;
        }
        .sobre-nos-form form button {
            width: 100%;
            padding: 15px;
            background-color: #007bff;
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .sobre-nos-form form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <main>
        <h2>Fale Conosco</h2>

        <?php if ($msg = Session::getDestroy("msgSuccess")): ?>
            <div class="alert alert-success text-center" role="alert">
                <?= $msg ?>
            </div>
        <?php endif; ?>

        <div class="sobre-nos-form">
            <form method="post" action="<?= baseUrl() ?>faleconosco/enviar">
                <input type="text" name="nome" placeholder="Seu nome" required />
                <input type="email" name="email" placeholder="Seu email" required />
                <textarea name="mensagem" rows="5" placeholder="Sua mensagem" required></textarea>
                <button type="submit">Enviar Mensagem</button>
            </form>
        </div>
    </main>

    <script src="<?= baseUrl() ?>assets/js/jquery-3.5.1.min.js"></script>
</body>
</html>
