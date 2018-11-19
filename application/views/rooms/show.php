<div class="room">
	<h2 class="page-heading text-center custom-border-radius"><?= $title ?></h2>	
	<div class="content mt-4">
			<?php if ($is_slider): ?>
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<div class="owl-carousel-default owl-carousel">
						
					  <?php foreach ($images as $image): ?>
					  	<div>
						      <img src="<?php echo site_url();?>assets/images/posts/<?php echo $image['url']; ?>">
						 </div>
					  	<?php endforeach ?>
					</div>
				</div>

				<div class="col-lg-6 manual-background col-md-12 custom-background-color">
					<?php if (!empty($room->describtion)): ?>
							<h2 class="content-heading heading text-center dropdown-custom">
								Описание 
							<i class="fas fa-angle-down float-right mr-2"></i></h2>
						<div class="content-text" id="text">
							<?php echo $room->describtion; ?>
							<div class="btn-area pb-4">
								<a href="<?= base_url(); ?>contacts" class="btn-theme-custom float-right px-4 py-2">
									Забронировать
								</a>
							</div>
						</div>

					<?php endif ?>
						
					<?php if (!empty($room->free_content)): ?>
							<h2 class="content-heading heading text-center dropdown-custom-free_content">
								Бесплатные Услуги 
							<i class="fas fa-angle-down float-right mr-2"></i></h2>
						<div class="content-text" id="free_content"><?php echo $room->free_content; ?></div>
					<?php endif ?>

					<?php if (!empty($room->not_free_content)): ?>
							<h2 class="content-heading heading text-center dropdown-custom-not_free_content">
								Платные Услуги
							<i class="fas fa-angle-down float-right mr-2"></i></h2>
						<div class="content-text" id="not_free_content"><?php echo $room->not_free_content; ?></div>
					<?php endif ?>

					<?php if (!empty($room->price)): ?>
							<h2 class="content-heading heading text-center dropdown-custom-price">
								Цена
							<i class="fas fa-angle-down float-right mr-2"></i></h2>
						<div class="content-text" id="price">Цена за 1 ночь: <span><?php echo $room->price; ?></span> грн</div>
					<?php endif ?>

					<?php if (!empty($points)): ?>
						<h2 class="content-heading heading text-center dropdown-custom">
							
							 
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