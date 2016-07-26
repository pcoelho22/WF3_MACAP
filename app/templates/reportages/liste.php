<?php $this->layout('layout', ['title' => 'Reportages!']) ?>

<?php $this->start('main_content') ?>
<<<<<<< HEAD
    <h2>Liste des reportages</h2>
    <div class="row">
        <div class="col-md-12 text-left">
        <?php if (isset($_SESSION['user']['use_role_opt1'])): ?>
            <?php if ($_SESSION['user']['use_role_opt1'] === '2'): ?>
                <ul class="list-group">
                    <li  class="list-group-item">
                        <a href="<?= $this->url('reportages_add') ?>"><button class="btn btn-primary btn-sm"><span class="fa fa-pencil-square-o"></span>Ajouter une reportages</button></a>
                    </li>
                </ul>
            <?php endif; ?>
        <?php endif; ?>
        <?php foreach ($reportagesListe as $key => $value) : ?>
            <ul class="list-group">
                <li  class="list-group-item">
                    <a href="<?= $this->url('reportages_reportagesDetails',['id'=>$value['id']]) ?>">
                        <img width="120px" heigth="120px" src="<?= $value['con_avatar']?>">
                        <h3><?= $value['con_title']?></h3>
                        <p><?= $value['con_synopsis']?></p>
                    </a>
                </li>
                <?php if (isset($_SESSION['user']['use_role_opt1'])): ?>
                    <?php if ($_SESSION['user']['use_role_opt1'] === '2'): ?>
                        <li class="list-group-item">
                            <a href="<?= $this->url('reportages_update', ['id'=>$value['id']]) ?>"><button class="btn btn-primary btn-sm"><span class="fa fa-pencil fa-fw"></span> Editer</button></a>
                            <a href="<?= $this->url('reportages_deleteConfirmation', ['id'=>$value['id']]) ?>"><button class="btn btn-danger btn-sm"><span class="fa fa-trash-o fa-fw"></span> Supprimer</button></a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
=======
<h2>Liste des reportages</h2>
<div class="row">
    <div class="col-md-12 text-left">
        <ul class="list-group">
        <?php foreach ($reportagesListe as $key => $value) : ?>
            <li class="list-group-item">
                <a class="btn btn-primary btn-sm" href="<?= $this->url('reportages_add') ?>">Ajouter un reportage</a>
            </li>
            <li class="list-group-item">
                <a href="<?= $this->url('reportages_reportagesDetails', ['id' => $value['id']]) ?>"><?= $value['con_type'] . '<br/> ' . $value['con_title'] . '<br/> ' . $value['con_synopsis'] ?></a>
            </li>
            <?php if (isset($_SESSION['user']['use_role_opt1'])): ?>
            <?php if ($_SESSION['user']['use_role_opt1'] === '2'): ?>
            <li class="list-group-item">
                <a class="btn btn-primary btn-sm" href="<?= $this->url('reportages_update', ['id' => $value['id']]) ?>"><span class="fa fa-pencil fa-fw"></span> Editer</a>
                <a class="btn btn-danger btn-sm" href="<?= $this->url('reportages_deleteConfirmation', ['id' => $value['id']]) ?>"><span class="fa fa-trash-o fa-fw"></span> Supprimer</a>
            </li>
            <?php endif; ?>
            <?php endif; ?>
        </ul>
>>>>>>> refs/remotes/origin/master
        <?php endforeach ?>
        </div>
    </div>
<?php $this->stop('main_content') ?>
