<?php $this->layout('layout', ['title' => 'Mot de passe oublier?']) ?>

<?php $this->start('main_content') ?>
<h2>Entrer votre email</h2>

<form action="" method="post">
    <label for="email">Username Or Email</label><br/>
    <input type="email" name="email" value="" required><br/><br/>
    <input type="submit" value="Valider">
</form>
<?php if (isset($error)){
    echo $error;
} ?>

<br/>

<?php $this->stop('main_content') ?>
