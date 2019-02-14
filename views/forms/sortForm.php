<div class="container " style = "margin-top:15px;">
	<div class="row">
	
	<div class="card col-md-9">
	<h4 class="card-title mb-4 mt-1">Mechanics in your area</h4><hr>	
	<div class="justify-content-md-center">
	
	<div class="form-group row">
	<label class="col-sm-3 col-form-label">Sort mechanic by </label>
	<form action="" method="POST" > 
			
			<select class="form-control" name="location" id="location"  onchange="this.form.submit()">
			<option value="1" <?=$one_selected ?>>City</option>
			<option value="2" <?=$two_selected ?>>Province</option>
			<option value="3" <?=$three_selected ?>>Zip</option>
			</select>
	</form>		
	</div>
	
	<?php  if(!empty($mechanics)){ ?>
		
		<div class="table-responsive">
		<table class="table">
			<thead>
				<th>Mechanic</th>				
				<th>Address</th>
				<th>Phone</th>
				<th>Send a message</th>
			</thead>
			<tbody>
		<?php
				foreach($mechanics as $key =>$mechanic){
					echo '<tr><td>'.$mechanic['m_name'].'</td><td>'.$mechanic['street'].'</td><td>'.$mechanic['m_phone'].'</td>
							<td>
							<button class="btn btn-outline-success my-2 my-sm-0" name="request_help" type="submit" data-toggle="modal" data-target="#addTask'.$mechanic['m_id'].'" >Request Help</button>							
							</td></tr>';
				}
			
		?>
		</tbody>
		</table>
		</div>
		<?php 
		} else{
			echo'<div class="alert alert-primary" role="alert">
					<b>No Mechanics Found In This Location</b>		
				</div>';
		}
		?>
	</div>
	</div>
</div>
</div>

<!--Request Assistance -->
	<?php
	if(!empty($mechanics)){
	foreach($mechanics as $mechanic){
		
	?>
    <div class="modal fade" id="addTask<?= $mechanic['m_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <form action="" method="POST">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Request Assistance</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <?php
              require 'views/forms/requestForm.php';
              ?>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>
              <input type="submit" name="submit_request" value="Submit" class="btn btn-outline-success">

            </div>
          </form>
        </div>
      </div>
    </div>
	<?php
	}
	}
	?>