<html>
 <head>
 	<title><?php if (!empty($title)) echo $title;?>KhaanFlix</title>
 	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 </head>
 <body>

<nav class="navbar navbar-dark bg-dark">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="<?php echo base_url();?>">KhaanFlix</a>
	    </div>
	    <ul class="nav navbar-nav">
	      <li><a href="<?php echo base_url();?>">Home</a></li>
	      <li><a href="<?php echo base_url();?>about">About Us</a></li>
	      <li><a href="<?php echo base_url();?>posts">Moovies</a></li>	      
	      <li><a href="<?php echo base_url();?>categories">Category</a></li>	

	      <!-- <li><a href="#">Page 3</a></li> -->
	    </ul>
	    <ul class="nav navbar-nav navbar-right">
	    	
	    	<?php if(!$this->session->userdata('authenciated')){ ?>
	    	<li><a href="<?php echo base_url();?>users/register">Register</a></li>
	    	<li><a href="<?php echo base_url();?>users/login">Log In</a></li>

	    	<?php } else { ?>
	    		<li><a href="<?php echo base_url();?>users/logout">LOG OUT</a></li>
	    		<li><a href="<?php echo base_url();?>posts/create">Add moovie</a></li>
	    	<li><a href="<?php echo base_url();?>categories/create">Create Category</a></li>

	    	<?php } ?>
	    </ul>
	  </div>
</nav>
<div class="container">
	<?php if($this->session->flashdata('insertdata')) {?>
		<div class="alert alert-warning" role="alert"><?php echo $this->session->flashdata('insertdata'); ?></div>
<?php } ?>