	// Sticky header
   function nakaaSh(divContainer, className, classNamePassed) {
    var divContainer = divContainer || 'body';
		var className = className || 'sticky-header';
		var classNamePassed = classNamePassed || 'sticky-header-passed';
		var wrap = $(window);
    $divContainer = $(divContainer);

		wrap.on("scroll", function(e) {
		  if ($(this).scrollTop() > 10) {
				$divContainer.attr('class',className);
		  } else {
		  	if(!$('.nav-wrap.opened').length){
                $divContainer.attr('class',classNamePassed);
            }
		  }
		});
	}
