

<?= formTitulo('Quem Somos') ?>

<form method="POST" action="<?= $this->request->formAction() ?>" enctype="multipart/form-data">

    <input type="hidden" name="id" id="id" value="<?= setValor('id') ?>">

    <div class="row m-2">

        <div class="mb-3 col-8">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título de quem somos" maxlength="60" value="<?= setValor('titulo') ?>" required autofocus>
            <?= setMsgFilderError('titulo') ?>
        </div>
        <div class="mb-3 col-4">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status" id="status" aria-label="Large select status" required>
                <option value="0" <?= (setValor('status') == ""  ? 'selected': "") ?>>...</option>
                <option value="1" <?= (setValor('status') == "1" ? 'selected': "") ?>>Ativo</option>
                <option value="2" <?= (setValor('status') == "2" ? 'selected': "") ?>>Inativo</option>
            </select>
            <?= setMsgFilderError('status') ?>
        </div>

        

        <div class="row">
            <div class="col-12 mt-3 mb-3">
                <label for="textoQuem" class="form-label">Informe detalhes de quem somos</label>
                <textarea class="form-control" id="texto" name="texto"><?= setValor("texto") ?></textarea>
                <?= setMsgFilderError("texto") ?>
            </div>
        </div>
        <div class="row">
            <?php if (in_array($this->request->getAction(), ['insert', 'update'])): ?>
                <div class="mb-3 col-12">
                    <label for="imagem" class="form-label">Imagem</label>
                    <input type="file" class="form-control" id="imagem" name="imagem" placeholder="Anexar a Imagem" maxlength="100" value="<?= setValor('imagem') ?>">
                    <?= setMsgFilderError('imagem') ?>
                </div>
            <?php endif; ?>

            <?php if (trim(setValor("imagem")) != ""): ?>
                <div class="mb-3 col-12">
                    <h5>Imagem</h5>
                    <img src="<?= baseUrl() . 'imagem.php?file=quemsomos/' . setValor("imagem") ?>" class="img-thumbnail" height="120" width="240" alt="imagem">
                    <input type="hidden" name="nomeImagem" id="nomeImagem" value="<?= setValor("imagem") ?>">
                </div>
            <?php endif; ?>
        </div>
        
    </div>

    <div class="m-3">
        <?= formButton() ?>
    </div>

</form>
<script src="<?= baseUrl() ?>assets/ckeditor5/ckeditor5-build-classic/ckeditor.js"></script>

<script type="text/javascript">

    ClassicEditor
        .create(document.querySelector('#texto'))
        .catch( error => {
            console.error(error);
        });

</script>