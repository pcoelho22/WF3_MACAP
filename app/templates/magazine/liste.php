<?php $this->layout('layout', ['title' => 'Magazine']) ?>
<?php $this->start('main_content') ?>
<h2>Liste des magazines disponible</h2>
<div class="row">
    <div class="col-md-12 text-left">
        <ul class="list-group">
            <?php if (isset($_SESSION['user']['use_role_opt1'])): ?>
                <?php if ($_SESSION['user']['use_role_opt1'] === '2'): ?>
                    <li class="list-group-item">
                        <a class="btn btn-default btn-sm" href="<?= $this->url('magazine_add') ?>">Ajouter un magazine</a>
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
                            <a class="btn btn-default btn-sm" href="<?= $this->url('magazine_update', ['id' => $value['id']]) ?>">Modifier</a>
                            <a class="btn btn-default btn-sm" href="<?= $this->url('magazine_delete', ['id' => $value['id']]) ?>">Delete</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        <?php endforeach ?>
    </div>
</div>
<?php $this->stop('main_content') ?>