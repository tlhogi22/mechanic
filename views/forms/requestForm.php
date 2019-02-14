<div class="row justify-content-md-center" style="margin-top:15px;">
	<div class="col-md-9">
		<div class = "container" >
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">First name</label>
					<input name="name" value="<?=$name ?>" class="form-control col-sm-6" placeholder="First name" type="text"  title="Must not contain special characters" maxlength="39"  required>
				</div>		
				
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Email</label>
					<input name="email" value="<?=$email ?>" class="form-control col-sm-6" placeholder="example@domain.com" type="email"  maxlength="39"required>
				</div>		
				
				<div class="form-group row">
					<label class="col-sm-3 col-form-label">Phone Number</label>
					<input name="phone" value="<?=$phone ?>" class="form-control col-sm-6" placeholder="Phone Number" type="text"  pattern="[0-9]{10}" title="Must be 10 digits long" maxlength="10"required>
				</div>
				
                <div class="form-group row">
					<label class="col-sm-3 col-form-label">Description</label>
					<textarea name="description"  id="description"  class="form-control col-sm-6" placeholder="Describe the task" required></textarea>
				<input name="mech_id" value="<?= $mechanic['m_id']; ?>" type="text" hidden />
				</div> 
		</div> 
	</div> 
</div> 
				