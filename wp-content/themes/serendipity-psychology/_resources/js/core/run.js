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


		// Contact form
		// setInterval(function() {
		// 	console.log($('.public-DraftEditor-content'));

		// }, 500);

		// // Access the iframe
		// const iframe = document.querySelector('.serendipity-referral-form iframe');
		// console.log(iframe);

		// // Get the iframe's document
		// const iframeDocument = iframe.contentDocument || iframe.contentWindow.document;

		// // Now you can target elements within the iframe
		// const elementInsideIframe = iframeDocument.querySelector('.Paperform__Container');
		// console.log(elementInsideIframe);

		// Perform actions on the element
		// elementInsideIframe.style.backgroundColor = 'yellow';

	});

}(jQuery));
