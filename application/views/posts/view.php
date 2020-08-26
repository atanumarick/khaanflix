<h4><?php echo $posts['title'];?></h4>
<div class="post-body">
	<?php echo $posts['body'];?>
</div>
<form method="post" action="<?php echo base_url();?>posts/delete/<?php echo $posts['id']?>">
	<input type="submit" name="delete" class="btn btn-warning" value="delete">
</form>

<a href="<?php echo base_url(); ?>posts/editform/<?php echo $posts['slug']?>" class="btn btn-success">Edit</a>

<div class="row">
	<?php if(isset($comments)) : ?>
	<?php foreach($comments as $comment) : ?>
		<div class="well">
			<h5><?php echo $comment->body; ?> [by <strong><?php echo $comment->name; ?></strong>]</h5>
		</div>
	<?php endforeach; ?>
<?php else : ?>
	<p>No Comments To Display</p>
<?php endif; ?>
</div>

<hr>
<div class="col-md-5">
	<h3>Add a comment</h3>
	<?php echo validation_errors();?>	
	<form action="<?php echo site_url();?>comment/create/<?php 
	echo $posts['id']; ?>" method="post">
		<div class="form-group">
			<label>Name</label>
			<input type="text" name="name" class="form-control">
		</div>
		<div class="form-group">
			<label>email</label>
			<input type="text" name="email" class="form-control">
		</div>
		<input type="hidden" name="slug" value="<?php echo $posts['slug']; ?>">
		<div class="form-group">
			<label>body</label>
			<textarea class="form-control" name="body"></textarea>
		</div>
		<div class="form-group">
			<input type="submit" name="submit" value="Add Comment" class="btn btn-success">
		</div>
	</form>
</div>
