<?php
$registros = $dados['dados'] ?? ['first' => ''];
if (count($registros) > 0): ?>
    <div class="container my-5">
        <?php foreach ($registros as $value): ?>
            <div class="row align-items-center justify-content-center">
                <div class="col-12 mb-4">
                    <h4 class="intro-title mb-4" style="font-weight:bold; text-align:left; border-bottom:2px solid #ccc; display:inline-block;">
                        Quem somos?
                    </h4>
                </div>
                <div class="col-12 col-md-4 text-center mb-4 mb-md-0">
                    <?php if (!empty($value['imagem'])): ?>
                        <img src="<?= baseUrl() . 'imagem.php?file=quemsomos/' . htmlspecialchars($value['imagem']) ?>" alt="Imagem Quem Somos" class="img-fluid rounded shadow" style="max-width: 320px; background:#fff; padding:16px;" />
                    <?php endif; ?>
                </div>
                <div class="col-12 col-md-8">
                    <h2 class="mb-3" style="font-weight:bold;"><?= isset($value['titulo']) ? htmlspecialchars($value['titulo']) : '' ?></h2>
                    <div class="mb-4" style="font-size:1.1rem;">
                        <?= isset($value['texto']) ? $value['texto'] : '' ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="alert alert-warning mt-5 mb-5 text-center" role="alert">
        Não foram localizados registros...
    </div>
<?php endif; ?>
