<div class="container">
	<div class="row">
		<div class="col-12 offset-sm-2">
			<h1>Your Income, <?php if(isset($_SESSION['user'])){ echo $_SESSION['user']->client_name; } ?> </h1>
			<div class="col-md-10 ">
				<table class="table table-striped" >
					<tr>
						<th>Income Heading</th>
						<th>Date</th>
						<th>Amount</th>
						
						<th>Edit/ Delete</th>
						
					</tr>
					
						<?php if($income){ $amt = 0;
							foreach($income as $inc){
							 $amt= $amt+ $inc->amount;?>
								<tr>
									<td><?php echo $inc->income_heading ?></td>
									<td><?php echo $inc->date ?></td>
									<td><?php echo "Rs"." ".$inc->amount ?></td>
									<td> <a href="<?php echo base_url(); ?>index.php/income/delete/<?= $inc->income_id ?>" class="btn btn-danger" >Delete</a>
										 <a href="<?php echo base_url(); ?>index.php/income/edit/<?= $inc->income_id ?>" class="btn btn-danger" >Edit</a> 
									</td>
								</tr>
						<?php } ?>
						<tr>
							<td>Total Income</td>
							<td></td>
							<td><?="Rs"." ".$amt ?></td>
							<td></td>
							
						</tr> 
					<?php } ?>
					
				</table>
			</div>
		</div>
	</div>
	
	
</div>
		
