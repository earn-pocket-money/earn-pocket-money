(function ($) {
'use strict';

$ = 'default' in $ ? $['default'] : $;

var _typeof = typeof Symbol === "function" && typeof Symbol.iterator === "symbol" ? function (obj) {
  return typeof obj;
} : function (obj) {
  return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj;
};











var classCallCheck = function (instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
};

var createClass = function () {
  function defineProperties(target, props) {
    for (var i = 0; i < props.length; i++) {
      var descriptor = props[i];
      descriptor.enumerable = descriptor.enumerable || false;
      descriptor.configurable = true;
      if ("value" in descriptor) descriptor.writable = true;
      Object.defineProperty(target, descriptor.key, descriptor);
    }
  }

  return function (Constructor, protoProps, staticProps) {
    if (protoProps) defineProperties(Constructor.prototype, protoProps);
    if (staticProps) defineProperties(Constructor, staticProps);
    return Constructor;
  };
}();

var SmoothScroll = function () {
  function SmoothScroll(target) {
    var params = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : {};
    classCallCheck(this, SmoothScroll);

    this.target = target;

    var defaults$$1 = {
      duration: 1000,
      easing: 'easeOutQuint',
      offset: 0,
      hash: true
    };
    this.params = $.extend(defaults$$1, params);
  }

  createClass(SmoothScroll, [{
    key: '_getTargetBody',
    value: function _getTargetBody() {
      var wst = $(window).scrollTop();
      if (0 === wst) {
        $(window).scrollTop(wst + 1);
      }

      if (0 < $('html').scrollTop()) {
        return $('html');
      } else if (0 < $('body').scrollTop()) {
        return $('body');
      }
    }
  }, {
    key: '_scroll',
    value: function _scroll(event, body) {
      var _this = this;

      var targetHash = event.currentTarget.hash.split('%').join('\\%').split('(').join('\\(').split(')').join('\\)');
      var offset = $(targetHash).eq(0).offset();

      if (!targetHash || !offset) {
        return;
      }

      body.animate({
        scrollTop: offset.top - this.params.offset
      }, this.params.duration, this.params.easing, function () {
        if (true === _this.params.hash) {
          window.history.pushState('', '', targetHash);
        }
      });
    }
  }, {
    key: '_disableMouseWheel',
    value: function _disableMouseWheel(body) {
      if (window.addEventListener) {
        window.addEventListener('DOMMouseScroll', function () {
          body.stop(true);
        }, false);
      }
      window.onmousewheel = document.onmousewheel = function () {
        body.stop(true);
      };
    }
  }, {
    key: 'off',
    value: function off() {
      this.target.unbind('click.SmoothScroll');
    }
  }, {
    key: 'on',
    value: function on() {
      var _this2 = this;

      $(this.target).each(function (i, e) {
        $(e).on('click.SmoothScroll', function (event) {
          event.preventDefault();

          var body = _this2._getTargetBody();
          if (!body) {
            return;
          }

          _this2._scroll(event, body);
          _this2._disableMouseWheel(body);
        });
      });
    }
  }]);
  return SmoothScroll;
}();

/**
 * Name: jquery.smoothscroll
 * Author: Takashi Kitajima (inc2734)
 * Author URI: https://2inc.org
 * License: MIT
 *
 * easing: http://gsgd.co.uk/sandbox/jquery/easing/
 * @param { duration, easing, offset, hash)
 */

(function ($$$1) {
  var methods = {
    init: function init(params) {
      var _SmoothScroll = new SmoothScroll(this, params);
      _SmoothScroll.on();
      return this;
    },

    off: function off() {
      var _SmoothScroll = new SmoothScroll(this);
      _SmoothScroll.off();
      return this;
    }
  };

  $$$1.fn.SmoothScroll = function (method) {
    if (methods[method]) {
      return methods[method].apply(this, Array.prototype.slice.call(arguments, 1));
    } else if ((typeof method === 'undefined' ? 'undefined' : _typeof(method)) === 'object' || !method) {
      return methods.init.apply(this, arguments);
    } else {
      $$$1.error('Method ' + method + ' does not exist');
    }
  };
})(jQuery);

}(jQuery));
