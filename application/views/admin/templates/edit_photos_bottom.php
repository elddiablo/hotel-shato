<?php function showEditPhotosBottom($type, $images, $page = null, $room = null){ ?>

<h3><label for="">Фото</label></h3>
	<div class="row pb-3">
		<?php  

		// echo "Before Sorting:". "<br>";
		// print_r($images);
		// echo "After <br>";
		function sortByTheOrder($image1,$image2)
			{
			    if ($image1['image_position'] == $image2['image_position']) return 0;
			    return ($image1['image_position'] > $image2['image_position']) ? 1 : -1;
			}
		usort($images,'sortByTheOrder');
		// print_r($images);

		?>
		<?php foreach ($images as $image): ?>
			<div class="col-md-3 mb-3">
				<div class="card">
				  <img class="card-img-top" src="<?php echo site_url();?>assets/images/posts/<?php echo $image['url']; ?>" alt="Card image cap">
				  <div class="card-body">
				  	<div class="row">
				  		<div class="col-6">
				  			<?php if ($type == "page") { ?>
				  				<a href="<?php echo base_url(); ?>pages/delete_image/<?php echo $image['id']; ?>" class="btn btn-danger">Delete</a>
				  			<?php  } else { ?>
				  			 <a href="<?php echo base_url(); ?>rooms/delete_image/<?php echo $image['id']; ?>" class="btn btn-danger">Delete</a>
				  			<?php } ?>
				  		</div>
				  		<div class="col-6">
				  			<form action="<?= base_url(); ?>pages/edit_image_order" method="POST">
				  				<div class="order_button_div">
				  					<input type="number" class="form-control order_button float-right" id="order_number" name="order" value="<?= $image['image_position']; ?>" style="width: 3em;">
				  				<?php if ($type=="page") { ?>
				  					
				  					<input type="hidden" name="page_name" value="<?php echo $page->name; ?>">

				  				<?php } else { ?>
	
									<input type="hidden" name="room_type" value="<?php echo $room->type; ?>">
				  				
				  				<?php } ?>

				  					<input type="hidden" name="image_id" value="<?php echo $image['id']; ?>">
				  				</div>
				  			</form>
				  			
				  		</div>
				  	</div>
				  </div>
				</div>
			</div>
		<?php endforeach ?>
		<div class="col-md-3">
			<div class="card" id="add_card">
				 <img class="card-img-top" src="<?php echo site_url();?>assets/images/posts/noimage.jpg" alt="Card image cap">
				  <div class="card-body">

				  	<?php if ($type == "page"){ ?>
				  		<a href="<?php echo base_url(); ?>upload/index/pages/<?php echo $page->id; ?>" class="btn btn-success"><i class="fa fa-plus"></i> Добавить Фото</i></a>
				  	<?php } else { ?>

				    	<a href="<?php echo base_url(); ?>upload/index/rooms/<?php echo $room->id; ?>" class="btn btn-success"><i class="fa fa-plus"></i> Добавить Фото</i></a>

				    <?php } ?>
				  </div>
			</div>
		</div>
		<!-- <pre>
			<?php print_r($images); ?>
		</pre> -->
		
	</div>


<?php } ?>

