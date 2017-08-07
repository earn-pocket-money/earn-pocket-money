import $ from 'jquery';

export default class SmoothScroll {
  constructor(target, params = {}) {
    this.target = target;

    const defaults = {
      duration: 1000,
      easing  : 'easeOutQuint',
      offset  : 0,
      hash    : true
    };
    this.params = $.extend(defaults, params);
  }

  _getTargetBody() {
    const wst = $(window).scrollTop();
    if (0 === wst) {
      $(window).scrollTop(wst + 1);
    }

    if (0 < $('html').scrollTop()) {
      return $('html');
    } else if (0 < $('body').scrollTop()) {
      return $('body');
    }
  }

  _scroll(event, body) {
    const targetHash = event.currentTarget.hash.split('%').join('\\%').split('(').join('\\(').split(')').join('\\)');
    const offset     = $(targetHash).eq(0).offset();

    if (! targetHash || ! offset) {
      return;
    }

    body.animate(
      {
        scrollTop: offset.top - this.params.offset
      },
      this.params.duration,
      this.params.easing,
      () => {
        if (true === this.params.hash) {
          window.history.pushState('', '', targetHash);
        }
      }
    );
  }

  _disableMouseWheel(body) {
    if (window.addEventListener) {
      window.addEventListener('DOMMouseScroll', () => {
        body.stop(true);
      }, false);
    }
    window.onmousewheel = document.onmousewheel = function() {
      body.stop(true);
    };
  }

  off() {
    this.target.unbind('click.SmoothScroll');
  }

  on() {
    $(this.target).each((i, e) => {
      $(e).on('click.SmoothScroll', (event) => {
        event.preventDefault();

        const body = this._getTargetBody();
        if (! body) {
          return;
        }

        this._scroll(event, body);
        this._disableMouseWheel(body);
      });
    });
  }
}
