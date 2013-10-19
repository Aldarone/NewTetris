jQuery(function($){
	$(window).load(function() {
		
		function wpex_isotope() {
			
			// cache container
			var $container = $('.blog-isotope');
			// initialize isotope
			$container.imagesLoaded(function(){
				$container.isotope({
					itemSelector: '.blog-entry',
					transformsEnabled: false,
					animationOptions: {
						duration: 400,
						easing: 'swing',
						queue: false
					}
				});
			});
			
			$(window).resize(function () {
			
				// cache container
				var $container = $('.blog-isotope');
				// initialize isotope
				$container.isotope({
					itemSelector: '.blog-entry',
					transformsEnabled: false,
					animationOptions: {
						duration: 400,
						easing: 'swing',
						queue: false
					}
				});
			
			}); // END resize
		
		} wpex_isotope();

		
	}); // END window ready
}); // END function