<h2><?= $title; ?></h2>

<ul class="list-group">
	<?php foreach ($categories as $category): ?>

		<li class="list-group-item"><a href="<?php echo site_url(); ?>categories/posts/<?php echo $category['id']; ?>"><?php echo $category['name']; ?></a>
			<?php if ($this->session->userdata('user_id') == $category['user_id']): ?>
					<form action="categories/delete/<?php echo $category['id']; ?>" style="display: inline">
						<input type="submit" value="delete" class="btn-danger btn btn-sm float-right">
					</form>
			<?php endif ?>
		
		</li>
	<?php endforeach ?>
</ul>