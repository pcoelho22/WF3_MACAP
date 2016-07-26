<?php $this->layout('layout', ['title' => 'Events !']) ?>

<?php $this->start('main_content') ?>
<h2>Liste de events</h2>
<div class="row">
    <div class="col-md-12 text-left">
    <?php if (isset($_SESSION['user']['use_role_opt1'])): ?>
        <?php if ($_SESSION['user']['use_role_opt1'] === '2'): ?>
            <ul class="list-group">
                <li  class="list-group-item">
                    <a href="<?= $this->url('events_add') ?>"><button class="btn btn-primary btn-sm"><span class="fa fa-pencil-square-o"></span>Ajouter un event</button></a>
                </li>
            </ul>
         <?php endif; ?>
    <?php endif; ?>
    <?php foreach ($eventsListe as $key => $value) : ?>
        <ul class="list-group">
                <li  class="list-group-item">
                    <a href="<?= $this->url('events_eventsDetails',['id'=>$value['id']]) ?>">
                        <img width="120px" heigth="120px" src="<?= $value['con_avatar']?>">
                        <h3><?= $value['con_title']?></h3>
                        <p><?= $value['con_synopsis']?></p>
                    </a>
                </li>
            <?php if (isset($_SESSION['user']['use_role_opt1'])): ?>
                <?php if ($_SESSION['user']['use_role_opt1'] === '2'): ?>
                    <li class="list-group-item">
                        <a href="<?= $this->url('events_update', ['id' => $value['id']]) ?>"><button class="btn btn-primary btn-sm"><span class="fa fa-pencil fa-fw"></span>Editer</button></a>
                        <a href="<?= $this->url('events_delete', ['id' => $value['id']]) ?>"><button class="btn btn-danger btn-sm"><span class="fa fa-trash-o fa-fw"></span>Supprimer</button></a>
                    </li>
                <?php endif; ?>
            <?php endif; ?>
        </ul>
    <?php endforeach ?>
    </div>
</div>	
<?php $this->stop('main_content') ?>
