<?php $this->layout('layout', ['title' => 'Magazine']) ?>
<?php $this->start('main_content') ?>
<h2>Liste des Magazines</h2>
<div class="row">
    <div class="col-md-12 text-left">
        <ul class="list-group">
        <?php if (isset($_SESSION['user']['use_role_opt1'])): ?>
        <?php if ($_SESSION['user']['use_role_opt1'] === '2'): ?>
            <li class="list-group-item">
                <a class="btn btn-primary btn-sm" href="<?= $this->url('magazine_add') ?>"><span class="fa fa-pencil-square-o"></span> Ajouter un magazine</a>
            </li>
        <?php endif; ?>
        <?php endif; ?>
        </ul>
        <?php foreach ($magazineListe as $key => $value) : ?>
        <ul class="list-group">
            <li class="list-group-item">
                <a href="<?= $this->assetUrl($value['mag_path']) ?>" target="_blank"><img width="300" height="400" alt="" src="<?= $this->assetUrl($value['mag_couverture']) ?>"></a>
            </li>
            <li  class="list-group-item">
                <a href="<?= $this->assetUrl($value['mag_path']) ?>"><?= $value['mag_name'] . '<br/> ' . $value['mag_date'] ?></a>
            </li>
            <?php if (isset($_SESSION['user']['use_role_opt1'])): ?>
            <?php if ($_SESSION['user']['use_role_opt1'] === '2'): ?>
            <li class="list-group-item">
                <a class="btn btn-primary btn-sm" href="<?= $this->url('magazine_update', ['id' => $value['id']]) ?>"><span class="fa fa-pencil fa-fw"></span> Editer</a>
                <a class="btn btn-danger btn-sm" href="<?= $this->url('magazine_deleteConfirmation', ['id' => $value['id']]) ?>"><span class="fa fa-trash-o fa-fw"></span> Supprimer</a>
            </li>
            <?php endif; ?>
            <?php endif; ?>
        </ul>
        <?php endforeach ?>
    </div>
</div>
<?php $this->stop('main_content') ?>