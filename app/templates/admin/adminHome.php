<?php $this->layout('layout', ['title' => 'Page Administrateur']) ?>

<?php $this->start('main_content') ?>
<h2>Page admin</h2>
<div class="row">
	<div class="col-md-12 text-left">
	    <a href="<?= $this->url('admin_listeUsers') ?>" class="btn btn-success btn-sm">
      	<span class="fa fa-wpforms fa-fw"></span> Liste des utilisateurs
    	</a>
    	<span class="help-block"></span>
    	<a href="<?= $this->url('admin_listeParticipants') ?>" class="btn btn-success btn-sm">
      	<span class="fa fa-wpforms fa-fw"></span> Liste des participants
    	</a>
    	<span class="help-block"></span>
    	<a href="<?= $this->url('admin_listeExposants') ?>" class="btn btn-success btn-sm">
      	<span class="fa fa-wpforms fa-fw"></span> Liste des exposants
    	</a>
    	<span class="help-block"></span>
    	<a href="<?= $this->url('admin_listeSponsors') ?>" class="btn btn-success btn-sm">
      	<span class="fa fa-wpforms fa-fw"></span> Liste des sponsors
    	</a>
	</div>
</div>
<?php $this->stop('main_content') ?>
<i class="fa fa-wpforms" aria-hidden="true"></i>