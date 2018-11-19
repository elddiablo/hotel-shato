$(document).ready(function(){



	function dropdown_custom(){
				// $("#text").hide();
				$(" .content h2 i:first").removeClass('fa-angle-down');
				$(" .content h2 i:first").addClass('fa-angle-up');

				$("#free_content").hide();
				$("#not_free_content").hide();
				$("#price").hide();

				$(".ul-custom").hide();

				$('.dropdown-custom:first').click(function() {

				  if ( $(" #text").is( ":hidden" ) ) {

				    $(" #text").slideDown( "slow" );
				    $(" .content h2 i:first").removeClass('fa-angle-down');
				    $(" .content h2 i:first").addClass('fa-angle-up');

				  } else {

				    $(" #text").slideUp();
				    $(" .content h2 i:first").removeClass('fa-angle-up');
				    $(" .content h2 i:first").addClass('fa-angle-down');
				  }

				});
				$(' .dropdown-custom:last').click(function() {

				  if ( $(" .ul-custom").is( ":hidden" ) ) {

				    $(" .ul-custom").slideDown( "slow" );
				    $(" .content h2 i:last").removeClass('fa-angle-down');
				    $(" .content h2 i:last").addClass('fa-angle-up');

				  } else {

				    $(" .ul-custom").slideUp();
				    $(" .content h2 i:last").removeClass('fa-angle-up');
				    $(" .content h2 i:last").addClass('fa-angle-down');
				  }

				});

				$('.dropdown-custom-free_content').click(function() {

				  if ( $(" #free_content").is( ":hidden" ) ) {

				    $(" #free_content").slideDown( "slow" );
				    $(" .content h2.dropdown-custom-free_content i").removeClass('fa-angle-down');
				    $(" .content h2.dropdown-custom-free_content i").addClass('fa-angle-up');

				  } else {

				    $(" #free_content").slideUp();
				    $(" .content h2.dropdown-custom-free_content i").removeClass('fa-angle-up');
				    $(" .content h2.dropdown-custom-free_content i").addClass('fa-angle-down');
				  }

				});

				$('.dropdown-custom-not_free_content').click(function() {

				  if ( $(" #not_free_content").is( ":hidden" ) ) {

				    $(" #not_free_content").slideDown( "slow" );
				    $(" .content h2.dropdown-custom-not_free_content i").removeClass('fa-angle-down');
				    $(" .content h2.dropdown-custom-not_free_content i").addClass('fa-angle-up');

				  } else {

				    $(" #not_free_content").slideUp();
				    $(" .content h2.dropdown-custom-not_free_content i").removeClass('fa-angle-up');
				    $(" .content h2.dropdown-custom-not_free_content i").addClass('fa-angle-down');
				  }

				});

				$('.dropdown-custom-price').click(function() {

				  if ( $(" #price").is( ":hidden" ) ) {

				    $(" #price").slideDown( "slow" );
				    $(" .content h2.dropdown-custom-price i").removeClass('fa-angle-down');
				    $(" .content h2.dropdown-custom-price i").addClass('fa-angle-up');

				  } else {

				    $(" #price").slideUp();
				    $(" .content h2.dropdown-custom-price i").removeClass('fa-angle-up');
				    $(" .content h2.dropdown-custom-price i").addClass('fa-angle-down');
				  }

				});

			}
	dropdown_custom();





	const responsive_btn_navigate_to_bottom = `<button class="btn btn-block btn-warning my-3 p-4 custom_btn_style" id="responsive_btn_navigate_to_bottom">В МЕНЮ</button>`;
	const responsive_btn_to_gallery = `<a href="gallery" class="btn btn-block btn-warning my-3 p-4 custom_btn_style" id="responsive_btn_to_gallery">ГАЛЛЕРЕЯ</a>`;

	

	if(document.getElementById('navigate_to_bottom')){
		if(window.innderWidth > 980) {
			// $('#responsive_btn_navigate_to_bottom').hide();
		}

		if (window.innerWidth <= 980) {
			$('.hidden').remove();
			$('#navigate_to_bottom').hide();
			$(".home").prepend(responsive_btn_navigate_to_bottom);
			$(".home").append(responsive_btn_to_gallery);
			$('#menu').hide();
		}

		const comment_box = $("#comment_box");
		$('.comment').hide();
		$(comment_box).hide();
		setTimeout(function(){
			$(comment_box).fadeIn(1000);
		}, 500);

		comment_animation();



		function comment_animation(){
			$('.comment').each(function(index, el) {
				console.log(index);
				setTimeout(function(){
					$(el).fadeIn(1000);
				}, (index * 1000));
				
			});	
		}

		if(document.getElementById('responsive_btn_navigate_to_bottom')){
			document.getElementById('responsive_btn_navigate_to_bottom').addEventListener('click', function(e) {
				$(".home").fadeOut(600, function() {
					$(this).remove();
					$('#menu').fadeIn(600);
				});
				e.preventDefault();
			});
		}

		document.getElementById('navigate_to_bottom').addEventListener('click', (e) => {
			document.getElementById('bottom').scrollIntoView({ block: 'end',  behavior: 'smooth' });

			e.preventDefault();
		});
	}



  $('.owl-carousel.owl-carousel-default').owlCarousel({
	    items:1,
	    margin:10,
	    autoHeight:true,
	    dots: true,
	    loop: true
	});
  
  $('.owl-carousel.owl-carousel-home').owlCarousel({
		items : 1,
		loop  : true,
		autoHeight:true,
		margin: 10,
		dots: false,
		nav    : true,
		smartSpeed :900,
		autoplay: true,
		autoplayHoverPause: true,
		navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"]
	});


});
