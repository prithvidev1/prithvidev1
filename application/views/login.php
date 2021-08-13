<div class="row">
		<div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
			<div class="container">
			<h3>Login</h3>	
			<hr>

			<form class="form-control" action="" method="post">
				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" name="username" value="<?= set_value('username') ?>">
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input type="text" class="form-control" name="password" value="">
				</div>
				<?php if(isset($error)){ ?>
				<div class="col-12">
					<div class="alert alert-danger" roles="alert">
						<p><?php echo validation_errors(); ?></p>
						
					</div>
				</div>

				<?php } ?>

				<div class="row">
					<div class="col-12 col-sm-4">
						<button type="submit" name="login" class="btn btn-primary">Login</button>
					</div>
					<div class="col-12 col-sm-8 text-right">
						<a href="/register">Don't have an account?</a>
					</div>	
				</div>
				
			</form>
			</div>
		</div>
	</div>