 // thumbnail slider
 $('.slider').slick({
 	slidesToShow: 1,
 	slidesToScroll: 1,
 	arrows: false,
 	fade: false,
 	asNavFor: '.slider-nav-thumbnails',
 });

 $('.slider-nav-thumbnails').slick({
 	slidesToShow: 4,
 	slidesToScroll: 1,
 	asNavFor: '.slider',
 	dots: true,
 	focusOnSelect: true
 });

 //remove active class from all thumbnail slides
 $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');

 //set active class to first thumbnail slides
 $('.slider-nav-thumbnails .slick-slide').eq(0).addClass('slick-active');

 // On before slide change match active thumbnail to current slide
 $('.slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
 	var mySlideNumber = nextSlide;
 	$('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
 	$('.slider-nav-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-active');
});
  

// timeline script

jQuery(document).ready(function($){
	var $timeline_block = $('.cd-timeline-block');

	//hide timeline blocks which are outside the viewport
	$timeline_block.each(function(){
		if($(this).offset().top > $(window).scrollTop()+$(window).height()*0.75) {
			$(this).find('.cd-timeline-img, .cd-timeline-content').addClass('is-hidden');
		}
	});

	//on scolling, show/animate timeline blocks when enter the viewport
	$(window).on('scroll', function(){
		$timeline_block.each(function(){
			if( $(this).offset().top <= $(window).scrollTop()+$(window).height()*0.75 && $(this).find('.cd-timeline-img').hasClass('is-hidden') ) {
				$(this).find('.cd-timeline-img, .cd-timeline-content').removeClass('is-hidden').addClass('bounce-in');
			}
		});
	});
});



