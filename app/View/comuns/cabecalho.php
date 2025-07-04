<?php

use Core\Library\Session;

$nivelUsuario = (int)Session::get("userNivel");

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="AtomPHP, microframework">
        <meta name="autho" content="Aldecir fonseca">

        <title>OrganizaEventos | FASM 2025</title>

        <link href="<?= baseUrl() ?>assets/img/organiza-icone.png" rel="icon" type="image/png">
        
        <link rel="stylesheet" href="<?= baseUrl() ?>/assets/bootstrap/css/style.css">
        <link href="<?= baseUrl() ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="<?= baseUrl() ?>assets/bootstrap/css/style.css">
        

        <!-- Fontawesome -->
        <link href="<?= baseUrl() ?>assets/fontawesome-free-6.7.2-web/css/fontawesome.css" rel="stylesheet" />
        <link href="<?= baseUrl() ?>assets/fontawesome-free-6.7.2-web/css/brands.css" rel="stylesheet" />
        <link href="<?= baseUrl() ?>assets/fontawesome-free-6.7.2-web/css/solid.css" rel="stylesheet" />
        <link href="<?= baseUrl() ?>assets/fontawesome-free-6.7.2-web/css/sharp-thin.css" rel="stylesheet" />
        <link href="<?= baseUrl() ?>assets/fontawesome-free-6.7.2-web/css/duotone-thin.css" rel="stylesheet" />
        <link href="<?= baseUrl() ?>assets/fontawesome-free-6.7.2-web/css/sharp-duotone-thin.css" rel="stylesheet" />
        <!-- Fontawesome -->

        
        <link href="https://fonts.googleapis.com/css?family=Montserrat:700,600,500&display=swap" rel="stylesheet">

        <script src="<?= baseUrl() ?>assets/js/jquery-3.5.1.min.js"></script>
        <script src="<?= baseUrl() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    </head>
    <body>
        <header class="header_area">
        <div class="main_menu container box_1620">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="<?= baseUrl() ?>"><img class="login-img" src="/assets/img/organiza-icone.png" alt="" height="90" width="90"></a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="<?= baseUrl() ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= baseUrl() ?>home/quemsomos">Quem Somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= baseUrl() ?>home/produtos">Eventos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= baseUrl() ?>faleconosco">Fale Conosco</a>
                        </li>

                        <?php if (Session::get("userId")): ?>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <?= htmlspecialchars(Session::get("userNome") ?? 'Usuário') ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="<?= baseUrl() ?>login/signOut">Sair</a></li>
                                    <?php if ($nivelUsuario <= 20): ?>
                                        <li><a class="dropdown-item" href="<?= baseUrl() ?>usuario">Usuario</a></li>
                                    <?php endif; ?>                
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="<?= baseUrl() ?>Usuario/formTrocarSenha">Trocar a Senha</a></li>
                                    <?php if($nivelUsuario <= 20): ?>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="<?= baseUrl() ?>uf">UF's</a></li>
                                    <li><a class="dropdown-item" href="<?= baseUrl() ?>cidade">Cidade</a></li>
                                    <li><a class="dropdown-item" href="<?= baseUrl() ?>evento">Eventos</a></li>
                                    <?php endif; ?>
                                    <?php if ($nivelUsuario <= 10): ?>
                                    <li><a class="dropdown-item" href="<?= baseUrl() ?>quemsomos">Quem Somos</a></li>
                                    <?php endif; ?>
                                </ul>
                            </li>

                        <?php else: ?>

                            <li class="nav-item">
                                <a class="nav-link" href="<?= baseUrl() ?>Login">Login</a>
                            </li>

                        <?php endif; ?>

                    </ul>
                    </div>
                </div>
                </nav>
        </div>
        </header>
        
        <main class="container">