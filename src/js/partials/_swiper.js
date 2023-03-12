
document.addEventListener("DOMContentLoaded", function() {

	var $ = jQuery.noConflict(), i = 0, p = 0, l = 0;

	$('.section__lifecycle--slider .row').addClass('swiper-wrapper');
	$('.section__lifecycle--slider .row .wp-block-dpwpblocks-column').addClass('swiper-slide');

	var swiper = new Swiper('.section__lifecycle--slider', {
		observeSlideChildren: true,
		slideToClickedSlide: true,
		updateOnWindowResize: true,
		slidesPerColumnFill: 'row',
		centeredSlides: true,
		slidesPerView: 1,
		spaceBetween: 0,
		loop: true,
		speed: 2000,
		autoplay: {
			delay: 4000,
			disableOnInteraction: false,
		},
		keyboard: {
			enabled: true,
			onlyInViewport: false,
		},
		pagination: {
			el: '.swiper-life--pagination',
			clickable: true,
			renderBullet: function (index, className) {
				return '<span class="' + className + '"></span>';
			},
		  },
		grabCursor: true
	});

	$('.swiper-pagination-bullets .swiper-pagination-bullet').each(function() {
		i++;
		$(this).addClass('slide' + i);
	});

	$('.swiper-life--list li').each(function() {
		p++;
		$(this).addClass('slide' + p);
	});

	$('.swiper-pagination-bullets').addClass('swiper-life--list');

	$('.swiper-pagination-bullets .swiper-pagination-bullet').each(function() {
		l++;
		var txt = $('.swiper-life--list li.slide' + l).text();
		// console.log(txt);
		$('.swiper-pagination-bullet.slide' + l).text(txt);
	});
});