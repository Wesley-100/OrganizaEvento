<script type="text/javascript" src="<?= baseUrl(); ?>assets/js/quemsomos.js"></script>

<?= formTitulo('Quem Somos') ?>

<form method="POST" action="<?= $this->request->formAction() ?>">

    <input type="hidden" name="id" id="id" value="<?= setValor('id') ?>">

    <div class="row m-2">

        <div class="mb-3 col-8">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título de quem somos" maxlength="60" value="<?= setValor('titulo') ?>" required autofocus>
            <?= setMsgFilderError('titulo') ?>
        </div>
        <div class="mb-3 col-4">
            <label for="statusRegistro" class="form-label">Status</label>
            <select class="form-select" name="statusRegistro" id="statusRegistro" aria-label="Large select statusRegistro" required>
                <option value="0" <?= (setValor('statusRegistro') == ""  ? 'selected': "") ?>>...</option>
                <option value="1" <?= (setValor('statusRegistro') == "1" ? 'selected': "") ?>>Ativo</option>
                <option value="2" <?= (setValor('statusRegistro') == "2" ? 'selected': "") ?>>Inativo</option>
            </select>
            <?= setMsgFilderError('statusRegistro') ?>
        </div>

        

        <div class="row">
            <div class="col-12 mt-3 mb-3">
                <label for="textoQuem" class="form-label">Informe detalhes de quem somos</label>
                <textarea class="form-control" id="texto" name="texto"><?= setValor("texto") ?></textarea>
                <?= setMsgFilderError("texto") ?>
            </div>
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