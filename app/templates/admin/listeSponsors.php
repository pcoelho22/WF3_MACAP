<?php $this->layout('layout', ['title' => 'Liste des Sponsors du site']) ?>

<?php $this->start('main_content') ?>
<h2>Liste des Sponsors</h2>
<div class="row">
    <div class="col-md-12 text-left">
        <a href="<?= $this->url('sponsor_add') ?>" class="btn btn-primary btn-sm">
        <span class="fa fa-pencil fa-fw"></span> Ajouter un Sponsor
        </a>
        <ul class="no-margin-top">
            <?php foreach ($listeSponsors as $sponsor): ?>
                <li>
                    <p><?= $sponsor['spo_name_sponsors']?></p>
                    <a href="<?= $this->url('sponsor_admin_edit',['id'=>$sponsor['id']]) ?>" class="btn btn-primary btn-sm">
                    <span class="fa fa-pencil fa-fw"></span> Editer
                    </a>
                    <span class="help-block"></span>
                    <a href="<?= $this->url('sponsor_delete',['id'=>$sponsor['id']]) ?>" class="btn btn-danger btn-sm">
                    <span class="fa fa-trash-o fa-fw"></span> Supprimer
                    </a>
                    <span class="help-block"></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php $this->stop('main_content') ?>
