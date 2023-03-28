document.addEventListener("DOMContentLoaded", function() {

	var $ = jQuery.noConflict(),
		d = new Date(),
		n = d.getFullYear(),
		page = $('html, body');

		$('.foo-copy s').text(n).addClass('foo-copy-year');

	function onScroll() {

		if ($(window).scrollTop() > 70) {
			$('.scroll-up').removeClass('hidden');
			$('.site-header').addClass('static');
		} else {
			$('.scroll-up').addClass('hidden');
			$('.site-header').removeClass('static');
		}
	}
	window.addEventListener('scroll', onScroll, false);

	$('.wp-block-navigation__responsive-container-open').html( "<i></i><i></i><i></i>");

	$('.wp-block-navigation__responsive-container-open').click(function(e) {
		$(this).toggleClass('close');
		$('.is-menu-open').toggleClass('closed');
		e.preventDefault();
	});

	$('body.single .wp-block-post-featured-image').addClass('img-left');

	//$('body.home').addClass('intro-video__body');

	$('body.home .intro-video').removeClass('hide hidden');

	$('#close-menu-body').on('click', function(){
		//$('.has-modal-open.close').click();
		history.go(0);
	});

	$('.accordion-button').addClass('collapsed');

	$('.wpcf7-select').select2({
		placeholder: "Please select",
		minimumResultsForSearch: 3,
    	allowClear: true
	});

	$(".foo-copy .widget_text p strong").text(n);

	$('.h-icons .search-h').on( "click", function() {
		$('.h-icons .wp-block-search').toggleClass('active');
	});

	$('.h-icons .soc-h').on( "click", function() {
		$('.h-icons .wp-block-social-links').toggleClass('active');
	});

	$('.scroll-up').click(function(e) {
		page.animate({
			scrollTop : 0,
		}, 100);
		e.preventDefault();
	});

	$('.scroll-down').click(function(e) {
		var SlideHeight = $('.section__home-hero').height();
		// /console.log(SlideHeight);
		page.animate({
			scrollTop : page.scrollTop() + SlideHeight,
		}, 1000);
		e.preventDefault();
	});

	$('.open-popup-link').magnificPopup({
		markup: '<div class="mfp-iframe-scaler">'+
				'<div class="mfp-close"></div>'+
				'<iframe class="mfp-iframe" frameborder="0" allowfullscreen></iframe>'+
			'</div>', // HTML markup of popup, `mfp-close` will be replaced by the close button
		tLoading: 'Loading...',
		type:'inline',
		midClick: true, // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
	});

	// Compare images
	var switcher = document.querySelector(".compare-switcher");
	var topImage = document.querySelector(".compare-img.top");
	var compareBox = document.querySelector(".compare-box");
	var updatePosition = function (e) {
		var left = e.clientX;
		var boxLeft = compareBox.getBoundingClientRect().left;
		var boxRight = compareBox.getBoundingClientRect().right;
		var diff = left - boxLeft;
		if (diff >= 0 && diff <= boxRight - boxLeft) {
			switcher.style.left = left - boxLeft - 10 + "px";
			topImage.style.width = left - boxLeft + "px";
		}
	};
	switcher.addEventListener("mousedown", function (e) {
		compareBox.addEventListener("mousemove", updatePosition);
		compareBox.addEventListener("mouseleave", function () {
			compareBox.removeEventListener("mousemove", updatePosition);
		});
		compareBox.addEventListener("mouseup", function () {
			compareBox.removeEventListener("mousemove", updatePosition);
		});
	});
	
});
