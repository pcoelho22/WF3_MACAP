<?php $this->layout('layout', ['title' => 'Liste des Exposants du site']) ?>

<?php $this->start('main_content') ?>
<h2>Liste des Exposants du site</h2>
<div class="row">
    <a class="" href="<?= $this->url('exposant_add') ?>">Ajouter un Exposant</a>
    <ul class="list-inline no-margin-top small">
        <?php foreach ($listeExposants as $exposant): ?>
            <li>
                <p><?= $exposant['exp_name_exposants']?></p>
                <a class="" href="<?= $this->url('exposant_admin_edit',['id'=>$exposant['id']]) ?>">Editer</a>
                <a class="" href="<?= $this->url('exposant_delete',['id'=>$exposant['id']]) ?>">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php $this->stop('main_content') ?>
