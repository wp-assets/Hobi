(function ($) {
	//Slider Active
	    // animateOut: 'slideOutDown',
	    // animateIn: 'slideInDown',
	    // smartSpeed:450,
	$('.slider-active').owlCarousel({
        items:1,
        loop: true,
        autoplay: false,
        dots: false,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
	    responsive:{
	        0:{
	            items:1,
	            nav:true
	        },
	        600:{
	            items:1,
	            nav:true
	        },
	        1000:{
	            items:1,
	            nav:true,
	            loop:true
	        }
	    }
	})

	//Team Active
	$('.owl-team').owlCarousel({
	    items: 1,
	    margin:15,
	    animateOut: 'slideOutDown',
	    animateIn: 'flipInY',
        loop: true,
        nav: true,
        dots: false,
        autoplay: true,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
	    responsive:{
	        0:{
	            items:1,
	            nav:true
	        },
	        600:{
	            items:3,
	            nav:true
	        },
	        1000:{
	            items:4,
	            nav:true,
	            loop:true
	        }
	    }
	})

	// Testimonial Active
	$('#testimonial-active').owlCarousel({
	    items: 1,
	    margin:15,
        loop: true,
        nav: true,
        autoplay: false,
        navText: ['<i class="fa fa-angle-left"></i>','<i class="fa fa-angle-right"></i>'],
	    responsive:{
	        0:{
	            items:1,
	            nav:true
	        },
	        600:{
	            items:2,
	            nav:true
	        },
	        1000:{
	            items:3,
	            nav:true,
	        }
	    }
	})

	// meanmenu
	$('.main-menu').meanmenu({
		meanMenuContainer: '.header-area',
		meanScreenWidth: "992"
	});





	// One Page Nav
	var top_offset = $('.header-area').height() - 10;
	$('.main-menu nav ul').onePageNav({
		currentClass: 'active',
		scrollOffset: top_offset,
	});


	$(window).on('scroll', function () {
		var scroll = $(window).scrollTop();
		if (scroll < 145) {
			$(".header-area").removeClass("sticky");
		} else {
			$(".header-area").addClass("sticky");
		}
	});

	// Data Background
	$("[data-background]").each(function(){
		$(this).css("background-image", "url(" + $(this).attr("data-background") + ")")
	})

	// Smooth Scroll
	$(function() {
		$('a[href*=\\#]:not([href=\\#])').on('click', function() {
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.substr(1) +']');
			if (target.length) {
				$('html,body').animate({
				  scrollTop: (target.offset().top - 0)
				}, 1000);
				return false;
			}
		});
	});

	/* magnificPopup img view */
	$('.popup-image').magnificPopup({
		type: 'image',
		gallery: {
		  enabled: true
		}
	});

	/* magnificPopup video view */
	$('.popup-video').magnificPopup({
		type: 'iframe'
	});
	// Skill Bar
	jQuery('.skillbar').skillBars({
	  // options here
	});


	// Masonry
	$('.grid').imagesLoaded( function() {
		var $grid = $('.portfolio-active').isotope({
			itemSelector: '.grid-item',
			percentPosition: true,
			masonry: {
			columnWidth: 1,
			gutter: 0
			}
		})

	// filter items on button click
	$('.portfolio-menu').on( 'click', 'button', function() {
	  var filterValue = $(this).attr('data-filter');
	  $grid.isotope({ filter: filterValue });
	});
		
	});
//for menu active class
$('.portfolio-menu button').on('click', function(event) {
	$(this).siblings('.active').removeClass('active');
	$(this).addClass('active');
	event.preventDefault();
});

// scrollToTop
$.scrollUp({
	scrollName: 'scrollUp', // Element ID
	topDistance: '300', // Distance from top before showing element (px)
	topSpeed: 300, // Speed back to top (ms)
	animation: 'fade', // Fade, slide, none
	animationInSpeed: 200, // Animation in speed (ms)
	animationOutSpeed: 200, // Animation out speed (ms)
	scrollText: '<i class="fa fa-angle-up"></i>', // Text for element
	activeOverlay: false, // Set CSS color to display scrollUp active point, e.g '#00FFFF'
});

// WOW active
new WOW().init();


// Counter Up
$('.counter').counterUp({
    delay: 10,
    time: 1000
});



})(jQuery);