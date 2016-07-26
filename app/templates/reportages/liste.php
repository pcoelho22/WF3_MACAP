<?php $this->layout('layout', ['title' => 'Reportages!']) ?>

<?php $this->start('main_content') ?>
<h2>Liste des reportages</h2>


<div class="row">
    <div class="col-md-12 text-left">
        <ul class="list-group">
           <li class="list-group-item">
               <a class="btn btn-default btn-sm" href="<?= $this->url('reportages_add') ?>">Ajouter une reportage</a>
           </li>
        </ul>
        <?php foreach ($reportagesListe as $key => $value) : ?>
            <ul class="list-group">
                <li class="list-group-item">
                    <a href="<?= $this->url('reportages_reportagesDetails', ['id' => $value['id']]) ?>"><?= $value['con_type'] . '<br/> ' . $value['con_title'] . '<br/> ' . $value['con_synopsis'] ?></a>
                </li>
                <?php if (isset($_SESSION['user']['use_role_opt1'])): ?>
                    <?php if ($_SESSION['user']['use_role_opt1'] === '2'): ?>
                        <li class="list-group-item">
                            <a class="btn btn-default btn-sm" href="<?= $this->url('reportages_update', ['id' => $value['id']]) ?>">Modifier</a>
                            <a class="btn btn-default btn-sm" href="<?= $this->url('reportages_deleteConfirmation', ['id' => $value['id']]) ?>">Delete</a>
                        </li>
                    <?php endif; ?>
                <?php endif; ?>
            </ul>
        <?php endforeach ?>
    </div>
</div>	
<?php $this->stop('main_content') ?>
