<h1>Dashboard</h1>
<?php if(isset($_SESSION['success'])){ ?>
	<div class="alert alert-success"><?php echo $_SESSION['success']; ?> </div>
<?php } ?>	
<h2>Hello <?php echo $_SESSION['user']->client_name; ?></h2>

