$(document).ready(function () {
	$(".icon-show-nav, .close-nav").on("click", function () {
		$(".header-nav-wrap").toggleClass("header-nav-wrap-active")
	}),
    
    $(".btn-menu").on("click", function () {
        $(".home-fea-left").toggleClass("home-fea-left-add-hover")
    }),
    $(window).scroll(function(){
        if($(this).scrollTop() > 200){
            $('.header').addClass('header-fixed');
            $('body').addClass('body-padding');
            $('.icon-back-top').addClass('icon-back-top-active');
        }
        else{
            $('.header').removeClass('header-fixed');
            $('body').removeClass('body-padding');
            $('.icon-back-top').removeClass('icon-back-top-active');
        } 
    });   
	$(".icon-back-top").click(function () {
		$("body,html").animate({
			scrollTop: 0
		},
		"fast")
	})

	$('.owl-pro-gallery').owlCarousel({
        loop:true,
        margin:25,
        nav:true,
        dots:false,
        responsive:{
            0:{
                items:2
            },
            720:{
                items:2
            },
            1000:{
                items:3
            },
            1190:{
                items:3
            }
        }
    });

    $('.owl-img-sam').owlCarousel({
        loop:true,
        margin:20,
        nav:false,
        dots:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1190:{
                items:3
            }
        }
    });
});