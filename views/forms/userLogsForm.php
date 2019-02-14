<div class="row justify-content-md-center" style="margin-top:15px;">
	<div class="card col-md-9">
		<div class = "container" >
		<h4 class="card-title mb-4 mt-1">My Request Logs</h4><hr>	
	<?php  if(!empty($call_Log)){ ?>
		
		<div class="table-responsive">
		<table class="table">
			<thead>
				<th>Request Description</th>
				<th>Request Date</th>
				<th>Status</th>
				<th>Mechanic Requested</th>
				<th>Date Attended</th>
			</thead>
			<tbody>
		<?php
				foreach($call_Log as $call){
					echo '<tr><td>'.$call['c_description'].'</td><td>'.$call['date_created'].'</td><td>'.$call['status_name'].'</td><td>'.$call['tech'].
						'</td><td>'.$call['date'].'</td></tr>';
				}
			
		?>
		</tbody>
		</table>
		</div>
		<?php 
		} else{
			echo'<div class="alert alert-primary" role="alert">
					<b>No Call Records</b>		
				</div>';
		}
		?>
	</div>
	</div>
</div>
