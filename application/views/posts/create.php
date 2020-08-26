<div class="row">
	<?php echo validation_errors();?>
	
	<form method="post" action="<?php echo base_url();?>posts/create" 
		enctype="multipart/form-data" >
		<div class="form-group">
			<label> Moovie Title</label>
			<input type="text" name="title" placeholder="title" class="form-control"> 
		</div>

		<div class="form-group">
			<label>moovie details</label>
			<textarea class="form-control" id="editor1" name="body" id="exampleFormControlTextarea1" rows="3"></textarea>
		</div>

		<div class="form-group">
			<label>Select category</label>
			<select class="form-control" name="category_id">
				<?php foreach($categories as $cat){?>
					 <option value="<?php echo $cat->id; ?>"><?php echo $cat->name; ?></option>
				<?php }?>
				
			</select>
		</div>

		<div class="form-group">
			<label>upload moovie</label>
			<input type="file" name="userfile" size="20">
		</div>

		<div class="form-group">
			<input type="submit" name="submit" value="Create Post" class="btn btn-success">
		</div>
	</form>
</div>