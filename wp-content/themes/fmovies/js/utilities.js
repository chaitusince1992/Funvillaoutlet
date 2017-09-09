jQuery( document ).ready(function() {

	jQuery(window).scroll(function () {

		if (jQuery(this).scrollTop() > 100) {

			jQuery('.scrollup').fadeIn();

		} else {

			jQuery('.scrollup').fadeOut();

		}
	});

	jQuery('.scrollup').click(function () {
		
		jQuery("html, body").animate({
			  scrollTop: 0
		  }, 600);

		return false;
	});

	jQuery('#header-spacer').height( jQuery('#header-main-fixed').height() );

	fmovies_init_loading_effects();

	// add submenu icons class in main menu (only for large resolution)
	if ( jQuery(window).width() >= 800 ) {
	
		jQuery('#navmain > div > ul > li:has("ul")').addClass('level-one-sub-menu');
		jQuery('#navmain > div > ul li ul li:has("ul")').addClass('level-two-sub-menu');										
	}

	jQuery('#navmain > div').on('click', function(e) {

		e.stopPropagation();

		// toggle main menu
		if ( jQuery(window).width() < 800 ) {

			var parentOffset = jQuery(this).parent().offset(); 
			
			var relY = e.pageY - parentOffset.top;
		
			if (relY < 36) {
			
				jQuery('ul:first-child', this).toggle(400);
			}
		}
	});

	if (typeof jQuery('.flexslider').flexslider == 'function') {

		jQuery('.flexslider').flexslider({
			animation: "slide",
			slideshowSpeed : 4500,
			animationSpeed : 600
		});
	}
});

function fmovies_init_loading_effects() {

    jQuery('#header-logo').addClass("hidden").viewportChecker({
            classToAdd: 'animated fadeInLeft',
            offset: 1
          });

    jQuery('#navmain').addClass("hidden").viewportChecker({
            classToAdd: 'animated bounceInRight',
            offset: 1
          });

    jQuery('#page-header, article h1').addClass("hidden").viewportChecker({
            classToAdd: 'animated bounceInUp',
            offset: 1
          });

    jQuery('#main-content-wrapper h2, #main-content-wrapper h3')
            .addClass("hidden").viewportChecker({
            classToAdd: 'animated bounceInUp',
            offset: 1
          });

    jQuery('img').addClass("hidden").viewportChecker({
            classToAdd: 'animated zoomIn',
            offset: 1
          });

    jQuery('#sidebar').addClass("hidden").viewportChecker({
            classToAdd: 'animated bounceInRight',
            offset: 1
          });

    jQuery('.before-content, .after-content').addClass("hidden").viewportChecker({
            classToAdd: 'animated bounce',
            offset: 1
          });

    jQuery('article p, article li')
        .addClass("hidden").viewportChecker({
            classToAdd: 'animated fadeInLeft',
            offset: 1
          });

    jQuery('#footer-main h1, #footer-main h2, #footer-main h3')
        .addClass("hidden").viewportChecker({
            classToAdd: 'animated bounceInUp',
            offset: 1
          });

    jQuery('#footer-main p, #footer-main li')
        .addClass("hidden").viewportChecker({
            classToAdd: 'animated fadeInLeft',
            offset: 1
          });
}
