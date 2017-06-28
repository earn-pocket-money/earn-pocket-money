'use strict';

import $ from 'jquery';

import Drawer from './drawer.js';
new Drawer();

$(() => {
  $('.p-main-visual').slick({
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true,
    fade: true,
    dots: true
  });
});

$(() => {
  $('.c-pagetop a[href^="#"]').SmoothScroll({
    duration: 1000,
    easing  : 'easeOutQuint'
  });
});

$(() => {
  $(window).scroll(() => {
    const scroll = $(window).scrollTop();
    if (100 > scroll) {
      $('.c-pagetop').attr('aria-hidden', 'true');
    } else {
      $('.c-pagetop').attr('aria-hidden', 'false');
    }
  });
});
