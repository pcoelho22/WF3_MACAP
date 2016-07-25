<?php $this->layout('layout', ['title' => 'Mot de passe oublier?']) ?>

<?php $this->start('main_content') ?>

<div class="row">
    <div class="col-md-5 text-left">
        <h4>Veuillez introduire votre adresse email afin de pouvoir réinitialiser votre mot de passe</h4>

        <form action="#" method="POST" role="form">
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                <input id="email" type="email" name="email" value="" required="" placeholder="Email" class="form-control text-left">
            </div>
            <span class="help-block"></span>
            <button class="btn btn-primary btn-sm active" type="submit" value="Login" href="#"><i class="fa fa-envelope fa-fw"></i> Envoyer</button>
        </form>   
    </div>
</div>

<?php
if (isset($error)) {
    echo $error;
}
?>

<?php $this->stop('main_content') ?>
