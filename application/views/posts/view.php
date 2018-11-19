
<div class="post-body">
  <h3><?php echo $post['title']; ?></h3>
  <div class="row">
  	<div class="col-md-3">
  		<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" alt="" class="img-fluid">
  	</div>
  	<div class="col-md-9">
	  	<p class="dateAndCat"><small>Posted on <?php echo $post['created_at']; ?></p></small>
		    <p><?php echo word_limiter($post['body'], 60); ?></p>
        <?php if ($this->session->userdata('user_id') == $post['user_id']): ?>
          <a style="display: inline-block; float: left" href="edit/<?php echo $post['slug']; ?>" class='btn btn-warning pull-left'>Edit</a>
          <?php echo form_open('/posts/delete/'. $post['id']); ?>
           <input type="submit" value="delete" class='btn btn-danger ml-2' style="display: inline-block">
          </form>
        <?php endif ?>
  	</div>

  </div>
  <hr>
  <h3>Comments</h3>
  <hr>
      <?php if ($comments): ?>
          <?php foreach ($comments as $comment): ?>
            <h5><?php echo $comment['body']; ?></h5>
            <p >(by <strong><?php echo $comment['username']; ?></strong>)</p>
            <hr>
          <?php endforeach ?>
      <?php else: ?>  
          <p>No comments</p>
          <hr>
      <?php endif; ?>	
  
  <div class="row">
      
    <div class="col-md-9 mx-auto">
      
    <h3>Add a Comment</h3>
    <!-- To show the errors if needed -->
    <?php echo validation_errors(); ?>
    <?php echo form_open('comments/create/'.$post['id']); ?>
      <div class="form-group">
        <label for="Name">Name</label>
        <input type="text" name="name" class="form-control">
      </div>
      <div class="form-group">
        <label for="Name">Email</label>
        <input type="text" name="email" class="form-control">
      </div>
      <div class="form-group">
        <label for="Name">Body</label>
        <textarea name="body" class="form-control"></textarea>
      </div>
      <input type="hidden" name="slug" value="<?php echo $post['slug']; ?>">
      <button type="submit" class="btn btn-success">Post a Comment</button>
    </form>
    </div>
  </div>
  
</div>
	

