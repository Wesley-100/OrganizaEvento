<?= formTitulo("Lista Eventos", true) ?>

<?php if (count($dados) > 0): ?>

    <div class="m-2">

    <p>
        <i class="fa-sharp-duotone fa-light fa-bell"></i>
    </p>

        <table class="table table-bordered table-striped table-hover table-sm" id="tbListaEvento">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">UF</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dados as $value): ?>
                    <tr>
                        <th scope="row"><?= $value['id'] ?></th>
                        <td><?= $value['nome'] ?></td>
                        <td><?= $value['Cidade'] ?></td>
                        <td><?= $value['sigla'] ?></td>                
                        <td>
                            <?= buttons('view', $value['id'])  ?>
                            <?= buttons('update', $value['id'])  ?>
                            <?= buttons('delete', $value['id'])  ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>

    <?= datatables("tbListaEvento") ?>

<?php else: ?>

    <div class="alert alert-warning mt-5 mb-5" role="alert">
        Não foram localizados registros...
    </div>

<?php endif; ?>