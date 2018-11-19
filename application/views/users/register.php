
<?php echo validation_errors(); ?>

<?php echo form_open('users/register'); ?>
<div class="row">

	<div class="col-md-5 mx-auto">
		<h1 class="text-center"><?= $title ?></h1>
		<div class="form-group">
			<label for="Name">Name</label>
			<input type="text" name="name" class="form-control" placeholder="name">	
		</div>
		<div class="form-group">
			<label for="Name">Zipcode</label>
			<input type="text" name="zipcode" class="form-control" placeholder="zipcode">	
		</div>
		<div class="form-group">
			<label for="Name">Email</label>
			<input type="email" name="email" class="form-control" placeholder="email">	
		</div>
		<div class="form-group">
			<label for="Name">Username</label>
			<input type="text" name="username" class="form-control" placeholder="username">	
		</div>
		<div class="form-group">
			<label for="Name">Password</label>
			<input type="text" name="password" class="form-control" placeholder="password">	
		</div>
		<div class="form-group">
			<label for="Name">Confirm Password</label>
			<input type="text" name="password2" class="form-control" placeholder="confirm password">	
		</div>
		<button type="submit" class="btn btn-success">Sign Up</button>
	</div>
</div>
</form>