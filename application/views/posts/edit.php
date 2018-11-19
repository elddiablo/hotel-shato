
<div class="post-body">

	<div class="card mb-3">
	  <div class="card-header"><h2><?php echo $title; ?></h2></div>
	  <div class="card-body">
	
		<?php echo validation_errors(); ?>

	  	<?php echo form_open('posts/update'); ?>
		  <fieldset>
			<input type="hidden" name="id" value="<?php echo $post->id; ?>">
		  	<div class="form-group">
		      <label for="post_title">Post title:</label>
		      <input name="title" class="form-control" id="post_title" aria-describedby="emailHelp" placeholder="Enter title" type="text" value="<?php echo $post->title; ?>">
		      <small id="emailHelp" class="form-text text-muted">Fix yout post title</small>
		    </div>

		  	<div class="form-group">
		      <label for="post_body">Post body:</label>
		      <textarea class="form-control" id="editor1" aria-describedby="emailHelp" name="body"><?php echo $post->body; ?></textarea>
		      <small id="emailHelp" class="form-text text-muted">Change your post Body</small>
		    </div>

		    <div class="form-group">
		    	<label for="select">Category</label>
		    	<select name="category_id" id="">
		    		<?php foreach ($categories as $category): ?>
		    			<option value="<?php echo $category['id']; ?>"><?php echo $category['name']; ?></option>
		    		<?php endforeach ?>

		    	</select>
		    </div>
		    
		    <button type="submit" class="btn btn-success">Update A Post</button>
		  </fieldset>
	  </div>
	  
	</div>
</div>