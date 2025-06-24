<?php
$registros = $dados['dados'] ?? [];
?>

<?php if (count($registros) > 0): ?>
    <div class="row">
        <?php foreach ($registros as $value): ?>
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
                        <h5 class="card-title"><?= isset($value['nome']) ? $value['nome'] : '' ?></h5>
                        <p class="card-text"><?= isset($value['wiki']) ? $value['wiki'] : '' ?></p>
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
<?php else: ?>
    <div class="alert alert-warning mt-5 mb-5" role="alert">
        Não foram localizados registros...
    </div>
<?php endif; ?>

