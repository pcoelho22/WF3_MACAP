<?php $this->layout('layout', ['title' => 'Liste des Utilisateurs du site']) ?>

<?php $this->start('main_content') ?>
<h2>Liste des Utilisateurs du site</h2>
<div class="row">
    <ul class="list-inline no-margin-top small">
        <?php foreach ($listeUsers as $user): ?>
        <li>
            <p><?= $user['use_first_name'].' '.$user['use_name'] ?></p>
            <a class="" href="<?= $this->url('user_admin_edit',['id'=>$user['id']]) ?>">Editer</a>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php $this->stop('main_content') ?>
