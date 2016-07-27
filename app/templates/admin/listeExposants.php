<?php $this->layout('layout', ['title' => 'Liste des Exposants du site']) ?>

<?php $this->start('main_content') ?>
<h2>Page Administration - Liste des Exposants</h2>
<div class="row">
    <div class="col-md-12 text-left">
        <a href="<?= $this->url('exposant_add') ?>" class="btn btn-primary btn-sm">
        <span class="fa fa-pencil fa-fw"></span> Ajouter un Exposant
        </a>
        <ul class="list-inline no-margin-top small">
            <?php foreach ($listeExposants as $exposant): ?>
                <li>
                    <p><?= $exposant['exp_name_exposants']?></p>
                    <a class="" href="<?= $this->url('exposant_admin_edit',['id'=>$exposant['id']]) ?>"> Editer</a>
                    <a class="" href="<?= $this->url('exposant_delete',['id'=>$exposant['id']]) ?>"> Supprimer</a>
                </li>
            <?php endforeach; ?>
        </ul>
        <a class="btn btn-default btn-sm" href="<?= $this->url('admin_home') ?>"><i class="fa fa-angle-left fa-fw"></i> Retour</a>
    </div>
</div>
<?php $this->stop('main_content') ?>
