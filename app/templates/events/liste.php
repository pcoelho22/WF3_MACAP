<?php $this->layout('layout', ['title' => 'Events !']) ?>

<?php $this->start('main_content') ?>
<h2>Liste de events</h2>
<div class="row">
    <div class="col-md-12 text-left">
        <?php foreach ($eventsListe as $key => $value) : ?>
            <ul class="list-group">
                <li class="list-group-item">
                    <a class="btn btn-default btn-sm" href="<?= $this->url('events_add') ?>">Ajouter une news</a>
                </li>
                <li class="list-group-item">
                    <img alt="" src="<?= $value['con_avatar'] ?>" width="120" heigth="120">
                    <div class="detailsTitleevents"><?= $value['con_title'] ?></div>
                </li>
                <li  class="list-group-item">
                    <a href="<?= $this->url('events_eventsDetails', ['id' => $value['id']]) ?>">Title: <?= $value['con_title'] . '<br/> ' . 'Synopsis: ' . $value['con_synopsis'] ?></a>
                </li>
                <?php if (isset($_SESSION['user']['use_role_opt1'])): ?>
                    <?php if ($_SESSION['user']['use_role_opt1'] === '2'): ?>
                        <li class="list-group-item">
                            <a class="btn btn-default btn-sm" href="<?= $this->url('events_update', ['id' => $value['id']]) ?>">Modifier</a>
                            <a class="btn btn-default btn-sm" href="<?= $this->url('events_delete', ['id' => $value['id']]) ?>">Delete</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        <?php endforeach ?>
    </div>
</div>	
<?php $this->stop('main_content') ?>
