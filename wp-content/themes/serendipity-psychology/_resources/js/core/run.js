// binds $ to jquery, requires you to write strict code. Will fail validation if it doesn't match requirements.
(function ($) {
	"use strict";

	// add all of your code within here, not above or below
	$(function () {

		// Mobile bottom bar
		$(window).scroll(function(){
			if($(this).scrollTop() >= 500){
				$('.mobile-bottom-bar').removeClass('translate-y-24');
			} else {
				$('.mobile-bottom-bar').addClass('translate-y-24');
			}
		});

	});

}(jQuery));
