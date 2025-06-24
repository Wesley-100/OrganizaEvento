<?php 
    use Core\Library\Session;
?>
<div class="row m-2">

    <div class="mb-3 col-12">
        Bem vindo, <strong> <?= htmlspecialchars(Session::get("userNome") ?? 'Usuário') ?></strong>, à área Administrativa do <strong>OrganizaEventos!</strong>
    </div>

</div>

