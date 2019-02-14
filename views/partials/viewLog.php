
<div class="row justify-content-md-center" style="margin:15px;">
	<div class="col-md-9">
		<h4 class="card-title mb-4 mt-1">User Request(s)</h4><hr>	
		<div class="card justify-content-md-center">	
	<?php
	if(!empty($log)){
	?>

			<table id ="tech_table" class="table table-hover"">
				<thead>
					<th>Name</th>
					<th>Request Description</th>
					<th>Request Date</th>
					<th>Address</th>
					<th>Status</th>
					<th>Attend Client</th>
				</thead>
				<tbody>
			<?php
				$count = 1;
				foreach($log as $call){
					?>
					<tr>
						<td><?= $call['u_name'].' '.$call['u_surname']?></td>
						<td><?= $call['c_description']?></td>				
						<td><?= $call['date_created']?></td>					
						<td>
						<?php
						echo $call['street']. '<br>';
						echo $call['city']. ', '. $call['province']. '<br>';
						echo $call['zip']. '<br>';
						?>
							
						</td>
						<td>
							<?php
							$count++;
							$status = $run->getStatusName($call['c_status']);
							echo $status[0]['status_name'];	
							$close = "";
							$pick = "";
							$bgClose = "btn-primary";
							$bgPick = "btn-primary";
								if($status[0]['status_name'] == 'Open'){
									$close = "disabled";
									$bgClose = "btn-secondary";									
								}else{
									$pick = "disabled";
									$bgPick = "btn-secondary";
								}		
							?>
						</td>
						<td>
						<div class="row">
							<form method="POST">
							<button type="submit" name ="pick" style="margin-right:2px;"value="<?= $call['c_id']?>" <?= $pick; ?> class="btn <?= $bgPick; ?>">Pick</button>
							</form>
							<form method="POST">
							<button type="submit" name ="close" value="<?= $call['c_id']?>" <?= $close; ?> class="btn <?= $bgClose; ?>">Done</button>
							</form>
						</div>
						</td>
					</tr>
					<?php
				}
			?>
			</tbody>
			</table>
		</div>
	</div>
<?php
	}else{
			echo'<div class="alert alert-primary" role="alert">
					<b>No Request Records</b>		
				</div>';
		}
			
?>
<script src="core/js/sort.js"></script>