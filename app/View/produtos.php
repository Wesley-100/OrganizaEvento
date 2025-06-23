<?php if (count($dados) > 0): ?>
    <div class="row">
        <?php foreach ($dados as $value): ?>
            <div class="col-md-4 mb-3">
                <div class="card h-100">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $value['nome'] ?></h5>
                        <p class="card-text"><?= $value['wiki'] ?></p>
                    </div>
                    <ul class="list-group list-group-flush">
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
