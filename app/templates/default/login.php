<?php $this->layout('layout', ['title' => 'Login !']) ?>

<?php $this->start('main_content') ?>

	<div class="row">
		<div class="col-md-6 text-left">
			<h1>Login</h1>

			<form action="#" method="POST" role="form">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
					<input type="text" name="usernameOrEmail" value="" required="" placeholder="username or email" class="form-control text-left">
				</div>

				<span class="help-block"></span>

				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-unlock" aria-hidden="true"></i></span>
					<input type="password" name="password" value="" required="" placeholder="password" class="form-control text-left">
				</div>
				<span class="help-block"></span>
				<button class="btn btn-primary btn-block btn-md" type="submit" value="Login">Login</button>	
				<span class="help-block"></span>
				<p><a href="<?= $this->url('user_forgot') ?>" class="btn btn-default btn-md">Forgot password?</a>
				<a href="<?= $this->url('user_signup') ?>" class="btn btn-default btn-md">Register</a></p>
			</form>
		</div>

		<?php if (isset($erreur)): ?>
		<div class="col-md-6 text-left">
			<div class="alert-message error">
            <div class="box-icon"></div>
            <p>This is an alert box<a href="" class="close">&times;</a>
          </div>
		</div>
		<?php endif; ?>
	</div>

<?php $this->stop('main_content') ?>
