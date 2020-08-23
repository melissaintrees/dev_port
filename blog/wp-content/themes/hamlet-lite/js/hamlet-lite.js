jQuery(document).ready(function($) {

	"use strict";
	
	$("#owl-demo").owlCarousel({
		navigation : false,
		items : 1,
		itemsDesktop : [1199,1],
		itemsDesktopSmall : [980,1],
		itemsTablet: [768,1],
		itemsTabletSmall: [568,1],
		itemsMobile : [479,1],
	});

	// Search
	
	$('#top-search a').on('click', function ( e ) {
		e.preventDefault();
    	$('.show-search').slideToggle('fast');
    });

});