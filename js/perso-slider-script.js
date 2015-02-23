/*
	Perso Slider Script
*/

jQuery(window).load(function() {
	
	var is_touch_device = 'ontouchstart' in document.documentElement; // check if touch devices
    if(is_touch_device){
		jQuery('.perso_slider_next, .perso_slider_prev, .perso_slider_content').addClass('is_touch');
	}
	
	jQuery(".perso_slider_wrap ul").filter(function( index ) { // when have 1 image only, remove next and prev buttons
		return jQuery( "li", this ).length === 1;
    }).closest(".perso_slider_wrap").find("i").remove();
	
	jQuery('#perso_slider li:first-child').addClass('perso_slider_moving');
	jQuery('#perso_slider li').addClass('animated');
	
	jQuery(".perso_slider_next").click(function () { // when click on next button
		var $nextButton = jQuery(this);
		var $sliderContainer = $nextButton.closest('.perso_slider_content');
		var $first = $sliderContainer.find('li:first-child');
		var $next;
		
	  	$perso_slider_moving = $sliderContainer.find('.perso_slider_moving');
	  	$next = $perso_slider_moving.next('li').length ? $perso_slider_moving.next('li') : $first;

	  	$perso_slider_moving.removeClass("fadeInLeft fadeInRight");
	  	$perso_slider_moving.removeClass("perso_slider_moving").fadeOut(500);

	  	$next.addClass('fadeInRight');
	  	$next.addClass('perso_slider_moving').fadeIn(500);
	});

	jQuery(".perso_slider_prev").click(function () { // when click on prev button
		var $prevButton = jQuery(this);
		var $sliderContainer = $prevButton.closest('.perso_slider_content');
		var $last = $sliderContainer.find('li:last-child');
		var $prev;
		
    	$perso_slider_moving =  $sliderContainer.find(".perso_slider_moving");
    	$prev = $perso_slider_moving.prev('li').length ? $perso_slider_moving.prev('li') : $last;
		
    	$perso_slider_moving.removeClass("fadeInRight fadeInLeft");
		$perso_slider_moving.removeClass("perso_slider_moving").fadeOut(500);
		
		$prev.addClass('fadeInLeft');
    	$prev.addClass('perso_slider_moving').fadeIn(500);
	});
	
});