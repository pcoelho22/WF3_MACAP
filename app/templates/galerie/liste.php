<?php $this->layout('layout', ['title' => 'Galerie !']) ?>

<?php $this->start('main_content') ?>
<h2>Liste de galeries</h2>
<div class="row">
    <div class="col-md-12 text-left">
        <ul class="list-group">
            <li class="list-group-item">
                <a class="btn btn-default btn-sm" href="<?= $this->url('galerie_add') ?>">Ajouter une reportages</a>
            </li>
        </ul>
        <?php foreach ($galerieListe as $key => $value) : ?>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="<?= $this->url('galerie_photos', ['id' => $value['id']]) ?>"><?= $value['gal_name'] . '<br/> ' . $value['gal_legend'] ?></a>
                </li>
                <?php if (isset($_SESSION['user']['use_role_opt1'])): ?>
                    <?php if ($_SESSION['user']['use_role_opt1'] === '2'): ?>
                        <li class="list-group-item">
                            <a class="btn btn-default btn-sm" href="<?= $this->url('galerie_update', ['id' => $value['id']]) ?>">Modifier</a>
                            <a class="btn btn-default btn-sm" href="<?= $this->url('galerie_deleteConfirmation', ['id' => $value['id']]) ?>">Delete</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        <?php endforeach ?>
    </div>
</div>	
<?php $this->stop('main_content') ?>
