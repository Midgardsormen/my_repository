(function($){
	$(document).ready(function() {
		var jobpost_submit_button = $('.app-submit');
/*****Max Decourtray Formulaire de recrutement*************/
var nomPoste = $('#nomPoste').text();
$('input#postdemand').val(nomPoste).hide();
var nomMetier = $('strong#categoryPoste').text();
$('input#metierdemand').val(nomMetier).hide();
var localisationposte = $('strong#localisationposte').text();
$('input#localisationPoste').val(localisationposte).hide();
$('p.form_group.legaleAcceptation span.MyClass1.MyClass2.wpcf7-not-valid-tip').html('Vous devez accepter les conditions pour envoyer votre candidature');
$('#backLink').click(function(){history.go(-1)});
 var nbDiv = $('.nbNews').length; 
if(nbDiv < 3) {
	 $('.nbNews').removeClass('col-sm-4').addClass('col-sm-6');
	 $('.newsFrame').addClass('twoDivs');
}
var nbEvents = $('.eventItem').length; 
if(nbEvents < 1) {
	 $('.eventListHp').hide();
}else if (nbEvents == 1){
	$('.eventListHp').addClass('oneEvent');
}
        
        
        
        if($(".wpcf7-response-output").text()== 0){
        	$('.formulaireCandidature div.wpcf7').hide();
        }
        else if($(".wpcf7-response-output").hasClass('wpcf7-mail-sent-ok')){
        	$('.partie1formulaire, .partie2formulaire, .partie3formulaire, .formulaireCandidature .wpcf7-form h3').hide();
        }
        else{
        	$('html, body').animate({
                    scrollTop: $('.wpcf7-not-valid-tip').offset().top-150
                }, 800);
        }
        $('.buttonForm button').click(function(){
            $('.formulaireCandidature div.wpcf7').slideDown(800);
            $(this).fadeOut(800,function(){
            	$('.buttonForm button').remove();
            });
            $('html, body').animate({
                    scrollTop: $('.formulaireCandidature').offset().top
                }, 800);
        });

        



  
		// fonction nakaa-sticky-header : ajoute une classe au scroll.
		nakaaSh();

		// $('#patchwork article').bind('inview', function (event, visible) {
		$('#patchwork').bind('inview', function (event, visible) {
			if(visible)
				{
					$(this).addClass('revealed');
				}
		});

		// $('.patchwork').masonry({
		//   // set itemSelector so .grid-sizer is not used in layout
		//   itemSelector: '.patchwork article',
		//   // use element for option
		//   //columnWidth: '.grid-sizer',
		//   stamp: '.stamp',
		//   // columnWidth: 340,
		//   fitWidth: true,
		//   // gutter: 2
		// });
		//
		$('.patchwork-wrap').masonry({
		  // set itemSelector so .grid-sizer is not used in layout
		  itemSelector: '.patchwork-wrap article',
		  // use element for option
		  //columnWidth: '.grid-sizer',
		  // stamp: '.stamp',
		  // columnWidth: 192,
		  fitWidth: true,
		  // gutter: 25
		})



//
// 		$('.patchwork8').masonry({
// 		  // set itemSelector so .grid-sizer is not used in layout
// 		  itemSelector: '.patchwork8 article',
// 		  // use element for option
// 		  //columnWidth: '.grid-sizer',
// 		  stamp: '.stamp',
// 		  columnWidth: 145,
// 		  fitWidth: true,
// 		  gutter: 0
// 		})
//
// 		var $gridiso = $('.portfolio-grid').isotope({
// 		  // options...
// 		  itemSelector: '.portfolio-grid article',
// 			layoutMode: 'fitRows',
// 		  masonry: {
// 		    columnWidth: 400,
// 				fitWidth: true,
// 			  gutter: 0
// 		  }
// 		});
// 		// bind filter button click
// $('#grid-filters').on( 'click', 'button', function() {
//   var filterValue = $( this ).attr('data-filter');
//   // use filterFn if matches value
//   // filterValue = filterFns[ filterValue ] || filterValue;
// 	$gridiso.isotope({ filter: filterValue });
// });
//
// // change is-checked class on buttons
// $('.filter-ctas').each( function( i, buttonGroup ) {
//   var $buttonGroup = $( buttonGroup );
//   $buttonGroup.on( 'click', 'button', function() {
//     $buttonGroup.find('.is-checked').removeClass('is-checked');
//     $( this ).addClass('is-checked');
//   });
// });


// $('a.colorajax').colorbox({
// 	top:'100px',
// 	onComplete:function(){
//
// 			// $('a.colorajax').colorbox.resize();
// 			setTimeout(function () { //necessary to add a brief pause for colorbox to reintiate
//
// 				$('.popin .flexslider').flexslider({
// 					animation: "slide",
// 					slideshowSpeed: 6000,
// 					animationSpeed: 1500,
// 					controlNav: false,
// 					directionNav: true,
// 					smoothHeight:true,
// 					slideshow: true,
// 					prevText: "",
// 					nextText: "",
// 					maxHeight: '50%',
// 					maxWidth: '50%',
// 					// start: function(){
// 					//     $('.next-slide-xs').on('click', function(e){
// 					//         $('.flex-next').trigger('click');
// 					//     });
// 					//     $('.prev-slide-xs').on('click', function(e){
// 					//         $('.flex-prev').trigger('click');
// 					//     });
// 					// }
// 				});
// 				$('.popin').css('opacity',1);
// 				$('.popin').addClass('ajaxloaded');
// 				$(this).colorbox.resize();
//         }, 500);
//
// 	}
// });

// $(document).bind('cbox_complete', function(){
//   setTimeout($.colorbox.next, 1500);
// });

/*
REVEAL
-----------------------
*/
		function myreveal(){
			/*var fooReveal = {
				// 'bottom', 'left', 'top', 'right'
				origin: 'left',
				// Can be any valid CSS distance, e.g. '5rem', '10%', '20vw', etc.
				distance: '200px',
				// Time in milliseconds.
				duration: 2500,
				delay: 0,
				// Starting angles in degrees, will transition from these values to 0 in all axes.
				rotate: { x: 0, y: 0, z: 0 },
				// Starting opacity value, before transitioning to the computed opacity.
				opacity: 0,
				// Starting scale value, will transition from this value to 1
				scale: 0.9,
				// Accepts any valid CSS easing, e.g. 'ease', 'ease-in-out', 'linear', etc.
				easing: 'cubic-bezier(0.6, 0.2, 0.1, 1)',
				// `<html>` is the default reveal container. You can pass either:
				// DOM Node, e.g. document.querySelector('.fooContainer')
				// Selector, e.g. '.fooContainer'
				container: window.document.documentElement,
				// true/false to control reveal animations on mobile.
				mobile: true,
				// true:  reveals occur every time elements become visible
				// false: reveals occur once as elements become visible
				reset: false,
				// 'always' — delay for all reveal animations
				// 'once'   — delay only the first time reveals occur
				// 'onload' - delay only for animations triggered by first load
				useDelay: 'always',
				// Change when an element is considered in the viewport. The default value
				// of 0.20 means 20% of an element must be visible for its reveal to occur.
				viewFactor: 0.2,
				// Pixel values that alter the container boundaries.
				// e.g. Set `{ top: 48 }`, if you have a 48px tall fixed toolbar.
				// --
				// Visual Aid: https://scrollrevealjs.org/assets/viewoffset.png
				viewOffset: { top: 0, right: 0, bottom: 0, left: 0 },
				// Callbacks that fire for each triggered element reveal, and reset.
				beforeReveal: function (domEl) {},
				beforeReset: function (domEl) {},
				// Callbacks that fire for each completed element reveal, and reset.
				afterReveal: function (domEl) {},
				afterReset: function (domEl) {}
			};*/
			var aReveal = {
				origin: 'left',
				distance: '300px',
				duration: 1500,
				delay: 0,
				// reset: true,
				easing: 'cubic-bezier(0.6, 0.2, 0.1, 1)',
				viewOffset: { top: 0, right: 0, bottom: 0, left: 0 }
			};
			var bReveal = {
				origin: 'left',
				distance: '-300px',
				duration: 1500,
				delay: 0,
				easing: 'cubic-bezier(0.6, 0.2, 0.1, 1)',
				viewOffset: { top: 0, right: 0, bottom: 0, left: 0 }
			};

			window.sr = ScrollReveal();
			sr.reveal('.bg-wt .a', aReveal);
			sr.reveal('.bg-wt .b', bReveal);
			// sr.reveal('#chocolate', { delay: 500, scale: 0.9 });
		}
		myreveal();

		// Si le navigateur ne prend pas en charge le placeholder
		if ( document.createElement('input').placeholder == undefined ) {

			// Champ avec un attribut HTML5 placeholder
			$('[placeholder]').focus(function() {
				if ( $(this).val() == $(this).attr('placeholder') ) {
					$(this).val('');
				}
			}).blur(function() {
				if ( $(this).val() == '' ) {
					$(this).val( $(this).attr('placeholder') );
				}
			}).blur().parents('form').submit(function() {
				$(this).find('[placeholder]').each(function() {
					if ( $(this).val() == $(this).attr('placeholder') ) {
						$(this).val('');
					}
				});
			});
		}


		/*
		respNav
		-----------------------
		*/

		/* ouverture du menu */
		var RESPNAV = $(".resp-nav .nav-wrap");
		var body = $('body');
		var navline = $('.nav-line');
		var toggle = $(".respNav-toggle");
		/* Spécifique WT : ouverture du menu mobile sur toute la hauteur de la page */
		$(".resp-nav .nav-wrap").css('height',$(document).height());
		$openingTime = 700;
		toggle.on('click', function(event){
			if(RESPNAV.hasClass("opened")){
                /*navline.css('height',0);
                RESPNAV.slideUp($openingTime).attr("class", "nav-wrap"); $(this).removeClass("opened");
                body.css('position','initial');*/

                $(this).removeClass("opened");
                navline.css('height',0);
                RESPNAV.slideUp($openingTime,function(){
                    $(this).attr("class", "nav-wrap");

                    body.css('position','initial');
				});

            }
			else{
                /*var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
                $(this).addClass("opened");
                RESPNAV.animate( { height: h+"px" }, { queue:false, duration: $openingTime },function(){
                    // toggle.addClass("opened");
                    body.css('position','fixed');
                    navline.css('height',h);
                    $(this).addClass("opened");
                });*/
				// $(this).addClass("opened");

                setTimeout(function(){ toggle.addClass("opened"); }, 200);
				RESPNAV.slideDown($openingTime,function(){

                    body.css('position','fixed');
                    var h = Math.max(document.documentElement.clientHeight, window.innerHeight || 0);
                    navline.css('height',h);
                    $(this).css('height',h).addClass("opened");
				});

			}
		});
		/* Add <i></i> to each Nav item having Children */
		/*
		Already added by php
		$(".nav-wrap>ul>li").each(function(index, el) {
			var hasUl = $(this).find('ul');
			if(hasUl.length){
				// $(this).addClass('parent');
				$(this).addClass('parent');
				$(this).find('>span').append('<i></i>');
				// hasUl.before('<i></i>');
			}
		});*/
		/* ouverture des sous-menus */
		var mobile_init_done = 0, coming_from_desktop = 0;
		$(window).resize(function () {
			if ($(window).width() <= 1023 ) {
				if(mobile_init_done==0 || coming_from_desktop==1){
					mobile_init_done=1;
					coming_from_desktop=0;
					$('.main-nav.resp-nav .nav-wrap>ul>li>span').on('click', function (event) {
						var close_it = ($(this).parent().hasClass('li-opened'))?1:0;
						if(close_it){
							$(this).find('i').removeClass('opened');
							$(this).parent().removeClass('li-opened');
							$(this).siblings('ul').slideUp(450);
						}
						else{
							$('.li-opened').find('i').removeClass('opened');
							$('.li-opened').find('ul').slideUp(450);
							$('.li-opened').removeClass('li-opened')

							$(this).find('i').addClass('opened');
							$(this).parent().addClass('li-opened');
							$(this).siblings('ul').slideDown(450);

						}
					});
				}
			} else {
				coming_from_desktop = 1;
				$('.main-nav.resp-nav .nav-wrap>ul>li>span').off('click');
			}
		}).resize(); //to initialize the value




		/*
		Smooth scroll Ancres
		-----------------------
		*/
		$('a[href^="#"]:not(.no-smooth-scroll)').click(function(){
			var the_id = $(this).attr("href");

			$('html, body').animate({
				scrollTop:$(the_id).offset().top
			}, 'slow');
			return false;
		});




	});
})(jQuery);
