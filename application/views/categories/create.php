<h2><?= $title; ?></h2>

<?php echo validation_errors(); ?>
<?php echo form_open_multipart('categories/create') ?>
	<div class="form-group">
		<label for="Name"><h3><strong>Name</strong></h3></label>
		<input type="text" id="name" class="form-control" name="name" placeholder="enter the name for the category">
		<button type="submit" class="btn btn-success mt-4">Submit</button>
	</div>
</form>