
(function($){

$(document).ready(function() {
	$('.flexslider').flexslider({
	    animation: "fade",
			slideshowSpeed: 6000,
			animationSpeed: 1500,
			controlNav: true,
			directionNav: true,
			smoothHeight:true,
			slideshow: true,
			prevText: "",
			nextText: "",
        // start: function(){
        //     $('.next-slide-xs').on('click', function(e){
        //         $('.flex-next').trigger('click');
        //     });
        //     $('.prev-slide-xs').on('click', function(e){
        //         $('.flex-prev').trigger('click');
        //     });
        // }
	  });

});

 })(jQuery);
