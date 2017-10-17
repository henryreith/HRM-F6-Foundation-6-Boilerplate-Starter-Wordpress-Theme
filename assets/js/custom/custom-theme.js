(function ($) {
	
	"use strict";

	$(document).ready(function() {
    // Table Of Contents
    if ($('#toc_container').length > 0) { 
      $("#toc_container").addClass("callout");
    }

		// Comments
		$(".commentlist li").addClass("panel panel-default");
		$(".comment-reply-link").addClass("button");
	
		// Forms
		$('input[type=submit]').addClass('button');
		
		$('a[href^="#"]').on('click', function(event) {

			var target = $( $(this).attr('href') );

			if( target.length ) {
				event.preventDefault();
				$('html, body').animate({
					scrollTop: target.offset().top
				}, 1000);
			}

		});

    /**
    * Make all external links open in new window
    */
    $('a:not([href^="#"]):not([href^="/"])').filter(function() {
        return this.hostname && this.hostname !== location.hostname;
    }).attr("target","_blank");

	});

}(jQuery));