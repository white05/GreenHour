// Dependency
/*
 * jQuery throttle / debounce - v1.1 - 3/7/2010
 * http://benalman.com/projects/jquery-throttle-debounce-plugin/
 * 
 * Copyright (c) 2010 "Cowboy" Ben Alman
 * Dual licensed under the MIT and GPL licenses.
 * http://benalman.com/about/license/
 */
(function(b,c){var $=b.jQuery||b.Cowboy||(b.Cowboy={}),a;$.throttle=a=function(e,f,j,i){var h,d=0;if(typeof f!=="boolean"){i=j;j=f;f=c}function g(){var o=this,m=+new Date()-d,n=arguments;function l(){d=+new Date();j.apply(o,n)}function k(){h=c}if(i&&!h){l()}h&&clearTimeout(h);if(i===c&&m>e){l()}else{if(f!==true){h=setTimeout(i?k:l,i===c?e-m:e)}}}if($.guid){g.guid=j.guid=j.guid||$.guid++}return g};$.debounce=function(d,e,f){return f===c?a(d,e,false):a(d,f,e!==false)}})(this);

// Main Script by CapitalH
// Sticky headers script
jQuery(document).ready(function($){"use strict";
	var document_height = $( document ).height(),
		site_branding = '.stickUp',
		main_header = '#site-branding',
		toolbar = '#toolbar',
		site_branding_height = $(site_branding).height(),
		toolbar_height = $(toolbar).height(),
		main_header_height = $(main_header).height(),
		nav_placeholder ='.nav-placeholder';

		$(nav_placeholder).css('height', site_branding_height);

	var sticky_header_classes = function () {
		$(window).scroll(function () {

			if ( $(this).scrollTop() > site_branding_height + toolbar_height + main_header_height ){

				$(site_branding).addClass("isStuck fixed");
				$(nav_placeholder).addClass("active");

				setTimeout(function(){
					$(site_branding).addClass("push-down");
				}, 50);

			} else {
				$(site_branding).removeClass("isStuck fixed push-down");
				$(nav_placeholder).removeClass("active");
			}

			if ( $(this).scrollTop() > 650 ) {
				$('#back-top').addClass('visible');
			} else {
				$('#back-top').removeClass('visible');
			}

		});

	};

	if ( document_height >= 1000 ) {
	//return if dcument heigt is less than 1000 pixels
		$(window).scroll( $.debounce( 250,true, sticky_header_classes ) );
	}

});