<div class="row">
	<?php echo validation_errors();?>	
	<div class="col-md-6">
		<form method="post" action="<?php echo base_url();?>categories/create">

		<div class="form-group">
			<label>Category</label>
			<input type="text" name="name" placeholder="Category" class="form-control"> 
		</div>	

		<div class="form-group">
			<input type="submit" name="submit" value="Create" class="btn btn-success">
		</div>
		
	</form>
	</div>
</div>