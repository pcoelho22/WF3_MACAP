<?php $this->layout('layout', ['title' => 'Page Administration']) ?>

<?php $this->start('main_content') ?>
<h2>Page Administration</h2>
<div class="row">
	<div class="col-md-12 text-left">
	    <a href="<?= $this->url('admin_listeUsers') ?>" class="admBtn btn-lm btn btn-success">
      	<span class="fa fa-wpforms fa-fw"></span> Liste des utilisateurs
    	</a>
    	<span class="help-block"></span>
    	<a href="<?= $this->url('admin_listeParticipants') ?>" class="admBtn btn-lm btn btn-success">
      	<span class="fa fa-wpforms fa-fw"></span> Liste des participants
    	</a>
    	<span class="help-block"></span>
    	<a href="<?= $this->url('admin_listeExposants') ?>" class="admBtn btn-lm btn btn-success">
      	<span class="fa fa-wpforms fa-fw"></span> Liste des exposants
    	</a>
    	<span class="help-block"></span>
    	<a href="<?= $this->url('admin_listeSponsors') ?>" class="admBtn btn-lm btn btn-success">
      	<span class="fa fa-wpforms fa-fw"></span> Liste des sponsors
    	</a>
	</div>
</div>
<?php $this->stop('main_content') ?>
<i class="fa fa-wpforms" aria-hidden="true"></i>