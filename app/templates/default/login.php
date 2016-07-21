<?php $this->layout('layout', ['title' => 'Login !']) ?>

<?php $this->start('main_content') ?>

	<div class="row">
		<div class="col-md-6 text-left">
			<h1>Login</h1>

			<form action="#" method="POST" role="form">
				<div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user fa-fw" aria-hidden="true"></i></span>
                    <input id="usernameOrEmail" type="text" name="userName" value="" required="" placeholder="username or email" class="form-control text-left">
                </div>
                <span class="help-block"></span>
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-lock fa-fw" aria-hidden="true"></i></span>
					<input id="password" type="password" name="password" value="" required="" placeholder="password" class="form-control text-left">
				</div>

				<span class="help-block"></span>
				<button class="btn btn-primary btn-sm active" type="submit" value="Login" href="#"><i class="fa fa-sign-in fa-fw"></i> Login</button>	
				<span class="help-block"></span>
				<p><a href="<?= $this->url('user_forgot') ?>" class="btn btn-default btn-sm">Forgot password?</a>
				<a href="<?= $this->url('user_signup') ?>" class="btn btn-default btn-sm">Register</a></p>
			</form>
		</div>

		<?php if (isset($erreur)): ?>
		<div class="col-md-6 text-left">
			<div class="form-group">
				<textarea class="form-control alert-message error" rows="3" id="comment"></textarea>
            	<p>This is an alert box<a href="" class="close">&times;</a>
            </div>
      	</div>
		<?php endif; ?>
	</div>

<?php $this->stop('main_content') ?>
