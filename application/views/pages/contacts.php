
<h1 class="text-center page-heading custom-border-radius"><i class="far fa-address-book"></i> <?= $title ?></h1>  
	<div class="row pad-0">
		<div class="col-md-7">
			<!-- <div id="map"></div> -->
			<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1096.4935550884907!2d30.80723745554632!3d46.56523199848771!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x770096b8f673b701!2zItCo0LDRgtC-IiDQs9C-0YHRgtC40L3Ri9C5INC00LLQvtGA!5e0!3m2!1sru!2sus!4v1529089091596"  frameborder="0" 
			style="border:0; width: 100%; height: 100%;" 
			allowfullscreen></iframe>
		</div>
		<div class="col-md-5 contacts custom-background-color">
			<ul class="contacts_info">
				<li ><i class="fas fa-lg fa-at"></i> <strong>Почта</strong>: <span class="i">room@hotel-shato.od.ua</span></li>
				<li><i class="fas fa-lg fa-map-marker-alt"></i> <strong>Адрес</strong>: <span class="i">Одесская обл. <br> Лиманский район с. Лески,  ул. придорожная 7</span>
				</li>
				<li><i class="fas fa-lg fa-phone"></i> <strong>Телефон</strong>: <span class="i">+38(067) 485-43-33</span></li>
				<li class="leave-phone"><h4 class=""><i class="fas fa-mobile"></i> Оставьте номер!</h4> И мы вам обязательно перезвоним.</li>
				<li>
					<?php echo validation_errors(); ?>
					<form action="<?= base_url(); ?>phone/leavePhone" method="post">
						<input type="text" name="name" placeholder = "Имя" class="form-control" style="width:80%;">
					<input type="text" name="phone" placeholder = "+38 (098) ..." class="form-control" style="width:80%;margin-top: 10px;">
					<button type="submit" class="btn btn-success mt-2" style="width:50%;">Отправить</button>
					</form>
				</li>
			</ul>
		</div>
	</div>
	
	</div>