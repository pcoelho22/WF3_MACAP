<?php $this->layout('layout', ['title' => 'Password reset']) ?>

<?php $this->start('main_content') ?>
<h2>Changer de mot de passe</h2>
<div class="row">

    <div class="col-md-7 text-left">
		<form action="" method="post" role="form">
			<span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></span>
                <input type="password" name="password" value="" required="" placeholder="Enter Password (minumum 6 charactères avec au moins 1 majuscule et 1 chiffre)" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></span>
                <input type="password" name="passwordVal" value="" required="" placeholder="Re-enter Password (minumum 6 charactères avec au moins 1 majuscule et 1 chiffre)" class="form-control text-left">
            </div>
		    <span class="help-block"></span>
            <button class="btn btn-primary btn-sm active" type="submit" value="Changer de mot de passe"><i class="fa fa-pencil fa-fw"></i>Changer de mot de passe</button>
		</form>
	</div>
    <span class="help-block"></span>
	<?php if (isset($error)): ?>
    <div class="col-md-5 text-left">
        <div class="alert alert-danger fade in" rows="auto">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Erreur!</strong><br>
            <ul>
                <?php foreach ($error as $value): ?>
                    <li><?= $value ?></li>
                <?php endforeach; ?>    
            </ul>
        </div>
    </div> 
    <?php endif; ?>
</div>
<?php $this->stop('main_content') ?>
