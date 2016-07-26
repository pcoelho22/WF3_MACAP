<?php $this->layout('layout', ['title' => 'Mot de passe oublier?']) ?>

<?php $this->start('main_content') ?>
<h4>Veuillez introduire votre adresse email afin de pouvoir réinitialiser votre mot de passe</h4>
<div class="row">
    <?php if (isset($error)): ?>
    <div class="col-md-5 text-left">
        <div class="alert alert-danger fade in" rows="auto">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Erreur!</strong><br><?= $error ?>
        </div>
    </div>
    <?php endif; ?>
</div>
<div class="row">
    <div class="col-md-5 text-left">
        <form action="#" method="POST" role="form">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                <input id="email" type="email" name="email" value="" required="" placeholder="Email" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <button class="btn btn-primary btn-sm active" type="submit"><i class="fa fa-envelope fa-fw"></i> Envoyer</button>
        </form>   
    </div>
</div>
<?php $this->stop('main_content') ?>
