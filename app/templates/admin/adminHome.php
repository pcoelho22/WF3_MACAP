<?php $this->layout('layoutContact', ['title' => 'Page Administrateur']) ?>

<?php $this->start('main_content') ?>
<h2>Page admin</h2>
<div class="row">
    <a class="btn btn-link btn-md" href="<?= $this->url('admin_listeUsers') ?>">Liste des Utilisateurs du Site</a><br/>
    <a class="btn btn-link btn-md" href="<?= $this->url('admin_listeParticipants') ?>">Liste des Participants du Site</a><br/>
    <a class="btn btn-link btn-md" href="<?= $this->url('admin_listeExposants') ?>">Liste des Exposants du Site</a><br/>
    <a class="btn btn-link btn-md" href="<?= $this->url('admin_listeSponsors') ?>">Liste des Sponsors du Site</a>
</div>
<?php $this->stop('main_content') ?>
