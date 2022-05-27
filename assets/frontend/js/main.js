(function ($) {
  "user strict";

// preloader
$(window).on('load', function () {
  $('.preloader').fadeOut(1000);
  var img = $('.bg_img');
  img.css('background-image', function () {
    var bg = ('url(' + $(this).data('background') + ')');
    return bg;
  });
  bgFooter();
  bgHero();
});

//Create Background Image
(function background() {
  let img = $('.bg_img');
  img.css('background-image', function () {
    var bg = ('url(' + $(this).data('background') + ')');
    return bg;
  });
})();

// header-fixed
var fixed_top = $(".header-section");
$(window).on("scroll", function(){
    if( $(window).scrollTop() > 100){  
        fixed_top.addClass("animated fadeInDown header-fixed");
    }
    else{
        fixed_top.removeClass("animated fadeInDown header-fixed");
    }
});

// scroll-to-top
var ScrollTop = $(".scrollToTop");
$(window).on('scroll', function () {
  if ($(this).scrollTop() < 100) {
      ScrollTop.removeClass("active");
  } else {
      ScrollTop.addClass("active");
  }
});

// sidebar
$(".sidebar-menu-item > a").on("click", function () {
  var element = $(this).parent("li");
  if (element.hasClass("active")) {
    element.removeClass("active");
    element.children("ul").slideUp(500);
  }
  else {
    element.siblings("li").removeClass('active');
    element.addClass("active");
    element.siblings("li").find("ul").slideUp(500);
    element.children('ul').slideDown(500);
  }
});

//sidebar Menu
$(document).on('click', '.navbar__expand', function () {
  $('.sidebar').toggleClass('active');
  $('.navbar-wrapper').toggleClass('active');
  $('.body-wrapper').toggleClass('active');
});

// img-up
$('.imgUp').click(function () {
  upload();
});
function upload() {
  $(".upload").change(function () {
    readURL(this);
  });
}
function readURL(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader(); reader.onload = function (e) {
      var preview = $(input).parents('.profile-thumb-area').find('.image-preview');
      $(preview).css('background-image', 'url(' + e.target.result + ')');
      $(preview).hide();
      $(preview).fadeIn(650);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

// // slider
// var swiper = new Swiper('.brand-slider', {
//   slidesPerView: 6,
//   spaceBetween: 30,
//   loop: true,
//   autoplay: {
//     speed: 1000,
//     delay: 3000,
//   },
//   speed: 1000,
//   breakpoints: {
//     991: {
//       slidesPerView: 5,
//     },
//     767: {
//       slidesPerView: 3,
//     },
//     575: {
//       slidesPerView: 2,
//     },
//   }
// });
   // slider
var swiper = new Swiper('.brand-wrapper', {
  slidesPerView: 4,
  loop: true,
  navigation: {
    nextEl: '.slider-next',
    prevEl: '.slider-prev',
  },
  speed: 1000,
  breakpoints: {
    991: {
      slidesPerView: 3,
    },
    767: {
      slidesPerView: 3,
    },
    575: {
      slidesPerView: 2,
    },
  }
});

// Mobile Menu
$('.sidebar-mobile-menu').on('click', function () {
  $('.sidebar__menu').slideToggle();
});
  

})(jQuery);