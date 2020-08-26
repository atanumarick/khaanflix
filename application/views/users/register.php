<div class="row">
	<?php echo validation_errors();?>	
	<div class="col-md-6">
		<form method="post" action="<?php echo base_url();?>users/register">

		<div class="form-group">
			<label>name</label>
			<input type="text" name="name" placeholder="Name" class="form-control"> 
		</div>	

		<div class="form-group">
			<label>zipcode</label>
			<input type="text" name="zipcode" placeholder="zip code" class="form-control"> 
		</div>

		<div class="form-group">
			<label>user name</label>
			<input type="text" name="username" placeholder="username" class="form-control"> 
		</div>	


		<div class="form-group">
			<label>email</label>
			<input type="text" name="email" placeholder="email" class="form-control"> 
		</div>

		<div class="form-group">
			<label>password</label>
			<input type="password" name="password" placeholder="password" class="form-control"> 
		</div>

		<div class="form-group">
			<label>Confirm Password</label>
			<input type="password" name="passconf" placeholder="confirm password" class="form-control"> 
		</div>

		<div class="form-group">
			<input type="submit" name="submit" value="Sign Up" class="btn btn-success">
		</div>
		
	</form>
	</div>
</div>