<?php $this->layout('layout', ['title' => 'Events!']) ?>

<?php $this->start('main_content') ?>
<h2>Liste des Events</h2>
<div class="row">
    <div class="col-md-12 text-left">
    <?php if (isset($_SESSION['user']['use_role_opt1'])): ?>
        <?php if ($_SESSION['user']['use_role_opt1'] === '2'): ?>
        <ul class="list-group">
            <li  class="list-group-item">
                <a href="<?= $this->url('events_add') ?>"><button class="btn btn-primary btn-sm"><span class="fa fa-pencil-square-o"></span>Ajouter un Event</button></a>
            </li>
        </ul>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>
<?php foreach ($eventsListe as $key => $value) : ?>
<ul class="list-group">
    <li  class="list-group-item">
        <a href="<?= $this->url('events_eventsDetails',['id'=>$value['id']]) ?>">
            <div class="row">
                <img class="col-md-2 text-left" width="120px" heigth="120px" src="<?= $this->assetUrl($value['con_avatar'])?>">
                <div class="col-md-10 text-left">
                    <h3><?= $value['con_title']?></h3>
                    <p><?= $value['con_synopsis']?></p>
                </div>
            </div>
        </a>
    </li>
    <?php if (isset($_SESSION['user']['use_role_opt1'])): ?>
        <?php if ($_SESSION['user']['use_role_opt1'] === '2'): ?>
            <li class="list-group-item">
                <a href="<?= $this->url('events_update', ['id' => $value['id']]) ?>"><button class="btn btn-primary btn-sm"><span class="fa fa-pencil fa-fw"></span> Editer</button></a>
                <a href="<?= $this->url('events_deleteConfirmation', ['id' => $value['id']]) ?>"><button class="btn btn-danger btn-sm"><span class="fa fa-trash-o fa-fw"></span> Supprimer</button></a>
            </li>
        <?php endif; ?>
    <?php endif; ?>
</ul>
<?php endforeach ?>

<?php $this->stop('main_content') ?>
