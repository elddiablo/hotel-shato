<div class="home">
	<div class="row">
		<div class="col-12" id="adv_section">
			<i class="fas fa-exclamation-triangle"></i><span>У нас открылась <a href="<?php echo base_url(); ?>steamroom">Баня!!!</a></span><i class="fas fa-exclamation-triangle"></i>
		</div>
		<div class="col-12 p-0">
			<div class="owl-carousel owl-carousel-home">
				<div class="carousel-home-item " id="home-item">
					<div style="background-image: url('<?= base_url(); ?>assets/images/posts/023.jpg');
					width: 100%;
					height: 100%;
					background-size: cover;
					-webkit-box-shadow: inset 0px 0px 294px 116px rgba(0,0,0,0.35);
					-moz-box-shadow: inset 0px 0px 294px 116px rgba(0,0,0,0.35);
					box-shadow: inset 0px 0px 294px 116px rgba(0,0,0,0.35);

  					background-position: center top;
					" class="d-flex justify-content-end align-items-end">
						<div class="bg-custom-light m-2 p-2 rounded" id="comment_box">
							<h3> <span style="text-decoration: underline;">Отель "Шато"</span></h3>
							<span class="comment"> - "Вежливый персонал."</span><br>
							<span class="comment"> - "Прекрасный отель с отличным видом"</span><br>
							<span class="comment hidden"> - "Лучший отдых с семьей"</span><br>
							<span class="comment hidden"> - "Чистые Номера"</span><br>
							<span class="comment hidden"> - "Огромный бассейн"</span><br>
							<span class="comment" style="position: absolute; bottom: 10px;right: 10px;"><a href="#" id="navigate_to_bottom" class="btn btn-warning">Ознакомиться</a></span>
							</p>

						</div>
					</div>
				</div>
				<div class="carousel-home-item">
					<iframe width="100%" height="100%" src="https://www.youtube.com/embed/N0igJLPkfXg" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
				</div>


			</div>
		</div>
	</div>
</div>

<div id="kitchen_menu">
	<div class="row mt-3 d-flex justify-content-center bg-custom-light" style="    background-color: rgba(251, 242, 226, 0.8);">

		<!-- <div class="col-md-4 col-sm-12 col-12 bg-custom-light-brown text-center menu-select" id="menu">
				<div class="shell">
					<p class='hover-effect'><a href="<?php echo base_url(); ?>menu"><i class="fas fa-utensils"></i> Меню</a></p>	
				</div>
              </div> -->
		<div class="col-md-4 col-sm-12 col-12 text-center d-flex align-items-center flex-column pt-5 pb-3">
			<img src="<?php echo base_url("assets/img/menu_png.png") ?>" alt="" style="height: 160px;">
			<p class="mt-3">Ознакомтесь с нашим меню и что у нас есть в наличии, тут должен быть текст и так далее....</p>
			<a href="<?php echo base_url(); ?>menu" class="btn-warning btn">Посмотреть меню</a>
		</div>
	</div>

</div>

<div id="menu">
	<div class="row mt-3">

		<div class="col-md-4 col-sm-6 col-6 bg-custom-light-brown text-center menu-select" id="kitchen">
			<div class="shell">
				<p class="hover-effect"><a href="<?php echo base_url(); ?>kitchen"><i class="fas fa-utensils"></i> Кухня</a></p>
			</div>

		</div>

		<div class="col-md-4 col-sm-6 col-6 bg-custom-light-brown text-center menu-select" id="rooms">
			<div class="shell">
				<p class='hover-effect'><a href="<?php echo base_url(); ?>rooms"><i class="fas fa-home"></i> Номера</a></p>
			</div>
		</div>
		<div class="col-md-4 col-sm-12 col-12 bg-custom-light-brown text-center menu-select" id="steamroom">
			<div class="shell">
				<p class='hover-effect'><a href="<?php echo base_url(); ?>steamroom"><i class="fas fa-bath"></i> Баня</a></p>
			</div>
		</div>
	</div>

	<div class="row pb-5" id="bottom">
		<div class="col-md-4 col-sm-6 col-6 bg-custom-light-brown text-center menu-select" id="territory">
			<div class="shell">
				<p class='hover-effect'><a href="<?php echo base_url(); ?>territory"><i class="fas fa-leaf"></i> Территория</a></p>
			</div>
		</div>
		<div class="col-md-4 col-sm-6 col-6 bg-custom-light-brown text-center menu-select" id="occasions">
			<div class="shell">
				<p class='hover-effect'><a href="<?php echo base_url(); ?>occasions"><i class="fas fa-users"></i> Мероприятия</a></p>
			</div>
		</div>
		<div class="col-md-4 col-sm-12 col-12 bg-custom-light-brown text-center menu-select" id="gallery">
			<div class="shell">
				<p class='hover-effect'><a href="<?php echo base_url(); ?>gallery"><i class="fas fa-images"></i> Галерея</a></p>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	document.getElementById("kitchen").onclick = function() {
		location.href = "kitchen";
	};
	document.getElementById("rooms").onclick = function() {
		location.href = "rooms";
	};
	document.getElementById("steamroom").onclick = function() {
		location.href = "steamroom";
	};
	document.getElementById("territory").onclick = function() {
		location.href = "territory";
	};
	document.getElementById("occasions").onclick = function() {
		location.href = "occasions";
	};
	document.getElementById("gallery").onclick = function() {
		location.href = "gallery";
	};
</script>

<!-- <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6 Menu"> 
                <p><a href="#">Кухня</a></p>
              </div>
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6 Menu"> 
                 <p><a href="#">Номера</a></p>
              </div>
              <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 Menu"> 
                 <p><a href="#">Особенности</a></p>
      	</div> -->

<!-- <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6 Menu"> 
	            <p><a href="#">Территория</a></p>
	          </div>
	          <div class="col-lg-4 col-sm-4 col-md-4 col-xs-6 Menu"> 
	            <p><a href="#">Мероприятия</a></p>
	          </div>
	          <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 Menu"> 
	            <p><a href="#">Галерея</a></p>
      </div> -->