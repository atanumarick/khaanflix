
<div class="row">
	
	<form method="post" action="<?php echo base_url();?>posts/update">
		<div class="form-group">
			<label>title</label>
			<input type="hidden" name="id" value="<?php echo $posts['id']; ?>">
			<input type="text" value="<?php echo $posts['title']; ?>" name="title" placeholder="title" class="form-control"> 
		</div>

		<div class="form-group">
			<label>Body</label>
			<textarea class="form-control" id="editor1" name="body" id="exampleFormControlTextarea1" rows="3"><?php 
			echo $posts['body']; ?></textarea>
		</div>

		<div class="form-group">
			<label>Select category</label>
			<select class="form-control" name="category_id">
				<?php foreach($categories as $cat){?>
					 <option value="<?php echo $cat->id; ?>"
					 <?php if($posts['category_id']==$cat->id){echo 'selected';}?>><?php echo $cat->name; ?></option>
				<?php }?>
				
			</select>
		</div>

		<div class="form-group">
			<input type="submit" name="submit" value="Update Post" class="btn btn-success">
		</div>
	</form>
</div>