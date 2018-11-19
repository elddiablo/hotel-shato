<div class="index">

	<h2 class="page-heading text-center custom-border-radius"><?= $title ?></h2>	
	<div class="content mt-4 pb-5">
			<?php if ($is_slider): ?>
			<div class="row">
				<div class="col-lg-6 manual-background col-md-12">

					<div class="owl-carousel owl-carousel-default">
					  <?php foreach ($images as $image): ?>
					  	<div>
						      <img src="<?php echo site_url();?>assets/images/posts/<?php echo $image['url']; ?>">
						 </div>
					  <?php endforeach ?>
					  

					</div>

				</div>

				<div class="col-lg-6 col-md-12 custom-background-color">
					<?php if (!empty($page->text)): ?>
							<h2 class="content-heading heading text-center dropdown-custom">
								Описание 
							<i class="fas fa-angle-down float-right mr-2"></i></h2>
						<div class="content-text" id="text"><?php echo $page->text; ?></div>
					<?php endif ?>

					<?php if (!empty($points)): ?>
						<h2 class="content-heading heading text-center dropdown-custom">
							<?php if ($title == "Мероприятия") {
								echo "Мероприятия";
							} else {
								echo "Оссобенности";
							}?>
							 
						<i class="fas fa-angle-down float-right mr-2 "></i></h2>

								
						
						<?php for($i = 0; $i < sizeof($points);$i++){ ?>
							<?php $res = ($i + 1) % 4; ?>
							<?php if ($i === 0) {
								  echo "<ul class='content-text ul-custom'>"; 
								}?> 

								  <li><i class="<?php echo $points[$i]['icon_class']; ?>"></i> <?php echo $points[$i]['point_content']; ?></li>

								  
									
							<?php if($res === 0 && $i !== 0){
								echo "</ul>";
								echo "<ul class='content-text ul-custom'>"; 
							} ?>



							<?php } ?>
							

								

							
						
					<?php endif ?>	
				</div>
			</div>
		<?php endif ?>
	</div>
</div>


					




