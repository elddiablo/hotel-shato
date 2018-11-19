
<div class="post-body">

	<div class="card mb-3">
	  <div class="card-header"><h2><?php echo $title; ?></h2></div>
	  <div class="card-body">
	
		<?php echo validation_errors(); ?>

	  	<?php echo form_open_multipart('posts/create'); ?>
		  <fieldset>

		  	<div class="form-group">
		      <label for="post_title">Post title:</label>
		      <input name="title" class="form-control" id="post_title" aria-describedby="emailHelp" placeholder="Enter title" type="text">
		      <small id="emailHelp" class="form-text text-muted">Make up a name for your post</small>
		    </div>

		  	<div class="form-group">
		      <label for="post_body">Post body:</label>
		      <textarea class="form-control" aria-describedby="emailHelp" id="editor1" name="body"></textarea>
		      <small id="emailHelp" class="form-text text-muted">Just type in some text and enjoy.</small>
		    </div>
		    <div class="form-group">
		    	<label for="select">Category</label>
		    	<select name="category_id" id="">
		    		<option value="unselected">Select the category</option>
		    		<?php foreach ($categories as $category): ?>
		    			<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
		    		<?php endforeach ?>

		    	</select>
		    </div>

		    <div class="form-group">
		    	<label for="image">Upload Image</label>
		    	<input type="file" name="userfile" size="20">
		    </div>
		    
		    <button type="submit" class="btn btn-success">Create</button>
		  </fieldset>
	  </div>
	  
	</div>
</div>