<?php

use Core\Library\Session;

?>

        <div class="container my-5">
            <div class="row justify-content-center align-items-stretch">
                <!-- Formulário -->
                <div class="col-lg-6 d-flex flex-column justify-content-center">
                    <div class="fale-form-box p-4 p-md-5 rounded-4 shadow-sm bg-white">
                        <h2 class="mb-4 titulo-fale">Fale Conosco</h2>
                        <?php if ($msg = Session::getDestroy("msgSuccess")): ?>
                            <div class="alert alert-success text-center" role="alert">
                                <?= $msg ?>
                            </div>
                        <?php endif; ?>
                        <form method="post" action="<?= baseUrl() ?>faleconosco/enviar">
                            <input type="text" name="assunto" class="form-control form-control-lg mb-3" placeholder="Assunto" required />
                            <input type="text" name="nome" class="form-control form-control-lg mb-3" placeholder="Seu nome" required />
                            <input type="email" name="email" class="form-control form-control-lg mb-3" placeholder="Seu email" required />
                            <textarea name="mensagem" rows="5" class="form-control form-control-lg mb-3" placeholder="Sua mensagem" required></textarea>
                            <button type="submit" class="btn btn-primary btn-lg w-100">Enviar Mensagem</button>
                        </form>
                    </div>
                </div>
                <!-- Contato/Endereço -->
                <div class="col-lg-5 d-flex flex-column justify-content-center">
                    <div class="fale-info-box p-4 p-md-5 rounded-4 bg-white shadow-sm">
                        <div class="mb-4">
                            <div class="fale-info-titulo"><i class="fa fa-map-marker-alt me-2"></i>Praça Aninna Bisegna, 40 - Centro.</div>
                            <div class="fale-info-text">Muriaé - MG, 36880-000</div>
                        </div>
                        <div class="mb-4">
                            <div class="fale-info-titulo"><i class="fa fa-phone-alt me-2"></i><a href="tel:553237211026">55 (32) 3721 1026</a></div>
                            <div class="fale-info-text">De segunda a sexta, das 9h às 18h</div>
                        </div>
                        <div>
                            <div class="fale-info-titulo"><i class="fa fa-envelope me-2"></i><a href="mailto:nexxcommsistemas@gmail.com">contato@organizaeventos.com.br</a></div>
                            <div class="fale-info-text">Envie sua consulta a qualquer momento!</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<script src="<?= baseUrl() ?>assets/js/jquery-3.5.1.min.js"></script>

