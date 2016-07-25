<?php $this->layout('layout', ['title' => 'Galerie !']) ?>

<?php $this->start('main_content') ?>
<h2>Liste de galeries</h2>
<div class="row">
    <div class="col-md-12 text-left">
        <?php foreach ($galerieListe as $key => $value) : ?>
            <ul class="list-group">
                <li class="list-group-item">
                    <a class="btn btn-primary btn-sm" href="<?= $this->url('galerie_add') ?>"><span class="fa fa-pencil-square-o"></span> Ajouter une galerie</a>
                </li>
                <li class="list-group-item">
                    <a href="<?= $this->url('galerie_photos', ['id' => $value['id']]) ?>"><?= $value['gal_name'] . '<br/> ' . $value['gal_legend'] ?></a>
                </li>
                <?php if (isset($_SESSION['user']['use_role_opt1'])): ?>
                    <?php if ($_SESSION['user']['use_role_opt1'] === '2'): ?>
                        <li class="list-group-item">
                            <a class="btn btn-primary btn-sm" href="<?= $this->url('galerie_update', ['id' => $value['id']]) ?>"><span class="fa fa-pencil fa-fw"></span> Editer</a>
                            <a class="btn btn-danger btn-sm" href="<?= $this->url('galerie_deleteConfirmation', ['id' => $value['id']]) ?>"><span class="fa fa-trash-o fa-fw"></span> Supprimer</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        <?php endforeach ?>
    </div>
</div>	
<?php $this->stop('main_content') ?>
