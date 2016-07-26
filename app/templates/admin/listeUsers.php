<?php $this->layout('layout', ['title' => 'Liste des Utilisateurs du site']) ?>

<?php $this->start('main_content') ?>
<h2>Liste des Utilisateurs</h2>
<div class="row">
	<div class="col-md-12 text-left">
	    <ul class="no-margin-top">
	        <?php foreach ($listeUsers as $user): ?>
	        <li>
	        	<p><?= $user['use_first_name'].' '.$user['use_name'] ?></p>
	        	<a href="<?= $this->url('user_admin_edit',['id'=>$user['id']]) ?>" class="btn btn-primary btn-sm">
        		<span class="fa fa-pencil fa-fw"></span> Editer
        		</a>
        		<span class="help-block"></span>
	        </li>
	        <?php endforeach; ?>
	    </ul>
    </div>
</div>
<?php $this->stop('main_content') ?>
