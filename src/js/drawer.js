'use strict';

import $ from 'jquery';

export default class Drawer {
  constructor() {
    this.width  = $(window).width();
    this.drawer = $('#drawer-nav');
    this.btns   = $('[aria-control="drawer-nav"]');

    this.setListener();
  }

  setListener() {
    this.btns.each((i, e) => {
      const btn = $(e);

      btn.on('click', (event) => {
        event.preventDefault();
        this.toggle(btn);
        event.stopPropagation();
      });

      $(window).resize(() => {
        if ($(window).width() !== this.width) {
          this.close(btn);
          this.width = $(window).width();
        }
      });
    });
  }

  toggle(btn) {
    if ('false' === btn.attr('aria-expanded')) {
      this.open(btn);
    } else {
      this.close(btn);
    }
  }

  open(btn) {
    btn.attr('aria-expanded', true);
    this.drawer.attr('aria-hidden', false);
  }

  close(btn) {
    btn.attr('aria-expanded', false);
    this.drawer.attr('aria-hidden', true);
  }
}
