<?php echo form_open('users/login'); ?>
<?php if ($this->session->flashdata('login_failed')): ?> 
    <p class="alert alert-danger"><?php echo $this->session->flashdata('login_failed'); ?></p> 
  <?php endif ?>
<div class="row">
	<div class="col-md-4 mx-auto">
		<h1 class="text-center"><?php echo $title; ?></h1>
		<div class="form-group">
			<input type="text" class="form-control" name="username" placeholder="Username">
		</div>
		<div class="form-group">
			<input type="text" class="form-control" name="password" placeholder="Password">
		</div>
		<button class="btn btn-success btn-block">log in</button>
	</div>
</div>
<?php echo form_close(); ?>