<div class="container col-md-9" style = "margin-top:15px;">
<div class="card row justify-content-md-center"  style = "padding:15px;">
	<h4 class="card-title mb-4 mt-1">Manage Users</h4><hr>
	
	<div class="card justify-content-md-center">	
		<div class="table-responsive" >
		<?php if(!empty($users)){ ?>
		<table class="table" id="dataTable">
			<thead>
				<th>Name</th>
				<th>Surname</th>
				<th>Email</th>
				<th>Phne</th>
				<th>Deactivate</th>
			</thead>
			<tbody>
		<?php			
				foreach($users as $user){

					$active = "";
					$bgActive = "btn-primary";
					
						if($user['status'] == 0){
							$active = "disabled";
							$bgActive = "btn-secondary";
						}
								
					echo '<tr>
					<td>'.$user['u_name'].'</td>
					<td>'.$user['u_surname'].'</td>
					<td>'.$user['u_email'].'</td>
					<td>'.$user['u_phone'].'</td>
					<td>
						<div class="row">
							<form method="POST">
							<button type="submit" name ="active_user" style="margin-right:2px;"value="'.$user['user_id'].'"'.$active.' class="btn '.$bgActive.'">De-activate</button>
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
					<b>No Users Found</b>		
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