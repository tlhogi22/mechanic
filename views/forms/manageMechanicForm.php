<div class="container col-md-9" style = "margin-top:15px;">
<div class="card row justify-content-md-center"  style = "padding:15px;">
	<h4 class="card-title mb-4 mt-1">Manage Mechanic</h4><hr>
	
	<div class="card justify-content-md-center">	
		<div class="table-responsive" >
		<?php if(!empty($mechanics)){ ?>
		<table class="table" id="dataTable">
			<thead>
				<th>Name</th>
				<th>Surname</th>
				<th>Email</th>
				<th>Phne</th>
				<th>Manage</th>
			</thead>
			<tbody>
		<?php			
				foreach($mechanics as $mechanic){

					$activate = "";
					$bgActivate = "btn-primary";
					
					$deactivate = "disabled";
					$bgDeactivate = "btn-secondary";
					
					if($mechanic['status'] == 1){
						$activate = "disabled";
						$bgActivate = "btn-secondary";
						
						$deactivate = "";
						$bgDeactivate = "btn-primary";
					}
								
					echo '<tr>
					<td>'.$mechanic['m_name'].'</td>
					<td>'.$mechanic['m_surname'].'</td>
					<td>'.$mechanic['m_email'].'</td>
					<td>'.$mechanic['m_phone'].'</td>
					<td>
						<div class="row">
							<form method="POST">
							<button type="submit" name ="active_mechanic" style="margin-right:2px;"value="'.$mechanic['m_id'].'"'.$activate.' class="btn '.$bgActivate.'">Activate account</button>
							</form>
							<form method="POST">
							<button type="submit" name ="disable_mechanic" style="margin-right:2px;"value="'.$mechanic['m_id'].'"'.$deactivate.' class="btn '.$bgDeactivate.'">De-activate</button>
							</form>
						</div>
					</td>
					</tr>';
				}			
		?>
		</tbody>
		</table>
		<?php 
		}else{
			echo'<div class="alert alert-primary" role="alert">
					<b>No mechanics Found</b>		
				</div>';
		}
		?>
		</div>
	</div>
</div>
<script>
					$( document ).ready(function() {

					   $('#dataTable').DataTable( {
					        dom: 'Bfrtip',
					        buttons: [
					            'csv', 'pdf', 'print'
					        ],
					    } );
					});
							
					</script>
</div>