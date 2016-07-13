<?php $this->layout('layout', ['title' => 'Login !']) ?>

<?php $this->start('main_content') ?>
<h2>Se connecter</h2>

<form action="" method="post">
    <label for="usernameOrEmail">Username Or Email</label><br/>
    <input type="text" name="usernameOrEmail" value="" required><br/><br/>

    <label for="password">Password</label><br/>
    <input type="password" name="password" value="" required><br/><br/>

    <input type="submit" value="Login">
</form>
<?php if (isset($erreur)){
    echo $erreur;
} ?>

<br/>
<a href="<?= $this->url('user_signup') ?>"><button>Se crée un compte</button></a>
<a href="<?= $this->url('user_forgot') ?>"><button>Mot de passe oublier</button></a>

<?php $this->stop('main_content') ?>
