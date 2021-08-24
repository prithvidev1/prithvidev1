    <div class="row">
		<div class="col-12 col-sm8- offset-sm-2 col-md-6 offset-md-3 mt-5 pt-3 pb-3 bg-white from-wrapper">
			<div class="container">
			<h3>Profile</h3>
			
			<form class="form-control" action="" method="post">
		<div class="row">
				<div class="form-group">
					<label for="name">Name</label>
					<input type="text" class="form-control" name="client_name" required="required" value="<?= set_value('client_name', $user->client_name) ?>" >
				</div>

				<div class="form-group">
					<label for="name">Address</label>
					<input type="text" class="form-control" name="address" required="required" value="<?= set_value('address', $user->address) ?>" >
				</div>

				<div class="form-group">
					<label for="name">Email</label>
					<input type="text" class="form-control" name="email" readonly="readonly" value="<?= set_value('email', $user->email) ?>" >
				</div>

				<div class="form-group">
					<label for="username">Username</label>
					<input type="text" class="form-control" name="username" readonly="readonly" value="<?= set_value('username', $user->username) ?>"  >
				</div>

				<div class="form-group">
					<label for="password">Password</label>
					<input type="password" class="form-control" name="password">
				</div>  

				
				
		</div>

				<div class="row">
					<div class="col-12 col-sm-4">
						<button type="submit" name="edit" class="btn btn-primary">Edit</button>
					</div>
					
				</div>
				
			</form>
			</div>
		</div>
	</div>
