<div class="row">

	<h3>LOG IN PANEL</h3>

	<?php if($this->session->flashdata('loginfail')) {?>
		<div class="alert alert-warning" role="alert"><?php echo $this->session->flashdata('loginfail'); ?></div>
<?php } ?>

<?php if($this->session->flashdata('sessioncheck')) {?>
		<div class="alert alert-warning" role="alert"><?php echo $this->session->flashdata('sessioncheck'); ?></div>
<?php } ?>
	<?php echo validation_errors();?>	
	<div class="col-md-6">
		<form method="post" action="<?php echo base_url();?>users/login">		


		<div class="form-group">
			<label>email</label>
			<input type="text" name="email" placeholder="email" class="form-control"> 
		</div>

		<div class="form-group">
			<label>password</label>
			<input type="password" name="password" placeholder="password" class="form-control"> 
		</div>

		

		<div class="form-group">
			<input type="submit" name="submit" value="log In" class="btn btn-success">
		</div>
		
	</form>
	</div>
</div>