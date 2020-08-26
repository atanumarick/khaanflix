<h3><?php echo $title; ?></h3>

	<ul class="list-group">
		

	<?php foreach($cat_details as $cat){?>
		<li class="list-group-item"><a href="<?php echo site_url();?>categories/posts/<?php echo $cat->id; ?>"><?php echo $cat->name;?></a></li>
	<?php } ?>

</ul>
