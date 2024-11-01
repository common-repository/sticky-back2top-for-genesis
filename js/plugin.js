jQuery(document).ready(function($){
	// Settings for scroll depth, opacity, and animations
	var offset = 30,
		offset_opacity = 1200,
		scroll_top_duration = 700,
		$back_to_top = $('.sb2t');

	//Whether link is visible
	$(window).scroll(function(){
		( $(this).scrollTop() > offset ) ? $back_to_top.addClass('top-is-visible') : $back_to_top.removeClass('top-is-visible top-fade-out');
		if( $(this).scrollTop() > offset_opacity ) { 
			$back_to_top.addClass('top-fade-out');
		}
	});

	//Bring it back
	$back_to_top.on('click', function(event){
		event.preventDefault();
		$('body,html').animate({
			scrollTop: 0 ,
		 	}, scroll_top_duration
		);
	});
});