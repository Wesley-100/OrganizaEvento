<?= formTitulo("Lista quem somos", true) ?>
<?php
use Core\Library\Session;
$aStatus = ["1" => "Ativo", "2" => "Inativo", "3" => "Bloqueado"];

?>
<?php if (count($dados) > 0): ?>

    <div class="m-2">

        <table class="table table-bordered table-striped table-hover table-sm">
            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Titulo</th>
                    <th scope="col">Status</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dados as $value): ?>
                    <tr>
                        <th scope="row"><?= $value['id'] ?></th>
                        <td><?= $value['titulo'] ?></td>
                        <td><?= $aStatus[$value['status']] ?></td>
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

<?php else: ?>

    <div class="alert alert-warning mt-5 mb-5" role="alert">
        Não foram localizados registros...
    </div>

<?php endif; ?>