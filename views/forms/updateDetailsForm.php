<div class="row justify-content-md-center" style="margin-top:15px;">
	<div class="card col-md-9">
		<div class = "container" >
		<form action="" method="POST" onsubmit = "return check();">   

			<h4 class="card-title mb-4 mt-1">Edit details</h4>
			<hr>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">First name</label>
					<input name="name" class="form-control col-sm-6" placeholder="First name" type="text" value="<?= $fname; ?>" title="Must not contain special characters" maxlength="39"  required>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Last Name</label>
					<input name="surname" class="form-control col-sm-6" placeholder="Last Name" type="text" value="<?= $lname; ?>" pattern="[A-Za-z -]+$" title="Must not contain numbers and special characters" maxlength="39"required>
				</div>		
				
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Email</label>
					<input name="email" class="form-control col-sm-6" placeholder="example@domain.com" type="email" value="<?= $email; ?>" maxlength="39"required>
				</div>		
				
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Phone Number</label>
					<input name="phone" class="form-control col-sm-6" placeholder="Phone Number" type="text" value="<?= $phone; ?>" pattern="[0-9]{10}" title="Must be 10 digits long" maxlength="10"required>
				</div>
				<div class="form-group row">
					<div class="col-md-2">
						<button type="submit" name="update_user" class="btn btn-primary btn-block"> Submit  </button>
						
					</div>
						<label id='message' class="col-sm-3 col-form-label">  </label>
					<?php
					if(!empty($run->msg) && isset($_POST['update_user'])){
					?>
						<div class="alert alert-<?= $alert; ?> col-md-5" role="alert">
							<b><center><?= $run->msg; ?></center></b>

						</div>
					<?php
					}
					?>
				</div>                                                          
		   
		 </form>
			</div>
		</div>
 </div> 
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaDbdoFbWqeunF2pfoSgJYHjxaw82-oyI&libraries=places&callback=initAutocomplete" async defer></script>