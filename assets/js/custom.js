$(document).ready(function () {
  "use strict";
  // Aos animation

  $(function($) {
      $(window).on('scroll', function() {
      if ($(this).scrollTop() >= 100) {
        $('.header').addClass('header-active');
      } else {
        $('.header').removeClass('header-active');
      }
    });
  });

  $("#customers-testimonials").owlCarousel({
    loop: true,
    center: true,
    items: 3,
    margin: 0,
    autoplay: true,
    nav: true,
    dots: false,
    autoplayTimeout: 8500,
    smartSpeed: 450,
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 2,
      },
      1170: {
        items: 3,
      },
    },
  });

  $("#help-slider").owlCarousel({
    loop: true,
    items: 2,
    margin: 0,
    autoplay: true,
    nav: true,
    dots: false,
    autoplayTimeout: 8500,
    responsive: {
      0: {
        items: 1,
      },
      768: {
        items: 2,
      },
      1170: {
        items: 2,
      },
    },
  });

  $(".case-studies-slide").owlCarousel({
    loop: true,
    nav: false,
    dots: false,
    margin: 10,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: true,
      },
      600: {
        items: 1,
        nav: false,
      },
      1000: {
        items: 1,
        nav: true,
        loop: false,
      },
    },
  });

  $(".swo-slider").owlCarousel({
    loop: true,
    nav: true,
    dots: false,
    margin: 10,
    responsiveClass: true,
    responsive: {
      0: {
        items: 1,
        nav: false,
        dots: true,
      },
      600: {
        items: 3,
        nav: false,
        dots: true,
      },
      1025: {
        items: 4,
        nav: true,
        loop: false,
      },
    },
  });

  $(".asstests").owlCarousel({
    loop: false,
    nav: true,
    margin: 25,
    dots: false,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      960: {
        items: 4,
      },
      1200: {
        items: 4,
        nav: false,
      },
    },
  });

  $(".press-and-news-sec").owlCarousel({
    loop: false,
    nav: true,
    margin: 25,
    dots: false,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      960: {
        items: 5,
      },
      1200: {
        items: 5,
      },
    },
  });

  // Top clients carousel
  $(".top-client-bar").owlCarousel({
    loop: true,
    nav: false,
    autoplay: true,
    margin: 25,
    dots: false,
    responsive: {
      0: {
        items: 3,
      },
      600: {
        items: 3,
      },
      960: {
        items: 6,
      },
      1200: {
        items: 6,
      },
    },
  });

   // TTE clients carousel
   $("#tte-clients").owlCarousel({
    loop: true,
    nav: false,
    autoplay: true,
    margin: 25,
    dots: false,
    responsive: {
      0: {
        items: 2,
      },
      600: {
        items: 2,
      },
      960: {
        items: 3,
      },
      1200: {
        items: 4,
      },
    },
  });

  $(".client-testim").owlCarousel({
    loop: false,
    nav: true,
    margin: 25,
    dots: false,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      960: {
        items: 4,
      },
      1200: {
        items: 5,
      },
    },
  });

  if($(window).width()> 992){
    $(".process-box__list-item").hover(
      function () {
        $(this).addClass("active");
      },
      function () {
        $(this).removeClass("active");
      }
    );
  }
  else{
    $(".process-box__list-item").addClass("active");
  }


  $(function () {
    var t;
    if ((t = $(".process-box")).length)
      return t.each(function () {
        var t, e;
        return (
          (e = $(this)),
          (t = e.find(".process-box__list-item")).on("mouseover", function (e) {
            if (!$(this).is(".active"))
              return t.removeClass("active"), $(this).addClass("active");
          })
        );
      });
  });

  // new scroll
  //Create new scrollmagic controller
  if($(window).width() > 991){
    var controller = new ScrollMagic.Controller();

  //Create horizontal scroll slide gsap function
  var horizontalSlide = new TimelineMax().to(".horizontal-scroll", 30, {
    x: "-100%",
  }); //Depends on the final width you want to scroll.

  // Create scrollmagic scene to pin and link horzontal scroll animation
  new ScrollMagic.Scene({
    triggerElement: ".connected-clients-sec", //Div that will trigger the animation.
    triggerHook: "onLeave", //The animation will start on leaving the .promote-right-assets section.
    duration: "100%", //Scroll Duration, the amount of pixels you want to scroll to see the entire animation.
  })
    .setPin(".connected-clients-sec")
    .setTween(horizontalSlide)
    //.addIndicators({ name: 'hello world' }) // add indicators (requires scrollmagic indicators plugin)
    .addTo(controller);

  new ScrollMagic.Scene({
    triggerElement: ".hs-c", //Div that will trigger the animation.
    duration: 500,
    offset: 100,
  })
    .setTween(
      TweenMax.to(".item1", 0.5, { rotation: 5, ease: Power3.easeNone })
    )
    .addTo(controller);

  new ScrollMagic.Scene({
    triggerElement: ".hs-c", //Div that will trigger the animation.
    duration: 500,
    offset: 200,
  })
    .setTween(
      TweenMax.to(".item2", 1, { rotation: -10, ease: Power3.easeNone })
    )
    .addTo(controller);

  new ScrollMagic.Scene({
    triggerElement: ".hs-c", //Div that will trigger the animation.
    duration: 500,
    offset: 300,
  })
    .setTween(
      TweenMax.to(".item3", 1.5, { rotation: 5, ease: Power3.easeNone })
    )
    .addTo(controller);

  new ScrollMagic.Scene({
    triggerElement: ".hs-c", //Div that will trigger the animation.
    duration: 500,
    offset: 400,
  })
    .setTween(TweenMax.to(".item4", 2, { rotation: -5, ease: Power3.easeNone }))
    .addTo(controller);

  new ScrollMagic.Scene({
    triggerElement: ".hs-c", //Div that will trigger the animation.
    duration: 500,
    offset: 500,
  })
    .setTween(
      TweenMax.to(".item5", 2.5, { rotation: 8, ease: Power3.easeNone })
    )
    .addTo(controller);

  new ScrollMagic.Scene({
    triggerElement: ".hs-c", //Div that will trigger the animation.
    duration: 500,
    offset: 500,
  })
    .setTween(
      TweenMax.to(".item6", 0.5, { rotation: -5, ease: Power3.easeNone })
    )
    .addTo(controller);

  new ScrollMagic.Scene({
    triggerElement: ".hs-c", //Div that will trigger the animation.
    duration: 500,
    offset: 500,
  })
    .setTween(
      TweenMax.to(".item7", 0.5, { rotation: 8, ease: Power3.easeNone })
    )
    .addTo(controller);
  }
  

  $("#cs-studies").waypoint(function () {
    $(function () {
      $(".c1").easyPieChart({
        size: 100,
        barColor: "#17d3e6",
        scaleLength: 0,
        lineWidth: 8,
        trackColor: "#e6e2e7",
        lineCap: "circle",
        animate: 2000,
      });
      $(".c2").easyPieChart({
        size: 100,
        barColor: "#ffbd4a",
        scaleLength: 0,
        lineWidth: 8,
        trackColor: "#e6e2e7",
        lineCap: "circle",
        animate: 2000,
      });
      $(".c3").easyPieChart({
        size: 100,
        barColor: "#33d3eb",
        scaleLength: 0,
        lineWidth: 8,
        trackColor: "#e6e2e7",
        lineCap: "circle",
        animate: 2000,
      });
    });
  });

  //initialization of text animation (typing)
  $(".count").counterUp({
    delay: 10,
    time: 2000,
  });

  //custom accordian js
  $('.accordion-header').click(function () {
    $(this).parent('.accordion-slides-item').find('.accordion-content').toggleClass('padBottom');
    var content = $(this).parent('.accordion-slides-item').find('.accordion-content'),
      curHeight = content.height(),
      autoHeight = content.css('height', 'auto').height();

    if (!$(this).hasClass('active')) {
      $(this).children('span').addClass('rotate');
      content.height(curHeight).animate({ height: autoHeight }, 500);
      $(this).addClass('active');
      $(this).parent('.accordion-slides-item').find('.accordion-image').addClass('show');
    } else {
      $(this).children('span').removeClass('rotate');
      content.height(curHeight).animate({ height: '0px' }, 500);
      $(this).removeClass('active');
      $(this).parent('.accordion-slides-item').find('.accordion-image').removeClass('show');
    }
  });

  if ($('.js-text-animation').length) {
    var typed = new Typed(".js-text-animation", {
      strings: ["Product Pages", "Solution Pages", "Blog Hub", "Glossary Hub", "Guide Hub", "Research & Reports", "Webinar Content", "EBooks Content", "Videos Gallery", "Discuss & Learn Pages", "Images & Infographics", "Reviews & Testimonials"],
      typeSpeed: 120,
      loop: true,
      backSpeed: 25,
      backDelay: 1000,
      showCursor: false,
    });
  }

  $(window).on('resize scroll', function () {
    $('.color').each(function () {
      var activeColor = $(this).attr('id');
      if ($(this).isInViewport()) {
        $('#fixed-' + activeColor).addClass(activeColor + '-active');
      } else {
        $('#fixed-' + activeColor).removeClass(activeColor + '-active');
      }
    });
  });

  $('.modal-header .close').click(function(){
      $('.menu-overlay').removeClass('active');
      $('.menu').removeClass('active');
  })


});
