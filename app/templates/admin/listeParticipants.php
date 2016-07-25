<?php $this->layout('layout', ['title' => 'Liste des Participants du site']) ?>

<?php $this->start('main_content') ?>
<h2>Liste des Participants du site</h2>
<div class="row">
    <a class="" href="<?= $this->url('participant_add') ?>">Ajouter un Participant</a>
    <ul class="list-inline no-margin-top small">
        <?php foreach ($listeParticipants as $participants): ?>
            <li>
                <p><?= $participants['par_first_name'].' '.$participants['use_name'] ?></p>
                <a class="" href="<?= $this->url('participant_admin_edit',['id'=>$participants['id']]) ?>">Editer</a>
                <a class="" href="<?= $this->url('participant_delete',['id'=>$participants['id']]) ?>">Supprimer</a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>
<?php $this->stop('main_content') ?>
