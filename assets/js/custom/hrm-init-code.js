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
/* 
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
*/
