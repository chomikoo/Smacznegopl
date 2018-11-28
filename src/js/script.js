(function ($) {
	'use strict'
	console.log('Hello from script.js ');


	/////////////////////
	// Init frontpage slider
	/////////////////////

	$('.slider__list').slick({
		dots: false,
		speed: 500,
		slidesToShow: 3,
		responsive: [
			{
				breakpoint: 950,
				settings: {
				  slidesToShow: 2
				}
			},
			{
				breakpoint: 580,
				settings: {
				  slidesToShow: 1
				}
			  },
		]
	});

	/////////////////////
	// equal slide height
	/////////////////////
	const setSlidesHeight = (element) => {
		const slickWrapper = $(element);
		const slickWrapperH = slickWrapper.height();
		slickWrapper.find('.slick-slide').css('height', slickWrapperH + 'px' );
	}
	setSlidesHeight('.top-carousel');
	// setSlidesHeight('.meal-terms');


	$(window).on('resize', setSlidesHeight('.top-carousel'));

	$('.meal-terms').slick({
		// dots: true,
		speed: 500,
		slidesToShow: 3,
		responsive: [
			{
				breakpoint: 580,
				settings: {
				  slidesToShow: 2
				}
			  },
		]
	}); 


	
	// Instafeeed
	// Init instafeed.js
	var instaFeed = new Instafeed({
		get: 'user',
		userId: '1394009005',
		clientId: '3ee3dcd44bdb4ebd8d86b678912ae41f',
		target: 'insta',
		accessToken: '1394009005.3ee3dcd.b19c16774879468182aa8d20bebc82da',
		resolution: 'standard_resolution',
		sortBy: 'most-recent',
		limit: 9,
		template: '<a href="{{link}}" class="instagram__img thumbnail" target="_blank">' +
			'<img alt="" src="{{image}}"></a>' +
			'</div>'
	});

	if( $('#insta').length) {
		instaFeed.run();
	}





})(jQuery)