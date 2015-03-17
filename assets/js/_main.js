/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can 
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you 
// rename this variable, you will also need to rename the namespace below.
var Roots = {
  // All pages
  common: {
    init: function() {
      // JavaScript to be fired on all pages
    }
  },
  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page
    }
  },
  // About us page, note the change from about-us to about_us.
  about_us: {
    init: function() {
      // JavaScript to be fired on the about us page
    }
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Roots;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.






jQuery( document ).ready(function( $ ) {



  $('.subnav-toggle').click(function(){
    $( this ).toggleClass('active');
    $('.sec__header').toggleClass('is_show');
    $('body').toggleClass('subnav_isactive');
  });



    $('.popup--video, .popup--youtube, .popup--vimeo, .popup--gmaps').magnificPopup({
      disableOn: 320,
      type: 'iframe',
      mainClass: 'mfp-fade',
      removalDelay: 160,
      preloader: false,

      fixedContentPos: false
    });



  var $container = $('.js-isotopegrid');
  $container.isotope({
    itemSelector: '.js-isotopeitem',
    layoutMode: 'fitRows',
    animationOptions: {
      duration: 750,
      easing: 'linear',
      queue: false
    }
  });





  $container.imagesLoaded( function() {
    $container.isotope('layout');
    $('.js-isotopegrid').addClass('is-loaded');

  });

// var $container = $('#js-isotopegrid').imagesLoaded( function() {
//   $container.isotope({
//     itemSelector: '.js-isotopeitem',
//     layoutMode: 'fitRows',
//     animationOptions: {
//       duration: 750,
//       easing: 'linear',
//       queue: false
//     }
//   });

// });

  $('.js-isotopefilter__item a').click( function(e) {
    e.preventDefault();
    $('body').removeClass('subnav_isactive');
    $('.sec__header').removeClass('is_show');

    $('.js-isotopefilter__item').removeClass('active');
    $(this).parent().addClass('active');
    var filterValue = $(this).attr('data-filter-value');
    $container.isotope({ filter: filterValue });
  });




  /******** Masterslider ******/


    $('#project__theslider').masterslider({
      width:1920,    // slider standard width
      height:1024,   // slider standard height
      space:0,
      preload:3,
      autoplay:true,
      fullwidth:true,
      autoHeight:true,
      view:"fade",
      layout:"boxed",
      controls : {
          arrows : {autohide:true},
          thumblist : {
            autohide:false,
            inset:false,
            width:160,
            height:90,
            space:20
          }
      }
    });



    $('#team__theslider').masterslider({
      width:1920,    // slider standard width
      height:1024,   // slider standard height
      space:0,
      preload:3,
      autoplay:true,
      fullwidth:true,
      autoHeight:true,
      view:"fade",
      layout:"boxed",
      controls : {
        arrows : {autohide:true},
      }
    });



  $('.fulltoggle').click( function(e) {
    e.preventDefault();
    $('.project--single').toggleClass('fullgallery--shown');
    $('#project__theslider').masterslider('setup');

    $('.page-template-template-aboutus').toggleClass('fullgallery--shown');
    $('#team__theslider').masterslider('setup');
  });
 



     $('.gallery__theslider').masterslider({
      width:1920,    // slider standard width
      height:1024,   // slider standard height
      space:0,
      preload:3,
      autoplay:true,
      fullwidth:true,
      autoHeight:true,
      view:"fade",
      layout:"boxed",
      controls : {
          arrows : {autohide:true},
          thumblist : {
            autohide:false,
            inset:false,
            width:160,
            height:90,
            space:20
          }
      }
    });







});






