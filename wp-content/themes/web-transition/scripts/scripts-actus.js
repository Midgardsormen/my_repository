
(function($){

$(document).ready(function() {
 /* Actualités : filtres */
 $buttons = $('#patchwork .filters button');
 $buttons.on('click',function(){
     $tag = $(this).toggleClass('current').attr('id');
     // version 1 filtre à la fois. Retirer cette ligne pour permettre plusieurs filtres
     $buttons.not('#'+$tag).attr('class','cta2');
     $selectedFilters = $('.filters button.current');
     $("#patchwork article").removeClass('on').addClass('off');
     if(!$selectedFilters.length){
         $("#patchwork article").removeClass('on off');
         return;
     }
     else{
         $("#patchwork article").removeClass('on').addClass('off');
         $selectedFilters.each(function(){
             $("."+$(this).attr('id')).removeClass('off').addClass('on');
         });
     }
 });

    /* Archives : filtres */
    $buttonsB = $('#patchwork2 .filters button');
    $buttonsB.on('click',function(){
        $tag = $(this).toggleClass('current').attr('id');
        // version 1 filtre à la fois. Retirer cette ligne pour permettre plusieurs filtres
        $buttonsB.not('#'+$tag).attr('class','cta2');
        $selectedFilters = $('.filters button.current');
        $("#patchwork2 article").removeClass('on').addClass('off');
        if(!$selectedFilters.length){
            $("#patchwork2 article").removeClass('on off');
            return;
        }
        else{
            $("#patchwork2 article").removeClass('on').addClass('off');
            $selectedFilters.each(function(){
                $("."+$(this).attr('id')).removeClass('off').addClass('on');
            });
        }
    });

});

 })(jQuery);
