<div class="container">
	<div class="row">
		<div class="col-12 offset-sm-2">
			<h1>Your Expense, <?php if(isset($_SESSION['user'])){ echo $_SESSION['user']->client_name; } ?> </h1>
			<div class="col-md-10 ">
				<table class="table table-striped" >
					<tr>
						<th>Expense Heading</th>
						<th>Date</th>
						<th>Amount</th>
						
						<th>Edit/ Delete</th>
						
					</tr>
					
						<?php if($expense){ $amt = 0;
							foreach($expense as $exp){
							 $amt= $amt+ $exp->amount;?>
								<tr>
									<td><?php echo $exp->exp_heading ?></td>
									<td><?php echo $exp->date ?></td>
									<td><?php echo "Rs"." ".$exp->amount ?></td>
									<td> <a href="<?php echo base_url(); ?>index.php/income/delete/<?= $exp->exp_id ?>" class="btn btn-danger" >Delete</a>
										 <a href="<?php echo base_url(); ?>index.php/income/edit/<?= $exp->exp_id ?>" class="btn btn-danger" >Edit</a> 
									</td>
								</tr>
						<?php } ?>
						<tr>
							<td>Total Expense</td>
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
		
