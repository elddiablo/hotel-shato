<div class="container">

	<h1>Загрузить фото</h1>
	<?php echo $error;?>

	<?php echo form_open_multipart('upload/do_upload');?>

	<input type="file" name="userfile" size="20" class="form-control"/>
	<input type="hidden" name="table" value="<?php echo $table; ?>">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
	<br /><br />
	<input type="submit" value="upload" class="btn btn-success"/>

	</form>	

</div>

