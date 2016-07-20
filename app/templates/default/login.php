<?php $this->layout('layout', ['title' => 'Login !']) ?>

<?php $this->start('main_content') ?>

<!--<h2>Se connecter</h2>

<form action="" method="post">
    <label for="usernameOrEmail">Username Or Email</label><br/>
    <input type="text" name="usernameOrEmail" value="" required><br/><br/>

    <label for="password">Password</label><br/>
    <input type="password" name="password" value="" required><br/><br/>

    <input type="submit" value="Login">
</form>
-->

<h1>Login</h1>

<form action="#" method="POST" role="form">
		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
			<input type="text" name="usernameOrEmail" value="" required="" placeholder="username/email" class="form-control text-left">
		</div>

		<span class="help-block"></span>

		<div class="input-group">
			<span class="input-group-addon"><i class="fa fa-unlock" aria-hidden="true"></i></span>
			<input type="password" name="password" value="" required="" placeholder="password" class="form-control text-left">
		</div>
		<span class="help-block"></span>
		<button class="btn btn-primary btn-block btn-md" type="submit" value="Login">Login</button>									
		<div>
			<span class="help-block"></span>
			<p>
			<a href="<?= $this->url('user_forgot') ?>" class="btn btn-default btn-md">Forgot password?</a>
			<a href="<?= $this->url('user_signup') ?>" class="btn btn-default btn-md">Register</a>
			</p>
		</div>
	</form>

<?php if (isset($erreur)){
    echo $erreur;
} ?>

<!--
<br/>
<a href="<?= $this->url('user_signup') ?>"><button>Se crée un compte</button></a>
<a href="<?= $this->url('user_forgot') ?>"><button>Mot de passe oublier</button></a>
-->

<?php $this->stop('main_content') ?>
