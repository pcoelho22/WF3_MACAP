<?php $this->layout('layout', ['title' => 'Liste des Sponsors du site']) ?>

<?php $this->start('main_content') ?>
<h2>Liste des Sponsors du site</h2>
<div class="row">
    <a class="" href="<?= $this->url('sponsor_add') ?>">Ajouter un Sponsor</a>
    <ul class="list-inline no-margin-top small">
        <?php foreach ($listeSponsors as $sponsor): ?>
            <li>
                <p><?= $sponsor['spo_name_sponsors']?></p>
                <a class="" href="<?= $this->url('sponsor_admin_edit',['id'=>$sponsor['id']]) ?>">Editer</a>
                <a class="" href="<?= $this->url('sponsor_delete',['id'=>$sponsor['id']]) ?>">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php $this->stop('main_content') ?>
