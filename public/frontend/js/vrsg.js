jQuery(document).ready(function($){
	$('.related-product .col-12').slick({
		dots:false,
		infinite: true,
		speed: 500,
		slidesToShow: 4,
		slidesToScroll: 2,
		nextArrow:'<span class="next"><i class="ti-arrow-right"></i></span>',
		prevArrow:'<span class="prev"><i class="ti-arrow-left"></i></span>',
		responsive: [
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 2,
				}
			},
		]
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
		responsive: [
			{
				breakpoint: 767,
				settings: {
					slidesToShow: 2,
				}
			},
			{
				breakpoint: 980,
				settings: {
					slidesToShow: 2,
				}
			},
		]
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
	/*if($(window).width()<767){
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
	}*/
	/*-----------------------END SLICK---------------------------------*/
	$('.remove-item').click(function() {
		$(this).parents('.item-view-cart').remove();
	})
	$('.btn-plus').click(function() {
		var input = $(this).siblings('input');
		input.val(+input.val()+1);
	})
	$('.btn-minus').click(function() {
		var input = $(this).siblings('input');
		if(input.val() >1){
			input.val(+input.val()-1);
		}
		else {
			$('#cartModal').modal('show')
		}

	})
	$('.backtotop').click(function() {
		$("html, body").animate({ scrollTop: 0 }, "slow");
	})
	$(".ul-menu,.button-menu").click(function(event){
		event.stopPropagation();
	});
	$("input[name='fullname']").keyup(function() {
		$('.name-input').text($(this).val())
	});
	$("input[name='phone_number']").keyup(function() {
		$('.phone-input').text($(this).val())
	});
	$("input[name='email']").keyup(function() {
		$('.email-input').text($(this).val())
	});
	$("input[name='house_number']").keyup(function() {
		getAddressString();
	});
	$("textarea[name='note']").keyup(function() {
		$('.note').text($(this).val())
	});
	if($(window).width()<768){
		$('.button-menu').click(function(){
			$('.opened').removeClass('opened')
			$(this).toggleClass('menu-opened');
			$('.ul-menu').slideToggle();
		})
		$("body").click(function(event){
			if(!$('.ul-menu').is(':hidden')){
				$('.ul-menu').slideToggle();
				$('.button-menu').removeClass('menu-opened');
			}
		});
		$('.ul-menu>.has-child>a,.sub-ul-menu .has-child>a').click(function(e){
			e.preventDefault()
			if($(this).parent().hasClass('opened')){
				$(this).parent().removeClass('opened');
			}
			else {
				$(this).parent().addClass('opened')
			}
		})
		$('.search button').click(function(e){
			$('.search').addClass('active');
			$('.search').find('input').focus();
		})
		$('.search .ti-close').click(function(){
			$('.search input').val('')
			$('.search').removeClass('active')
		})
	}
	/*$('.sub-menu a').hover(function(){
		$(this).parent().addClass('hover');
	})
	$('.sub-menu a').mouseleave(function(){
		$(this).parent().removeClass('hover');
	})*/

});

function getAddressString() {
	let province = $('#province option:selected');
	let district = $('#district option:selected');
	let ward = $('#ward option:selected');
	if (province.val() && district.val() && ward.val()) {
		$('.address-input').text(`${$("input[name='house_number']").val()}, ${ward.text()}, ${district.text()}, ${province.text()}`);
	} else {
		$('.address-input').text($("input[name='house_number']").val());
	}
}
