<?php
$registros = $dados['dados'] ?? [];

$eventosAtivos = array_filter($registros, fn($v) => $v['status'] == 1);
$eventosPassados = array_filter($registros, fn($v) => $v['status'] != 1);
?>

<?php if (count($registros) > 0): ?>
    <?php if (count($eventosAtivos) > 0): ?>
        <div class="row">
            <h3 class="mt-5"><b>Eventos Atuais:</b></h3>
            <?php foreach ($eventosAtivos as $value): ?>
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="w-100 d-flex justify-content-center align-items-center" style="min-height:200px;">
                            <?php if (!empty($value['imagem'])): ?>
                                <img src="<?= baseUrl() . 'imagem.php?file=imagem/' . urlencode($value['imagem']) ?>"
                                    alt="Imagem do evento"
                                    class="img-fluid rounded shadow"
                                    style="max-width: 220px; background:#fff; padding:16px;" />
                            <?php endif; ?>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $value['nome'] ?? '' ?></h5>
                            <p class="card-text"><?= $value['wiki'] ?? '' ?></p>
                        </div>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item"><b>Início:</b> <?= date('d/m/Y', strtotime($value['data_inicio'])) ?></li>
                            <li class="list-group-item"><b>Fim:</b> <?= date('d/m/Y', strtotime($value['data_termino'])) ?></li>
                            <li class="list-group-item"><b>Capacidade:</b> <?= $value['capacidade'] ?></li>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <!-- Eventos Passados -->
    <?php if (count($eventosPassados) > 0): ?>
        <hr>
        <h3><b>Eventos passados</b></h3>
        <div class="row">
            <?php foreach ($eventosPassados as $value): ?>
                <div class="col-md-4 mb-3">
                    <div class="card h-100">
                        <div class="w-100 d-flex justify-content-center align-items-center" style="min-height:200px;">
                            <?php if (!empty($value['imagem'])): ?>
                                <img src="<?= baseUrl() . 'imagem.php?file=imagem/' . urlencode($value['imagem']) ?>"
                                    alt="Imagem do evento"
                                    class="img-fluid rounded shadow"
                                    style="max-width: 220px; background:#fff; padding:16px;" />
                            <?php endif; ?>
                        </div>
                        <div class="card-body text-center">
                            <h5 class="card-title"><?= $value['nome'] ?? '' ?></h5>
                            <p class="card-text"><?= $value['wiki'] ?? '' ?></p>
                        </div>
                        <ul class="list-group list-group-flush text-center">
                            <li class="list-group-item"><b>Início:</b> <?= date('d/m/Y', strtotime($value['data_inicio'])) ?></li>
                            <li class="list-group-item"><b>Fim:</b> <?= date('d/m/Y', strtotime($value['data_termino'])) ?></li>
                            <li class="list-group-item"><b>Capacidade:</b> <?= $value['capacidade'] ?></li>
                        </ul>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
<?php else: ?>
    <div class="alert alert-warning mt-5 mb-5" role="alert">
        Não foram localizados registros...
    </div>
<?php endif; ?>

