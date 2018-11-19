<h2><?=$title?></h2>
<?php foreach ($posts as $post) { ?>

		<div class="post-body">
		  <h3><?php echo $post['title']; ?></h3>
		  <div class="row">
		  	<div class="col-md-3">
		  		<img src="<?php echo site_url(); ?>assets/images/posts/<?php echo $post['post_image']; ?>" alt="" class="img-fluid">
		  	</div>
		  	<div class="col-md-9">
		  	<p class="dateAndCat"><small>Posted on <?php echo $post['created_at']; ?> in </small><strong><?php echo $post['name']; ?></strong></p>
			    <p class="card-text"><?php echo word_limiter($post['body'], 60); ?></p>
			    <p><a type="button" class="btn btn-secondary mt-4" href="<?php echo site_url('posts/'. $post['slug']); ?>">Read more</a></p>
			  
		  	</div>
		  </div>	
		</div>

	  
	
<?php  } ?>
<div class="pagination-links text-center">
	<?php echo $this->pagination->create_links(); ?>
</div>
