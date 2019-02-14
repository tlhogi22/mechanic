<div class="container col-md-9" style = "margin-top:15px;">
<div class="card row justify-content-md-center"  style = "padding:15px;">
	<h4 class="card-title mb-4 mt-1">User Request Logs</h4><hr>
	
	<div class="form-group row">
		<label class="col-sm-3 col-form-label">Select log Category</label>
		<form method = "POST">
		<select class="custom-select" name="status" onchange = "this.form.submit()";>
				<option value='0' >All</option>
			  <?php 
					
					foreach($statusObj as $obj){
						$selected = "";
						if($obj['status_id'] == $status){
							$selected="selected";
						}
						echo '<option value ="'.$obj['status_id'].'" '.$selected.' >'.$obj['status_name'].'</option>';
					}
			  ?>
		</select>
		</form>
	</div>
	<div class="card justify-content-md-center">	
		<div class="table-responsive" >
		<?php if(!empty($logs)){ ?>
		<table class="table" id="dataTable">
			<thead>
				<th>Request Description</th>
				<th>Request Date</th>
				<th>Status</th>
				<th>Mechanic Requested</th>
				<th>Date Attended</th>
			</thead>
			<tbody>
		<?php
			
				foreach($logs as $call){
					echo '<tr><td>'.$call['c_description'].'</td><td>'.$call['date_created'].'</td><td>'.$call['status_name'].'</td><td>'.$call['tech'].
						'</td><td>'.$call['date'].'</td></tr>';
				}
			
		?>
		</tbody>
		</table>
		<?php 
		}else{
			echo'<div class="alert alert-primary" role="alert">
					<b>No Request Records Found</b>		
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