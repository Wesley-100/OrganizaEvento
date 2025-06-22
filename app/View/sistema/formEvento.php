<?= formTitulo("Evento") ?>

<div class="m-2">
    <form method="POST" action="<?= $this->request->formAction() ?>">

        <input type="hidden" name="id" id="id" value="<?= setValor("id") ?>">

        <div class="row">
            <div class="col-6 mb-3">
                <label for="nome" class="form-label">Nome do Evento</label>
                <input type="text" class="form-control" id="nome" name="nome"
                        placeholder="Nome do Evento" maxlength="50"
                        value="<?= setValor("nome") ?>" required autofocus>
                <?= setMsgFilderError("nome") ?>
            </div>
            
            <div class="col-md-6 mb-3">
                <label for="cidade_id" class="form-label">Cidade</label>
                <select class="form-control" id="cidade_id" name="cidade_id" required>
                    <option value="">...</option>
                    <?php foreach ($dados['cidades'] as $cidade): ?>
                        <option value="<?= $cidade['id'] ?>"
                            <?= ($cidade['id'] == setValor('cidade_id') ? 'selected' : '') ?>>
                            <?= $cidade['nome'] ?> - <?= $cidade['sigla'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <?= setMsgFilderError("cidade_id") ?>
            </div>
        </div>

        <!-- Cidade e Status (lado a lado) -->
        <div class="row">
            <div class="col-md-3 mb-3">
            <label for="data_inicio" class="form-label">Data de Início</label>
            <input type="date" class="form-control" id="data_inicio" name="data_inicio"
                value="<?= formataDataIso(setValor('data_inicio')) ?>" required>
                <?= setMsgFilderError("data_inicio") ?>
            </div>
            
            <div class="col-md-3 mb-3">
                <label for="data_termino" class="form-label">Data de Término</label>
                <input type="date" class="form-control" id="data_termino" name="data_termino"
                value="<?= formataDataIso(setValor('data_termino')) ?>" required>
                <?= setMsgFilderError("data_termino") ?>
            </div>
            
            <div class="col-md-3 mb-3">
                <label for="capacidade" class="form-label">Capacidade (pessoas)</label>
                <input type="number" class="form-control" id="capacidade" name="capacidade"
                    min="1" step="1" value="<?= setValor('capacidade') ?>" required>
                <?= setMsgFilderError("capacidade") ?>
            </div>

            <div class="col-md-3 mb-3">
                <label for="status" class="form-label">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="">...</option>
                    <option value="1" <?= (setValor('status') == 1 ? 'selected' : '') ?>>Ativo</option>
                    <option value="2" <?= (setValor('status') == 2 ? 'selected' : '') ?>>Inativo</option>
                </select>
                <?= setMsgFilderError("status") ?>
            </div>
        </div>
    </div>

        <!-- Wiki (linha inteira) -->
        <div class="row">
            <div class="col-12 mb-3">
                <label for="wiki" class="form-label">Descrição / Wiki</label>
                <textarea class="form-control" id="wiki" name="wiki"><?= setValor("wiki") ?></textarea>
                <?= setMsgFilderError("wiki") ?>
            </div>
        </div>

        <?= formButton() ?>
    </form>
</div>
