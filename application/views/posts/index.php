<h2><?php echo $title; ?></h2>
<?php if( $this->session->flashdata('data')){ ?>
	<div class="alert alert-warning" role="alert"><?php echo $this->session->flashdata('data');?></div>
<?php } ?>
<?php if( $this->session->flashdata('deltedata')){ ?>
	<div class="alert alert-warning" role="alert"><?php echo $this->session->flashdata('deltedata');?></div>
<?php } ?>
<?php if( $this->session->flashdata('updatedata')){ ?>
	<div class="alert alert-warning" role="alert"><?php echo $this->session->flashdata('updatedata');?></div>
<?php } ?>
<?php if($posts){?>
<?php foreach($posts as $post) {?>
<h3><?php echo $post['title']; ?></h3>
<small><?php echo $post['created_at']; ?> in <strong style="color: red;"><?php echo $post['name']; ?></strong></small>

<p><video width="450" height="450" controls="controls">
	<source src="<?php echo base_url("uploads/".$post['upload_moovie_image']);?>" type="video/mp4">
</video></p>

<p><?php echo word_limiter($post['body'],50); ?></p>
<a  href="<?php echo site_url('posts/'.$post['slug']);?>" class="btn btn-warning">Read more</a>

<?php } ?>
<?php } else{ ?>
<h3>oops!! Still any post assigned under this category <?php echo $title; ?>!!</h3>
<?php } ?>