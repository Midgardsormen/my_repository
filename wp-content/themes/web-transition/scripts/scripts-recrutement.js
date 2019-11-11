
(function($){


 /* modèle : http://codepen.io/alexandergaziev/pen/JdVQQm */
$(document).ready(function() {
    $openingTime=500;
    $closingTime=200;
 $(".title").on('click',function(event){
  $this = $(this);
     if($this.hasClass("opened")){

         $this.removeClass("opened").siblings('.contenu').slideUp($closingTime,function(){
         });
     }
     else{
         $others = $('.title.opened');
         if($others.length){
             $others.removeClass('opened').siblings('.contenu').slideUp($closingTime,function(){
                 $this.addClass("opened").siblings('.contenu').slideDown($openingTime);
             });
         }
         else{
             $this.addClass("opened").siblings('.contenu').slideDown($openingTime);
         }
     }


  // $('.opened').toggleClass('opened').siblings('.contenu').slideToggle();
  //  $(this).toggleClass('opened');
  //  $(this).siblings('.contenu').slideToggle();
   // fermer les autres.
     // scroll to top.
 });

    $(".cta-postuler button").on('click',function(event){
        $container = $(this).parent().parent().parent();
        $button = $(this);
        if($button.hasClass("opened")){
            $button.removeClass("opened").parent().parent().parent().siblings('.form-candidature').slideUp($closingTime,function(){
            });
        }
        else{
            $others = $('.cta-postuler button.opened');
            if($others.length){
                $others.removeClass('opened').parent().parent().parent().siblings('.form-candidature').slideUp($closingTime,function(){
                    $button.addClass("opened").parent().parent().parent().siblings('.form-candidature').slideDown($openingTime);
                });
            }
            else{
                $button.addClass("opened").parent().parent().parent().siblings('.form-candidature').slideDown($openingTime);
            }
        }
    });


});

 })(jQuery);
