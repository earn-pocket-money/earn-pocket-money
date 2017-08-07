(function e(t,n,r){function s(o,u){if(!n[o]){if(!t[o]){var a=typeof require=="function"&&require;if(!u&&a)return a(o,!0);if(i)return i(o,!0);var f=new Error("Cannot find module '"+o+"'");throw f.code="MODULE_NOT_FOUND",f}var l=n[o]={exports:{}};t[o][0].call(l.exports,function(e){var n=t[o][1][e];return s(n?n:e)},l,l.exports,e,t,n,r)}return n[o].exports}var i=typeof require=="function"&&require;for(var o=0;o<r.length;o++)s(r[o]);return s})({1:[function(require,module,exports){
(function (global){
'use strict';

var _jquery = typeof window !== "undefined" ? window['jQuery'] : typeof global !== "undefined" ? global['jQuery'] : null;

var _jquery2 = _interopRequireDefault(_jquery);

var _drawer = require('./drawer.js');

var _drawer2 = _interopRequireDefault(_drawer);

function _interopRequireDefault(obj) {
  return obj && obj.__esModule ? obj : { default: obj };
}

new _drawer2.default();

(0, _jquery2.default)(function () {
  (0, _jquery2.default)('.p-main-visual').slick({
    speed: 300,
    slidesToShow: 1,
    adaptiveHeight: true,
    fade: true,
    dots: true
  });
});

(0, _jquery2.default)(function () {
  (0, _jquery2.default)('.c-pagetop a[href^="#"]').SmoothScroll({
    duration: 1000,
    easing: 'easeOutQuint'
  });
});

(0, _jquery2.default)(function () {
  (0, _jquery2.default)(window).scroll(function () {
    var scroll = (0, _jquery2.default)(window).scrollTop();
    if (100 > scroll) {
      (0, _jquery2.default)('.c-pagetop').attr('aria-hidden', 'true');
    } else {
      (0, _jquery2.default)('.c-pagetop').attr('aria-hidden', 'false');
    }
  });
});

}).call(this,typeof global !== "undefined" ? global : typeof self !== "undefined" ? self : typeof window !== "undefined" ? window : {})
},{"./drawer.js":2}],2:[function(require,module,exports){
(function (global){
'use strict';

Object.defineProperty(exports, "__esModule", {
  value: true
});

var _createClass = function () {
  function defineProperties(target, props) {
    for (var i = 0; i < props.length; i++) {
      var descriptor = props[i];descriptor.enumerable = descriptor.enumerable || false;descriptor.configurable = true;if ("value" in descriptor) descriptor.writable = true;Object.defineProperty(target, descriptor.key, descriptor);
    }
  }return function (Constructor, protoProps, staticProps) {
    if (protoProps) defineProperties(Constructor.prototype, protoProps);if (staticProps) defineProperties(Constructor, staticProps);return Constructor;
  };
}();

var _jquery = typeof window !== "undefined" ? window['jQuery'] : typeof global !== "undefined" ? global['jQuery'] : null;

var _jquery2 = _interopRequireDefault(_jquery);

function _interopRequireDefault(obj) {
  return obj && obj.__esModule ? obj : { default: obj };
}

function _classCallCheck(instance, Constructor) {
  if (!(instance instanceof Constructor)) {
    throw new TypeError("Cannot call a class as a function");
  }
}

var Drawer = function () {
  function Drawer() {
    _classCallCheck(this, Drawer);

    this.drawer = (0, _jquery2.default)('#drawer-nav');
    this.btns = (0, _jquery2.default)('[aria-control="drawer-nav"]');

    this.setListener();
  }

  _createClass(Drawer, [{
    key: 'setListener',
    value: function setListener() {
      var _this = this;

      this.btns.each(function (i, e) {
        var btn = (0, _jquery2.default)(e);

        btn.on('click', function (event) {
          event.preventDefault();
          _this.toggle(btn);
          event.stopPropagation();
        });

        (0, _jquery2.default)(window).resize(function () {
          _this.close(btn);
        });
      });
    }
  }, {
    key: 'toggle',
    value: function toggle(btn) {
      if ('false' === btn.attr('aria-expanded')) {
        this.open(btn);
      } else {
        this.close(btn);
      }
    }
  }, {
    key: 'open',
    value: function open(btn) {
      btn.attr('aria-expanded', true);
      this.drawer.attr('aria-hidden', false);
    }
  }, {
    key: 'close',
    value: function close(btn) {
      btn.attr('aria-expanded', false);
      this.drawer.attr('aria-hidden', true);
    }
  }]);

  return Drawer;
}();

exports.default = Drawer;

}).call(this,typeof global !== "undefined" ? global : typeof self !== "undefined" ? self : typeof window !== "undefined" ? window : {})
},{}]},{},[1]);
