'use strict';
const isMobileScreen1 = function isMobileScreen1() {
  return document.body.clientWidth <= 767;
};
const isDesktopScreen = function isDesktopScreen() {
  return document.body.clientWidth > 1024;
}; 
const isTableScreen = function isTableScreen() {
  return (document.body.clientWidth > 767 && document.body.clientWidth < 1025);
};

// $.validator.addMethod('phoneAU', function(value, element, param) {
//   return value.match(/(\d{2})(\d{3})(\d{3})/g);
// },'Please enter a valid mobile number.');
//
// $.validator.addMethod('emailExt', function(value, element, param) {
//   return value.match(/^[a-zA-Z0-9_\.%\+\-]+@[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,}$/);
// },'Please enter a valid email address.');
//

var $ = jQuery.noConflict();
const app = {

  init: function init() {
    this.sticky();
    this.slider();
    this.mainMenu();
    this.searchToggle();
    this.tabSliderContent();
    this.filterLocation();
    this.convertLanguage();
    this.showMore();
  },
 
  convertLanguage: function() {
      // Create a new div with the class 'dropdown'
    var newDropdown = $('<div class="dropdown dr"></div>');

    // Get the 'current-lang' li element
    var currentLangItem = $('.nav-language .current-lang');

    // Move the current language anchor into the new dropdown div
    newDropdown.append(currentLangItem.find('a'));

    // Wrap the newDropdown around the original ul element
    $('.nav-language').wrap(newDropdown);

    // Add the class 'dropdown-toggle' and data-bs-toggle attribute to the anchor
    $('.dr a').addClass('dropdown-toggle');

    // Create the dropdown-menu and append it after the anchor
    var dropdownMenu = $('<div class="dropdown-menu" aria-labelledby="dropdownMenuButton"></div>');
    $('.dr').append(dropdownMenu);

    // Loop through each language item and add it to the dropdown-menu
    $('.nav-language .lang-item').each(function() {
      var langItem = $(this).clone();
      console.log($(this));
      dropdownMenu.append(langItem);
    });

    // Show the original language menu on small screens
    $('.nav-language').removeClass('d-none');
  },
  filterLocation: function() {
    $( '#location' ).on( 'change', function() {
        $('.loading').show();
        var location = $(this).val();
        jQuery.ajax({
          url: ajax_object.ajax_url,
          type: "POST",
          data: {
              action: 'justread_filter_locations',
              location: location,
          },
          success: function(response) {
            $('.loading').hide();
            $( '.site-main' ).html(response.posts);
          }
      });
    } );
  },
  checkOS: function () {
    let OSName = "Unknown OS";
    if (navigator.appVersion.indexOf("Win") != -1) {
      OSName = "Windows";
      console.log('Your OS: ' + OSName);
      $('body').addClass('windows-ios');
    }
    ;
    if (navigator.appVersion.indexOf("Mac") != -1) {
      OSName = "MacOS";
      console.log('Your OS: ' + OSName);
      $('body').addClass('mac-ios');
    }
  },
 
  // playVideo: function () {
  //   $('.video-box').each(function (index) {
  //     const url = $(this).attr('data-video');
  //     const options = {
  //       url: url,
  //       width: 1024,
  //       loop: false
  //     };
  //     const player = new Vimeo.Player($(this), options);
  //     player.setVolume(0.4);

  //     $(this).find('.play').on('click', () => {
  //       $(this).addClass('start-playing');
  //       player.play();
  //     });
  //     player.on('play', () => {
  //       $(this).removeClass('start-playing');
  //       $(this).addClass('playing');
  //     });
  //   });
  // },
  searchToggle: function () {
    $('.search-btn').on('click', function (e) {
      e.preventDefault();
      $('html').toggleClass('open-search');
      setTimeout(function () {
        $('.form-search__input').focus();
      }, 100)
    });
    $('.btn-close-search').on('click', function (e) {
      e.preventDefault();
      $('html').removeClass('open-search');
      
    });
  },
  mainMenu: function () {
    $('#menu-top-menu .dropdown-menu ').each(function() {
      if($(this).children().length > 5) {
        $(this).addClass('dropdown-menu-2-column')
      }
    })
    $('.navbar-close,.overlay').on('click', function () {
      $('html').removeClass('open-menu').removeClass('open-search')
    });
    $('.navbar-toggler').on('click', function () {
      $('html').toggleClass('open-menu').removeClass('open-search')
    });
    if(!isDesktopScreen()) {
      $('.menu-item-has-children > .icon-angle-down').on('click',function(e){
        e.preventDefault();
        var subMenu = $(this).closest('.menu-item-has-children').find('.dropdown-menu');
        var item = $(this).parent();
        $('.menu-item-has-children').removeClass('active-menu');
       
        if(subMenu.is(':visible')) {
          subMenu.hide();
        } else {
          $('.menu-item-has-children .dropdown-menu').hide();
          item.addClass('active-menu')
          subMenu.show();
        }
        return false;
    });
    }
    // $('.overlay').on('click',function(){
    //   $('html').removeClass('open-menu')
    // })
  },
  tabSliderContent: function () {
    $('.btn-next,.btn-next-1').on('click',function(e){
      e.preventDefault();
      var element= $(this).closest('section').next();
      var header = $('.app-header').height()
      $('html, body').animate({
        scrollTop:element.offset().top - header
    }, 500);
    })
   
  },

  slider: function () {
    $('.hero__slider').slick({
      speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      rows: false,
      swipeToSlide: true,
      autoplay: true,
      fade: true,
      focusOnSelect: true,
      pauseOnHover:false,
      dots: false,
      autoplaySpeed: 1000,
    });
    $('.image-slider').slick({
      speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      rows: false,
      swipeToSlide: true,
      autoplay: true,
      fade: true,
      focusOnSelect: true,
      pauseOnHover:false,
      dots: false,
      autoplaySpeed: 1500,
    });
    $('.cards-slider-mobile').slick({
      speed: 500,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      rows: false,
      swipeToSlide: true,
      autoplay: true,
      focusOnSelect: true,
      pauseOnHover:false,
      dots: true,
      autoplaySpeed: 1000,
    });
    
    $('.card-sliders').slick({
      speed: 800,
      slidesToShow: 4,
      slidesToScroll: 4,
      arrows: false,
      rows: false,
      swipeToSlide: true,
      autoplay: true,
      dots: true,
      autoplaySpeed: 5000,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            arrows: false,
            dots: true,
            slidesToShow: 2,
            slidesToScroll: 2,
          } 
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: true,
          } 
        },
      ],
    });
    $('.sliders-people').slick({
      speed: 800,
      slidesToShow: 4,
      slidesToScroll: 4,
      arrows: true,
      rows: false,
      swipeToSlide: true,
      autoplay: true,
      infinite: false,
      dots: false,
      autoplaySpeed: 5000,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            arrows: false,
            dots: true,
            slidesToShow: 2,
            slidesToScroll: 2,
          } 
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            dots: true,
          } 
        },
      ],
    });

    $('.testimonials').slick({
      speed: 800,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: true,
      rows: false,
      swipeToSlide: true,
      autoplay: true,
      dots: false,
      autoplaySpeed: 5000,
    });

    
    $('.list-video').slick({
      speed: 800,
      slidesToShow: 4,
      slidesToScroll: 1,
      arrows: true,
      rows: false,
      swipeToSlide: true,
      autoplay: true,
      dots: false,
      autoplaySpeed: 5000,
      responsive: [
        {
          breakpoint: 992,
          settings: {
            arrows: false,
            dots: true,
            slidesToShow: 2,
            slidesToScroll: 2,
          } 
        },
        {
          breakpoint: 767,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
          } 
        },
      ],
    });
    if(isMobileScreen1()) {
      $('.list-video').slick('unslick')
    }
    
    
  },
  
  equalHeightByRow: function (obj, notRunMobile) {
    let widthTarget = 0;
    if ($(obj).length) {
      $(obj).height('auto');
      widthTarget = notRunMobile === true ? 768 : 0;
      if ($(window).width() >= widthTarget) {
        var currentTallest = 0,
            currentRowStart = 0,
            rowDivs = [],
            currentDiv = 0,
            $el,
            topPosition = 0;
        $(obj).each(function () {
          if ($(this).is(':visible') === true) {
            $el = $(this);
            topPosition = $el.offset().top;
            if (currentRowStart !== topPosition) {
              for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
                rowDivs[currentDiv].innerHeight(currentTallest);
              }
              rowDivs = [];
              currentRowStart = topPosition;
              currentTallest = $el.innerHeight();
              rowDivs.push($el);
            } else {
              rowDivs.push($el);
              currentTallest = currentTallest < $el.innerHeight() ? $el.innerHeight() : currentTallest;
            }
            for (currentDiv = 0; currentDiv < rowDivs.length; currentDiv++) {
              rowDivs[currentDiv].innerHeight(currentTallest);
            }
          }
        });
      }
    }
  },
  showMore:function(){
    
    // $(".list-cards .col-md-6:gt(7)").addClass("d-none");
    $(".latest-cards .read-more").on('click',function(e){
      e.preventDefault();
      $(this).addClass('d-none');
      $(this).closest('.latest-cards').find('.col-md-6.d-none').removeClass('d-none')
    });
   
  },  
 
  sticky: function () {
    const sticky = $('.app-header'),
        scroll = $(window).scrollTop();

    if (scroll >= 10) sticky.addClass('sticky');
    else sticky.removeClass('sticky');
  },
};

$(document).ready(function () {
  new WOW().init();
  // $('[data-fancybox="gallery"]').fancybox({
  // });


  
  app.init();
  $(window).scroll(function () {
    app.sticky();
  });

  $(window).on("resize", function () {
  }).resize();
});




"use strict"

document.addEventListener("DOMContentLoaded", function() {
  // You can change this class to specify which elements are going to behave as counters.
  var elements = document.querySelectorAll(".scroll-counter")

  elements.forEach(function(item) {
    // Add new attributes to the elements with the '.scroll-counter' HTML class
    item.counterAlreadyFired = false
    item.counterSpeed = item.getAttribute("data-counter-time") / 45
    item.counterTarget = +item.innerText
    item.counterCount = 0
    item.counterStep = item.counterTarget / item.counterSpeed

    item.updateCounter = function() {
      item.counterCount = item.counterCount + item.counterStep
      item.innerText = Math.ceil(item.counterCount)

      if (item.counterCount < item.counterTarget) {
        setTimeout(item.updateCounter, item.counterSpeed)
      } else {
        item.innerText = item.counterTarget
      }
    }
  })

  // Function to determine if an element is visible in the web page
  var isElementVisible = function isElementVisible(el) {
    var scroll = window.scrollY || window.pageYOffset
    var boundsTop = el.getBoundingClientRect().top + scroll
    var viewport = {
      top: scroll,
      bottom: scroll + window.innerHeight,
    }
    var bounds = {
      top: boundsTop,
      bottom: boundsTop + el.clientHeight,
    }
    return (
      (bounds.bottom >= viewport.top && bounds.bottom <= viewport.bottom) ||
      (bounds.top <= viewport.bottom && bounds.top >= viewport.top)
    )
  }

  // Funciton that will get fired uppon scrolling
  var handleScroll = function handleScroll() {
    elements.forEach(function(item, id) {
      if (true === item.counterAlreadyFired) return
      if (!isElementVisible(item)) return
      item.updateCounter()
      item.counterAlreadyFired = true
    })
  }

  // Fire the function on scroll
  window.addEventListener("scroll", handleScroll)
})