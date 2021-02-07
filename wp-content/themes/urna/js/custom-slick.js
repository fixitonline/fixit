'use strict';

class Carousel {
  CarouselSlick() {
    var _this = this;

    $(".owl-carousel[data-carousel=owl]:visible").each(function () {
      let _this2 = $(this);

      if (!_this2.hasClass("slick-initialized")) {
        _this2.slick(_this._getSlickConfigOption(this));
      }

      if (_this2.hasClass('instagram-feed') && _this2.hasClass("slick-initialized")) {
        _this2.slick('unslick');

        _this2.slick(_this._getSlickConfigOption(this));
      }
    });
  }

  _getSlickConfigOption($el) {
    var slidesToShow = $($el).data('items'),
        rows = $($el).data('rows') ? parseInt($($el).data('rows')) : 1,
        desktop = $($el).data('desktopslick') ? $($el).data('desktopslick') : slidesToShow,
        desktopsmall = $($el).data('desktopsmallslick') ? $($el).data('desktopsmallslick') : slidesToShow,
        tablet = $($el).data('tabletslick') ? $($el).data('tabletslick') : slidesToShow,
        landscape = $($el).data('landscapeslick') ? $($el).data('landscapeslick') : 2,
        mobile = $($el).data('mobileslick') ? $($el).data('mobileslick') : 2;
    let pagination = slidesToShow < $($el).find('.item').length ? $($el).data('pagination') : false,
        nav = slidesToShow < $($el).find('.item').length ? $($el).data('nav') : false,
        loop = slidesToShow < $($el).find('.item').length ? $($el).data('loop') : false,
        auto = slidesToShow < $($el).find('.item').length ? $($el).data('auto') : false;
    var _config = {};
    _config.dots = pagination;
    _config.arrows = nav;
    _config.infinite = loop;
    _config.speed = 1000;
    _config.autoplay = auto;
    _config.autoplaySpeed = $($el).data('autospeed') ? $($el).data('autospeed') : 2000;
    _config.cssEase = 'ease';
    _config.slidesToShow = slidesToShow;
    _config.slidesToScroll = slidesToShow;
    _config.mobileFirst = true;
    _config.vertical = false;
    _config.prevArrow = '<button type="button" class="slick-prev"><i class="icon-arrow-left icons"></i></button>';
    _config.nextArrow = '<button type="button" class="slick-next"><i class="icon-arrow-right icons"></i></button>';
    _config.rtl = $('html').attr('dir') == 'rtl';

    if (rows > 1) {
      _config.slidesToShow = 1;
      _config.slidesToScroll = 1;
      _config.rows = rows;
      _config.slidesPerRow = slidesToShow;
      var settingsFull = {
        slidesPerRow: slidesToShow
      },
          settingsDesktop = {
        slidesPerRow: desktop
      },
          settingsDesktopsmall = {
        slidesPerRow: desktopsmall
      },
          settingsTablet = {
        slidesPerRow: tablet
      },
          settingsLandscape = $($el).data('unslick') ? "unslick" : {
        slidesPerRow: landscape
      },
          settingsMobile = $($el).data('unslick') ? "unslick" : {
        slidesPerRow: mobile
      };
    } else {
      var settingsFull = {
        slidesToShow: slidesToShow,
        slidesToScroll: slidesToShow
      },
          settingsDesktop = {
        slidesToShow: desktop,
        slidesToScroll: desktop
      },
          settingsDesktopsmall = {
        slidesToShow: desktopsmall,
        slidesToScroll: desktopsmall
      },
          settingsTablet = {
        slidesToShow: tablet,
        slidesToScroll: tablet
      },
          settingsLandscape = $($el).data('unslick') ? "unslick" : {
        slidesToShow: landscape,
        slidesToScroll: landscape
      },
          settingsMobile = $($el).data('unslick') ? "unslick" : {
        slidesToShow: mobile,
        slidesToScroll: mobile
      };
    }

    var settingsArrows = $($el).data('nav') ? {
      arrows: false,
      dots: true
    } : '';
    settingsLandscape = $($el).data('unslick') ? settingsLandscape : $.extend(true, settingsLandscape, settingsArrows);
    settingsMobile = $($el).data('unslick') ? settingsMobile : $.extend(true, settingsMobile, settingsArrows);
    _config.responsive = [{
      breakpoint: 1600,
      settings: settingsFull
    }, {
      breakpoint: 1199,
      settings: settingsDesktop
    }, {
      breakpoint: 991,
      settings: settingsDesktopsmall
    }, {
      breakpoint: 767,
      settings: settingsTablet
    }, {
      breakpoint: 479,
      settings: settingsLandscape
    }, {
      breakpoint: 0,
      settings: settingsMobile
    }];
    return _config;
  }

  getSlickTabs() {
    var _this = this;

    $('ul.nav-tabs li a').on('shown.bs.tab', event => {
      let carouselItemTab = $($(event.target).attr("href")).find(".owl-carousel[data-carousel=owl]:visible");
      let carouselItemDestroy = $($(event.relatedTarget).attr("href")).find(".owl-carousel[data-carousel=owl]");

      if (carouselItemDestroy.hasClass("slick-initialized")) {
        carouselItemDestroy.slick('unslick');
      }

      if (!carouselItemTab.hasClass("slick-initialized")) {
        carouselItemTab.slick(_this._getSlickConfigOption(carouselItemTab));
      }
    });
  }

}

class Slider {
  tbaySlickSlider() {
    $('.style-horizontal, .style-vertical, .style-full').find('.flex-control-thumbs').each(function () {
      if ($(this).children().length == 0) {
        return;
      }

      var _config = {};
      _config.vertical = $(this).parents(".style-horizontal, .style-full").length < 1;
      _config.slidesToShow = $(this).parent('.woocommerce-product-gallery').data('columns');
      _config.infinite = false;
      _config.focusOnSelect = true;
      _config.settings = "unslick";
      _config.prevArrow = '<span class="owl-prev"></span>';
      _config.nextArrow = '<span class="owl-next"></span>';
      _config.rtl = $('body').hasClass('rtl');
      _config.responsive = [{
        breakpoint: 1025,
        settings: {
          vertical: false,
          slidesToShow: 4
        }
      }];
      $(this).slick(_config);
    });
  }

}

class Layout {
  tbaySlickLayoutSlide() {
    if ($('.tbay-slider-for').length > 0) {
      var _configfor = {};
      var _confignav = {};
      _configfor.rtl = _confignav.rtl = $('body').hasClass('rtl');
      _configfor.slidesToShow = 1;
      var number_table = 1;

      if ($('.tbay-slider-for').data('number') > 0) {
        _configfor.slidesToShow = $('.tbay-slider-for').data('number');
        number_table = $('.tbay-slider-for').data('number') - 1;
      }

      _configfor.arrows = true;
      _configfor.infinite = true;
      _configfor.slidesToScroll = 1;
      _configfor.prevArrow = '<span class="slick-prev"><i class="icon-arrow-left icons"></i></span>';
      _configfor.nextArrow = '<span class="slick-next"><i class="icon-arrow-right icons"></i></span>';
      _configfor.responsive = [{
        breakpoint: 1025,
        settings: {
          vertical: false,
          slidesToShow: number_table
        }
      }, {
        breakpoint: 480,
        settings: {
          vertical: false,
          slidesToShow: 1
        }
      }];
      $('.tbay-slider-for').slick(_configfor);

      if ($('.single-product .tbay-slider-for .slick-slide').length) {
        $('.single-product .tbay-slider-for .slick-track').addClass('woocommerce-product-gallery__image single-product-main-image');
      }
    }
  }

}

class Slider_gallery {
  tbay_slider_gallery() {
    var _config = {};
    _config.slidesToShow = 1;
    _config.slidesToScroll = 1;
    _config.prevArrow = '<button type="button" class="slick-prev"><i class="linear-icon-chevron-left"></i></button>';
    _config.nextArrow = '<button type="button" class="slick-next"><i class="linear-icon-chevron-right"></i></button>';
    this.tbay_slider_gallery_hover(_config);
    $(document.body).on('urna_lazyload_image', () => {
      this.tbay_slider_gallery_hover(_config);
    });
    $(document.body).on('urna_gallery_resize', () => {
      $('.tbay-product-slider-gallery').each(function (index, value) {
        if ($(this).hasClass("slick-initialized")) {
          $(this).slick('unslick');
          $(this).removeAttr('style');
        }
      });
    });
  }

  tbay_slider_gallery_hover(_config) {
    $('.has-slider-gallery').find('.product-image').hover(function (e) {
      let _this = $(e.currentTarget);

      if (!_this.next('.tbay-product-slider-gallery').hasClass("slick-initialized")) {
        _this.next('.tbay-product-slider-gallery').css('height', _this.parent().outerHeight());

        _this.next('.tbay-product-slider-gallery').slick(_config);
      }
    });
  }

}

(function ($, sr) {
  var debounce = function (func, threshold, execAsap) {
    var timeout;
    return function debounced() {
      var obj = this,
          args = arguments;

      function delayed() {
        if (!execAsap) func.apply(obj, args);
        timeout = null;
      }
      if (timeout) clearTimeout(timeout);else if (execAsap) func.apply(obj, args);
      timeout = setTimeout(delayed, threshold || 100);
    };
  };

  jQuery.fn[sr] = function (fn) {
    return fn ? this.bind('resize', debounce(fn)) : this.trigger(sr);
  };
})(jQuery, 'smartresizefunc');

$(document).ready(function () {
  var carousel = new Carousel();
  var slider = new Slider();
  var layout = new Layout();
  var slider_gallery = new Slider_gallery();
  carousel.CarouselSlick();
  carousel.getSlickTabs();
  slider.tbaySlickSlider();
  layout.tbaySlickLayoutSlide();
  slider_gallery.tbay_slider_gallery();
  $(window).smartresizefunc(function () {
    if ($(window).width() >= 767) {
      try {
        carousel.CarouselSlick();
        slider.tbaySlickSlider();
        slider_gallery.tbay_slider_gallery();
      } catch (err) {}
    }
  });
});
$(window).on('load', function () {
  jQuery(document.body).on('urna_instagramfeed_slick', () => {
    var carousel = new Carousel();
    carousel.CarouselSlick();
  });
});
