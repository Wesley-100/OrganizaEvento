<?php
$registros = $dados['dados'] ?? [];
if (count($registros) > 0): ?>
    <div class="row">
        <?php foreach ($registros as $value): ?>
            <section class="about section-margin pb-xl-70">
                <div class="container">
                    <div class="section-intro mb-lg-4">
                        <h4 class="intro-title">Quem somos?</h4>
                        <h5><?= isset($value['titulo']) ? htmlspecialchars($value['titulo']) : '' ?></h5>
                        <p><?= isset($value['texto']) ? $value['texto'] : '' ?></p>
                        <?php if (!empty($value['imagem'])): ?>
                            <img src="<?= baseUrl() . 'imagem.php?file=quemsomos/' . htmlspecialchars($value['imagem']) ?>" alt="Imagem Quem Somos" class="img-fluid" />
                        <?php endif; ?>
                    </div>
                </div>
            </section>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <div class="alert alert-warning mt-5 mb-5" role="alert">
        Não foram localizados registros...
    </div>
<?php endif; ?>
