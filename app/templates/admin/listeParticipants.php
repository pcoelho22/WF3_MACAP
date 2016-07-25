<?php $this->layout('layout', ['title' => 'Liste des Participants du site']) ?>

<?php $this->start('main_content') ?>
<h2>Liste des Participants</h2>
<div class="row">
    <div class="col-md-12 text-left">
        <a href="<?= $this->url('participant_add') ?>" class="btn btn-primary btn-sm">
        <span class="fa fa-pencil fa-fw"></span> Ajouter un Participant
        </a>
        <ul class="no-margin-top">
            <?php foreach ($listeParticipants as $participants): ?>
                <li>
                    <p><?= $participants['par_first_name'].' '.$participants['use_name'] ?></p>
                    <a href="<?= $this->url('participant_admin_edit',['id'=>$participants['id']]) ?>" class="btn btn-primary btn-sm">
                    <span class="fa fa-pencil fa-fw"></span> Editer
                    </a>
                    <span class="help-block"></span>
                    <a href="<?= $this->url('participant_delete',['id'=>$participants['id']]) ?>" class="btn btn-danger btn-sm">
                    <span class="fa fa-trash-o fa-fw"></span> Supprimer
                    </a>
                    <span class="help-block"></span>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div>
<?php $this->stop('main_content') ?>
