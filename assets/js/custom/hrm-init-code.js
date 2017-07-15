/* (function ($) {
	
	"use strict";

	$(document).ready(function() {

	});

}(jQuery)); 
*/
// Init Foundation 6
jQuery(function($) {$(document).foundation();});

// LazyLoadXT - Add 1000px to edgeY
(function ($) {
    var options = $.lazyLoadXT;
    options.edgeY = '1000';
})(window.jQuery || window.Zepto || window.$);

// Set Up & Init FitVid.js
jQuery(function($) {$(".row").fitVids();});

jQuery(function($) {
	$( "iframe" ).on( "lazyload", function() {
		$(".row").fitVids(); 
	});
});

// Load all images if desktop
/*
jQuery(function($) {
if (Foundation.MediaQuery.atLeast('xlarge')) {
	$.extend($.lazyLoadXT, {
		forceLoad: true
	});
}
}); */

// Set Up HeadRoom
(function() {
	var header = new Headroom(document.querySelector("#site-nav-wrapper"), {
		tolerance: 5,
		offset : 0,
		classes: {
		  initial: "animated",
		  pinned: "slideInDown",
		  unpinned: "slideOutUp"
		}
	});
	header.init();
}());

// Other Custom Script
jQuery(function($) {
	// Make Min Height For Nav Bar
	/* START - Calc Size of Header */
	$.fn.navHeightFunction = function(){ 
		var divHeight = $('#site-header-inner-wrap').height();  
		$('#site-header').css('min-height', divHeight+'px');
	}
	setTimeout(function() {
		$.fn.navHeightFunction();
	}, 3000);
	/* $( window ).resize(function(){
		$.fn.navHeightFunction();
	}); */
	$('#site-header-inner-wrap').on('resizeme.zf.trigger', (function(){
		$.fn.navHeightFunction();
		// console.log( "You just resized!" ); 
	})
	);
	/* END - Calc Size of Header */

	/* START - Scroll Events */
	// Scroll Events
	/* $('#headerScroll').on('scrollme.zf.trigger', (function(){
		console.log( "You just scrolled Up!" ); 
	})
	);

	// Thank - http://thecodeblock.com/detect-scroll-up-and-down-using-jquery/
	$(function(){
		 var lastScrollTop = 0, delta = 5;
		 $(window).scroll(function(){
			 var nowScrollTop = $(this).scrollTop();
			 if(Math.abs(lastScrollTop - nowScrollTop) >= delta){
			 if (nowScrollTop > lastScrollTop){
			 // ACTION ON
			 // SCROLLING DOWN 
			 } else {
			 	console.log( "You just scrolled Up!" );  
			 }
			 lastScrollTop = nowScrollTop;
			 }
		 });
 	}); */
});

