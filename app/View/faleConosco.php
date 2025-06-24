<?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
        <ul class="mb-0">
            <?php foreach ($errors as $err): ?>
                <li><?= $err ?></li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>

<div class="col-12 mb-3">
    <?= exibeAlerta() ?>
</div>

<div class="row justify-content-center mt-5">
    <div class="col-md-7 col-lg-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0">Fale Conosco</h4>
            </div>
            <div class="card-body p-4">
                <form action="<?= getenv('BASEURL') ?>FaleConosco/enviar" method="post">
                    <div class="mb-3">
                        <label class="form-label">Nome:</label>
                        <input type="text" name="nome" class="form-control" value="<?= $post['nome'] ?? '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">E-mail:</label>
                        <input type="email" name="email" class="form-control" value="<?= $post['email'] ?? '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Assunto:</label>
                        <input type="text" name="assunto" class="form-control" value="<?= $post['assunto'] ?? '' ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Mensagem:</label>
                        <textarea name="mensagem" rows="5" class="form-control" required><?= $post['mensagem'] ?? '' ?></textarea>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg">Enviar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
