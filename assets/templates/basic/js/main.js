(function ($) {
  "user strict";

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


  let bgFooter = function() {
    let footer = $('footer');
    let footerPrev = footer.prev();
    if(footerPrev.hasClass('bg--section')) {
      footer.removeClass('bg--section');
    }else{
      footer.addClass('bg--section')
    }
  }

  let bgHero = function() {
    let hero = $('.hero-section');
    let heroPrev = hero.next();
    if(heroPrev.hasClass('bg--section')) {
      hero.removeClass('bg--section');
    }else{
      hero.addClass('bg--section')
    }
  }

  $("ul>li>.submenu").parent("li").addClass("menu-item-has-children");
  // drop down menu width overflow problem fix
  $('ul').parent('li').hover(function () {
    var menu = $(this).find("ul");
    var menupos = $(menu).offset();
    if (menupos.left + menu.width() > $(window).width()) {
      var newpos = -$(menu).width();
      menu.css({
        left: newpos
      });
    }
  });
  $('.menu li a').on('click', function (e) {
    var element = $(this).parent('li');
    if (element.hasClass('open')) {
      element.removeClass('open');
      element.find('li').removeClass('open');
      element.find('ul').slideUp(300, "swing");
    } else {
      element.addClass('open');
      element.children('ul').slideDown(300, "swing");
      element.siblings('li').children('ul').slideUp(300, "swing");
      element.siblings('li').removeClass('open');
      element.siblings('li').find('li').removeClass('open');
      element.siblings('li').find('ul').slideUp(300, "swing");
    }
  })
  // Scroll To Top 
  var scrollTop = $(".scrollToTop");
  $(window).on('scroll', function () {
    if ($(this).scrollTop() < 500) {
      scrollTop.removeClass("active");
    } else {
      scrollTop.addClass("active");
    }
  });
  //header
  var header = $("header");
  $(window).on('scroll', function () {
    if ($(this).scrollTop() < 1) {
      header.removeClass("active");
    } else {
      header.addClass("active");
    }
  });
  //Click event to scroll to top
  $('.scrollToTop').on('click', function () {
    $('html, body').animate({
      scrollTop: 0
    }, 500);
    return false;
  });
  //Header Bar
  $('.header-bar').on('click', function () {
    $(this).toggleClass('active');
    $('.menu').toggleClass('active');
    if ($('.menu').hasClass('active')) {
      $('.overlay').addClass('active');
    } else {
      $('.overlay').removeClass('active');
    }
  })

  $('.overlay').on('click', function () {
    $('.menu, .header-bar, .overlay').removeClass('active');
  })

  $('.select-bar').niceSelect();

  $('.faq__wrapper .faq__title').on('click', function (e) {
    var element = $(this).parent('.faq__item');
    if (element.hasClass('open')) {
      element.removeClass('open');
      element.find('.faq__content').removeClass('open');
      element.find('.faq__content').slideUp(200, "swing");
    } else {
      element.addClass('open');
      element.children('.faq__content').slideDown(200, "swing");
      element.siblings('.faq__item').children('.faq__content').slideUp(200, "swing");
      element.siblings('.faq__item').removeClass('open');
      element.siblings('.faq__item').find('.faq__title').removeClass('open');
      element.siblings('.faq__item').find('.faq__content').slideUp(200, "swing");
    }
  });

  $('.template-version').on('click', function(){
    if($('#version').hasClass('light-version')){
      localStorage.removeItem('light_version');
      $('.template-version .chorka').html('<i class="las la-sun"></i>');
      $('.template-version').addClass('open');
    }else{
      localStorage.setItem('light_version', true);
      $('.template-version .chorka').html('<i class="las la-moon"></i>');
      $('.template-version').removeClass('open');
    }
    setVersion();

  });

  setVersion();

  $('.card-slider').owlCarousel({
    loop:true,
    margin: 20,
    responsiveClass:true,
    dots: true,
    responsive:{
        0:{
            items:1,
        },
        400:{
            items:2,
        },
        768:{
            items:3,
        },
        992:{
            items:4,
            margin: 30,
        }
    }
  })

  $('.partner-slider').owlCarousel({
    loop: true,
    nav: false,
    dots: false,
    items: 2,
    autoplay: true,
    margin: 15,
    responsive: {
      768: {
        items: 3,
        margin: 30,
      },
      992: {
        items: 4,
      },
      1200: {
        items: 6,
      }
    }
  })

  $('.testimonial-slider').owlCarousel({
    loop: true,
    margin: 30,
    responsiveClass: true,
    nav: false,
    dots: true,
    autoplay: true,
    autoplayTimeout: 2500,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 2,
      },
      1200: {
        items: 2,
        margin: 60,
      }
    }
  });

})(jQuery);