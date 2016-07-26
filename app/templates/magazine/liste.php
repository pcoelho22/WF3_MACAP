<?php $this->layout('layout', ['title' => 'Magazine!']) ?>

<?php $this->start('main_content') ?>
<h2>Liste des Magazines</h2>
<div class="row">
    <div class="col-md-12 text-left">
        <?php if (isset($_SESSION['user']['use_role_opt1'])): ?>
        <?php if ($_SESSION['user']['use_role_opt1'] === '2'): ?>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="<?= $this->url('magazine_add') ?>"><button class="btn btn-primary btn-sm"><span class="fa fa-pencil-square-o"></span>Ajouter un Magazine</button></a>
            </li>
        </ul>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>
<?php foreach ($magazineListe as $key => $value) : ?>
<ul class="list-group">
    <li class="list-group-item">
        <a href="<?= $this->assetUrl($value['mag_path']) ?>" target="_blank">
            <div class="row">
                <img class="col-md-3 text-left" width="300" height="400" alt="" src="<?= $this->assetUrl($value['mag_couverture']) ?>">
                <div class="col-md-9 text-left">
                    <h3><?= $value['mag_name'] ?></h3>
                    <p><?= $value['mag_date'] ?></p>                    
                </div>
            </div>
        </a>
    </li>
    <?php if (isset($_SESSION['user']['use_role_opt1'])): ?>
        <?php if ($_SESSION['user']['use_role_opt1'] === '2'): ?>
            <li class="list-group-item">
                <a href="<?= $this->url('magazine_update', ['id' => $value['id']]) ?>"><button class="btn btn-primary btn-sm"><span class="fa fa-pencil fa-fw"></span> Editer</button></a>
                <a href="<?= $this->url('magazine_deleteConfirmation', ['id' => $value['id']]) ?>"><button class="btn btn-danger btn-sm"><span class="fa fa-trash-o fa-fw"></span> Supprimer</button>
                </a>
            </li>
        <?php endif; ?>
    <?php endif; ?>
</ul>
<?php endforeach ?>

<?php $this->stop('main_content') ?>