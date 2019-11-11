(function($){
$(document).ready(function() {

		$(".guidestyle .picto_css").on('click', function(event){
			$(this).toggleClass("opened");
		});
		$(".my-grid").on('click', function(event){
			$(this).toggleClass("opened");
		});
		$(".cta.grid-button").on('click', function(event){
			$(".my-grid").toggle();
			getContainerSize();
		});
		$( window ).resize(function() {
			getContainerSize();
		});
	});
	function getContainerSize(){
		$(".my-grid .infos span").html("W:" + $(".my-grid .container").width() + "px | innerW:" + $(".my-grid .container").innerWidth() + "px");
	}

 })(jQuery);
