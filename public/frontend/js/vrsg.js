jQuery(document).ready(function($){
	$('.related-product .col-12').slick({
		dots:false,
		infinite: true,
		speed: 500,
		slidesToShow: 4,
		slidesToScroll: 2,
		nextArrow:'<span class="next"><i class="ti-arrow-right"></i></span>',
		prevArrow:'<span class="prev"><i class="ti-arrow-left"></i></span>',
	});
	$('.wrap-image-pro').slick({
		dots:false,
		infinite: false,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		speed: 500,
		asNavFor: '.thumnail'
	});
	$('.thumnail').slick({
		slidesToShow: 4,
		slidesToScroll: 1,

		arrows: true,
		asNavFor: '.wrap-image-pro',
		dots: false,
		autoplay: true,
		autoplaySpeed: 4000,
		infinite: true,
		centerMode: true,
  		focusOnSelect: true,
		nextArrow:'<span class="next"><i class="ti-angle-right"></i></span>',
		prevArrow:'<span class="prev"><i class="ti-angle-left"></i></span>',
		/*responsive: [
		    {
		      breakpoint: 767,
		      settings: {
		        slidesToShow: 1,
		      }
		    },
    	]*/
	});

	$(window).scroll(function(){
    	if($(this).scrollTop()> 150){
    		$('.header-menu').addClass('fixed')
    	}
    	else {
    		$('.header-menu').removeClass('fixed')
    	}

    	if($(this).scrollTop()> 250){
    		$('.backtotop').addClass('active')
    	}
    	else {
    		$('.backtotop').removeClass('active')
    	}
	})
	if($(window).width()<767){
		$('.sign-up').slick({
		dots:false,
		infinite: false,
		slidesToShow: 1,
		slidesToScroll: 1,
		arrows: false,
		autoplay: true,
		autoplaySpeed: 2000,
		infinite: true,
		
  		focusOnSelect: true,
	});
	}
	/*-----------------------END SLICK---------------------------------*/
	$('.button-menu').click(function(){
		$(this).toggleClass('menu-opened');
		$('#menu .float-right ul').slideToggle();
	})
	if($(window).width()<768){
		$('#menu .float-right').before($('#menu .float-left'));
	}
	$('.sub-menu a').hover(function(){
		$(this).parent().addClass('hover');
	})
	$('.sub-menu a').mouseleave(function(){
		$(this).parent().removeClass('hover');
	})
	//hill();
	level();
	$( window ).resize(function() {
		//hill();
		level();
	});
});


function hill(){
	var h = $('#header-menu').height();
	var w = $('#header-menu').width();
	var l = w/16.45;
	var b = h/50;
	var w1 = w/1.82;
	$('.abs').css({'bottom':b+'px','left':l+'px','width':w1+'px'});
}
function level(){
	var h = $('.table-r').height() - 107;
	$('.img-level img').height(h+'px');
}
