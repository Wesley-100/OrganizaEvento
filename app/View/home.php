<?php
$registros = $dados['dados'] ?? [];

$eventosAtivos = array_filter($registros, fn($v) => $v['status'] == 1);
?>

<div class="mt-4 mb-4">
    <h2>Bem-vindo ao OrganizaEvento!</h2>
    <p class="lead">Confira abaixo os eventos que acontecerão nos próximos dias. Aproveite para participar e ficar por dentro das novidades!</p>
</div>

<?php if (count($eventosAtivos) > 0): ?>
    
    <?php
    $eventosPorSlide = 3;
    $eventosAtivos = array_values($eventosAtivos); // Garante índices numéricos
    $total = count($eventosAtivos);
    ?>
    <div class="container-fluid px-0">
        <div id="eventosCarrossel" class="carousel slide mb-5" data-bs-ride="carousel">
            <div class="carousel-inner">
                <?php for ($i = 0; $i < $total; $i += $eventosPorSlide): ?>
                    <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                        <div class="row justify-content-center">
                            <?php for ($j = $i; $j < $i + $eventosPorSlide && $j < $total; $j++): ?>
                                <?php $evento = $eventosAtivos[$j]; ?>
                                <div class="col-md-4 d-flex flex-column align-items-center">
                                    <?php if (!empty($evento['imagem'])): ?>
                                        <img src="<?= baseUrl() . 'imagem.php?file=imagem/' . urlencode($evento['imagem']) ?>"
                                             class="d-block mb-2"
                                             alt="Imagem do evento"
                                             style="max-height: 180px; max-width: 100%; background:#fff; padding:16px;" />
                                    <?php endif; ?>
                                    <div class="carousel-legenda mt-2 mb-4">
                                        <h5><?= $evento['nome'] ?? '' ?></h5>
                                        <p><?= $evento['wiki'] ?? '' ?></p>
                                        <small>
                                            <b>Início:</b> <?= date('d/m/Y', strtotime($evento['data_inicio'])) ?> |
                                            <b>Fim:</b> <?= date('d/m/Y', strtotime($evento['data_termino'])) ?> |
                                            <b>Capacidade:</b> <?= $evento['capacidade'] ?>
                                        </small>
                                    </div>
                                </div>
                            <?php endfor; ?>
                        </div>
                    </div>
                <?php endfor; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#eventosCarrossel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#eventosCarrossel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Próximo</span>
            </button>
        </div>
    </div>
<?php else: ?>
    <div class="alert alert-warning mt-5 mb-5" role="alert">
        Não foram localizados eventos ativos...
    </div>
<?php endif; ?>

