<div class="row justify-content-md-center" style="margin-top:15px;">
<div class="card col-md-9">
		<div class = "container" >
		<form action="" method="POST" >   

			<h4 class="card-title mb-4 mt-1">Search a mechanic by location</h4>
			<hr>
			  
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Enter current location </label>
					<input name="search" class="form-control col-sm-6" id="search" onFocus="geolocate()" placeholder="Search Mechanic location" type="text">
				</div>
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Street address</label>
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
				<br>				
				<div class="form-group row">
					<div class="col-md-2">
						<button type="submit" name="submit_call" class="btn btn-primary btn-block"> Submit  </button>
					</div>

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
	</div>
 </div>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDaDbdoFbWqeunF2pfoSgJYHjxaw82-oyI&libraries=places&callback=initAutocomplete" async defer></script>