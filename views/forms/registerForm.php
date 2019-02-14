<div class="row justify-content-md-center" style="margin-top:15px;">
	<div class="card col-md-9">
		<div class = "container" >
		
			<h4 class="card-title mb-4 mt-1">Register</h4>
			
			<div class="form-check form-check-inline"> 
			<label class="form-check-label" for="radRole"> Client</label>
				  <div class="input-group-text">
					<input class="form-check-input" onclick="showClient();" type="radio" name="radRole" id="radRole" value="1" checked>
				  </div>
			 
			</div>		
			
			<div class="form-check form-check-inline">
				 <label class="form-check-label" for="radRole1"> Mechanic</label>
				 <div class="input-group-text">
					<input class="form-check-input" onclick="showMechanic();" type="radio" name="radRole" id="radRole1" value="2">
				 </div>
			 
			</div>
		<!-- Client Registration-->	
		<div id ="client">
			<h4 class="card-title mb-4 mt-1">Personal Details</h4>
			<hr>
			<form action="" method="POST" onsubmit = "return check();"> 
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">First name</label>
					<input name="name" class="form-control col-sm-6" placeholder="First name" type="text" value="" pattern="[A-Za-z -]+$" title="Must not contain numbers and special characters" maxlength="39"  required>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Last Name</label>
					<input name="surname" class="form-control col-sm-6" placeholder="Last Name" type="text" value="" pattern="[A-Za-z -]+$" title="Must not contain numbers and special characters" maxlength="39"required>
				</div>		
				
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Email</label>
					<input name="email" class="form-control col-sm-6" placeholder="example@domain.com" type="email" maxlength="39"required>
				</div>		
				
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Phone Number</label>
					<input name="phone" class="form-control col-sm-6" placeholder="Phone Number" type="text" value="" pattern="[0-9]{10}" title="Must be 10 digits long" maxlength="10"required>
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label"> Password</label>
					<input type="password" name="password" id="password" class="form-control col-sm-6" placeholder="Password" required>
                </div>
				
                <div class="form-group row">
					<label class="col-sm-3 col-form-label"> Confirm Password</label>
					<input type="password" name="confirm-password" id="confirmPassword" class="form-control col-sm-6" placeholder="Confirm Password" required>
                </div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label"> Show Password</label>
					<div class="input-group-prepend">
						<div class="input-group-text">
						<input type="checkbox" onclick="myFunction()" aria-label="Checkbox for following text input">
					</div>
					</div>
				</div>

				<h4 class="card-title mb-4 mt-1">Next of Kin</h4>
				<hr>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Name</label>
					<input name="kin_name" class="form-control col-sm-6" placeholder="John Doe" type="text" value="" pattern="[A-Za-z -]+$" title="Must not contain numbers and special characters" maxlength="39"required>
				</div>		
				
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Email</label>
					<input name="Kin_email" class="form-control col-sm-6" placeholder="example@domain.com" type="email" maxlength="39"required>
				</div>		
				
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Phone Number</label>
					<input name="kin_phone" class="form-control col-sm-6" placeholder="Phone Number" type="text" value="" pattern="[0-9]{10}" title="Must be 10 digits long" maxlength="10"required>
				</div>				
				<div class="form-group row">
					<div class="col-md-2">
						<button type="submit" name="submit_call" class="btn btn-primary btn-block"> Submit  </button>
						
					</div>
						<label id='message' class="col-sm-3 col-form-label">  </label>
					<?php
					if(!empty($run->msg) && isset($_POST['submit_call'])){
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
			<!-- Mechanic Registration-->
			
			<div id="mechanic" style="display:none;">
			<form action="" method="POST" onsubmit = "return check();">   

			<h4 class="card-title mb-4 mt-1">Personal Details</h4>
			<hr>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">First name</label>
					<input name="m_name" class="form-control col-sm-6" placeholder="First name" type="text" title="Must not contain special characters" maxlength="39"  required>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Last Name</label>
					<input name="m_surname" class="form-control col-sm-6" placeholder="Last Name" type="text" pattern="[A-Za-z -]+$" title="Must not contain numbers and special characters" maxlength="39"required>
				</div>		
				
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Email</label>
					<input name="m_email" class="form-control col-sm-6" placeholder="example@domain.com" type="text" maxlength="39"required>
				</div>		
				
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Phone Number</label>
					<input name="m_phone" class="form-control col-sm-6" placeholder="Phone Number" type="text" pattern="[0-9]{10}" title="Must be 10 digits long" maxlength="10"required>
				</div>
				
								<div class="form-group row">
					<label class="col-sm-3 col-form-label"> Password</label>
					<input name="password_m" id="password_m" class="form-control col-sm-6" placeholder="Password" type="password" required>
                </div>
				
                <div class="form-group row">
					<label class="col-sm-3 col-form-label"> Confirm Password</label>
					<input name="confirm-password_m" id="confirmPassword_m" class="form-control col-sm-6" placeholder="Confirm Password" type="password" required>
                </div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label"> Show Password</label>
					<div class="input-group-prepend">
						<div class="input-group-text">
						<input type="checkbox" onclick="myFunction()" aria-label="Checkbox for following text input">
					</div>
					</div>
				</div>
				
				<h4 class="card-title mb-4 mt-1">Address Details</h4>
				<hr>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Location </label>
					<input name="search" class="form-control col-sm-6" id="search" onFocus="geolocate()" placeholder="Search Mechanic location" type="text">
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Street Address</label>
					<input name="street" id="street" class="form-control col-sm-6" placeholder="street name" type="text" title="Must not contain special characters" maxlength="39"  required>
				</div>

				<div class="form-group row">
					<label class="col-sm-3 col-form-label">City</label>
					<input name="city" id="city" class="form-control col-sm-6" placeholder="City" type="text" pattern="[A-Za-z -]+$" title="Must not contain numbers and special characters" maxlength="39"required>
				</div>		
				
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Province</label>
					<input name="province" id="province" class="form-control col-sm-6" placeholder="Province" type="text"  pattern="[A-Za-z -]+$" title="Must not contain numbers and special characters" maxlength="39"required>
				</div>		
				
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Zip code</label>
					<input name="zip" id="zip" class="form-control col-sm-6" placeholder="Zip" type="text" pattern="[0-9]{4}" title="Must only contain numbers" maxlength="39"required>
				</div>
				<div class="form-group row">
					<div class="col-md-2">
						<button type="submit" name="add_tech" class="btn btn-primary btn-block"> Submit  </button>
						
					</div>
						<label id='message' class="col-sm-3 col-form-label">  </label>
					<?php
					if(!empty($run->msg) && isset($_POST['add_tech'])){
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
 </div>
 </body>
<script type="text/javascript">
    function check() {
        var password = document.getElementById("password").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
        var msg = document.getElementById('message');
		
		if (password != confirmPassword){ 
			msg.style.color = 'red';
			msg.innerHTML = 'Passwords do not match.';
            return false;
        }else{
        return true;
    }
	}
</script>
<script>
function myFunction() {
    var x = document.getElementById("password");
    var xm = document.getElementById("password_m");
	
    if (x.type === "password") {
        x.type = "text";
        xm.type = "text";
    } else {
        x.type = "password";
        xm.type = "password";
    }
    var x1 = document.getElementById("confirmPassword");
    var xm1 = document.getElementById("confirmPassword_m");
	
    if (x1.type === "password"||xm1.type === "password") {
        x1.type = "text";
		xm1.type = "text";
    } else {
        x1.type = "password";
        xm1.type = "password";
    }
    
}
</script>
<script>
function showClient(){
  document.getElementById('client').style.display ='block';
  document.getElementById('mechanic').style.display ='none';
}
function showMechanic(){
  document.getElementById('mechanic').style.display = 'block';
  document.getElementById('client').style.display = 'none';
}
</script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaDbdoFbWqeunF2pfoSgJYHjxaw82-oyI&libraries=places&callback=initAutocomplete" async defer></script>