var gulp         = require('gulp');
var sass         = require('gulp-sass');
var bulkSass     = require('gulp-sass-bulk-import');
var postcss      = require('gulp-postcss');
var cssnano      = require('cssnano');
var rename       = require('gulp-rename');
var uglify       = require('gulp-uglify');
var browserify   = require('browserify');
var babelify     = require('babelify');
var source       = require('vinyl-source-stream');
var browser_sync = require('browser-sync');
var autoprefixer = require('autoprefixer');
var rimraf       = require('rimraf');
var watchify     = require("watchify");
var syncy        = require('syncy');

var dir = {
  src: {
    css     : 'src/scss',
    js      : 'src/js',
    images  : 'src/images',
    packages: 'src/packages'
  },
  dist: {
    css     : 'assets/css',
    js      : 'assets/js',
    images  : 'assets/images',
    packages: 'assets/packages'
  }
}

gulp.task('css', function() {
 return sassCompile(dir.src.css + '/*.scss', dir.dist.css);
});

function sassCompile(src, dest) {
  return gulp.src(src)
    .pipe(bulkSass())
    .pipe(sass())
    .pipe(postcss([
      autoprefixer({
        browsers: ['last 2 versions'],
        cascade: false
      })
    ]))
    .pipe(gulp.dest(dest))
    .pipe(postcss([cssnano({
      zindex: false
    })]))
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest(dest))
}

var b = browserify(dir.src.js + '/app.js', { extensions: ['.js', '.jsx'] })
  .transform('babelify', {
    presets: ["es2015"]
  })
  .transform('browserify-shim');


gulp.task('js', function () {
  var bundle = function () {
    b.bundle()
      .pipe(source('app.js'))
      .pipe(gulp.dest(dir.dist.js))
      .on('end', function() {
        return gulp.src([ dir.dist.js + '/app.js' ])
          .pipe(uglify())
          .pipe(rename({ suffix: '.min' }))
          .pipe(gulp.dest(dir.dist.js));
      });
  };
  if (global.isWatching) {
    console.log( "watchify");
    var bundler = watchify(b);
    bundler.on('update', bundle);
  }
  return bundle();
});

gulp.task('remove-images', function(cb) {
  rimraf('./assets/images', cb);
});

gulp.task('copy-images', function() {
    return syncy([ dir.src.images + '/**/*' ], dir.dist.images, {
        base:  dir.src.images
    } );
});

gulp.task('remove-packages-dir', function(cb) {
  rimraf(dir.dist.packages, cb);
});

gulp.task('copy-packages', ['remove-packages-dir'], function(cb) {
  var packages = [
    'node_modules/bootstrap/**',
    'node_modules/html5shiv/**',
    'node_modules/font-awesome/**',
    'node_modules/slick-carousel/**',
    'node_modules/jquery.smoothscroll/**'
  ];
  return gulp.src(packages, {base: 'node_modules'})
    .pipe(gulp.dest(dir.dist.packages));
});

gulp.task('build', ['css', 'js', 'copy-images', 'copy-packages']);

gulp.task('browsersync', function() {
  browser_sync.init({
    proxy: '127.0.0.1:8080',
      files: [
        './**/*.php',
        dir.dist.js + '/**.*',
        dir.dist.css + '/**.*',
        dir.dist.images + '/**.*',
        'style.min.css'
      ]
  });
});

gulp.task('setWatch', function () {
  global.isWatching = true;
});

gulp.task('default', ['setWatch', 'build', 'browsersync'], function() {
  gulp.watch([ dir.src.css + '/**/*.scss' ], ['css']);
  gulp.watch([ dir.src.images + '/**/*' ], ['copy-images']);
});
