var gulp = require('gulp'),
    jeet        = require('jeet'),
    nib         = require('nib'),
    rupture     = require('rupture'),
    poststylus  = require('poststylus'),
    cssnano     = require('cssnano'),
    mqpacker    = require('css-mqpacker'),
    cssnext     = require('postcss-cssnext'),
    brandColors = require('postcss-brand-colors'),
    browserSync = require('browser-sync').create(),
    del         = require('del');

// load all plugins in 'devDependencies' into the variable $
const $ = require('gulp-load-plugins')({
    pattern: ['*'],
    scope: ['devDependencies']
});

// package vars
const pkg = require('./package.json');








// https://nystudio107.com/blog/implementing-critical-css
// Process data in an array synchronously, moving onto the n+1 item only after the nth item callback
function doSynchronousLoop(data, processData, done) {
  if (data.length > 0) {
    const loop = (data, i, processData, done) => {
      processData(data[i], i, () => {
        if (++i < data.length) {
          loop(data, i, processData, done);
        } else {
          done();
        }
      });
    };
    loop(data, 0, processData, done);
  } else {
    done();
  }
}

// Process the critical path CSS one at a time
function processCriticalCSS(element, i, callback) {
  const criticalSrc = pkg.urls.critical + element.url;
  const criticalDest = pkg.paths.templates + element.template + '_critical.min.css';

  $.fancyLog("-> Generating critical CSS: " + $.chalk.cyan(criticalSrc) + " -> " + $.chalk.magenta(criticalDest));
  $.critical.generate({
    src: criticalSrc,
    dest: criticalDest,
    inline: false,
    ignore: [],
    base: pkg.paths.dist.base,
    css: [
      pkg.paths.dist.css + pkg.vars.siteCssName,
    ],
    minify: true,
    width: 1200,
    height: 1200
  }, (err, output) => {
    callback();
  });
}













//critical css task
gulp.task('criticalcss', ['css'], (callback) => {
    doSynchronousLoop(pkg.globs.critical, processCriticalCSS, () => {
        // all done
        callback();
    });
});




// CSS
// Compile Stylus CSS
// build the scss to the build folder, including the required paths, and writing out a sourcemap

gulp.task('stylus:watch', function () {
  var postCSSPlugins = [
    cssnext({browsers: ['last 2 version','> 1%']}),
    mqpacker,
    brandColors,
  ];
  $.fancyLog("-> Compiling stylus: " + pkg.paths.src.styles + pkg.vars.styleName);
  return gulp.src(pkg.paths.src.styles + pkg.vars.styleName)
    .pipe($.plumber())
    .pipe($.sourcemaps.init())
    .pipe($.stylus({
      compress: false,
      use: [
        jeet(),
        nib(),
        rupture(),
        poststylus(postCSSPlugins)
      ],
      paths: [
        'node_modules'      // Shortcut references possible everywhere, e.g. @import 'node_modules/bla'
      ],
      options: {
        compress: false,
      },
      'include css': true
    }))
    .pipe($.cached('styl_compile'))
    // .pipe($.postcss(postCSSPlugins))
    .pipe($.sourcemaps.write('./'))
    .pipe($.size({ gzip: true, showFiles: true }))
    .pipe(gulp.dest(pkg.paths.dist.css))
    // .pipe(gulp.dest(pkg.paths.build.css))
    // .pipe(browserSync.stream());
});

gulp.task('stylus:build', function () {
  var postCSSPlugins = [
    cssnext({browsers: ['last 2 version','> 1%']}),
    mqpacker,
    brandColors,
    cssnano,
  ];
  return gulp.src(pkg.paths.src.styles + pkg.vars.styleName)
    .pipe($.stylus({
      compress: true,
      use: [
        jeet(),
        nib(),
        rupture(),
        poststylus(postCSSPlugins)
      ]
    }))
    .pipe(gulp.dest(pkg.paths.build.css));
});



// JavaScript
// Concat, rename and uglify all JS

var jsFiles = [
  'assets/js/jquery.js',
  'assets/js/master.js'
];

gulp.task('js:watch', function() {
  return gulp.src(jsFiles)
    .pipe($.plumber())
    .pipe($.concat('scripts.js'))
    .pipe(gulp.dest('build/js'))
    .pipe(browserSync.stream());
});

gulp.task('js:build', function() {
  return gulp.src(jsFiles)
    .pipe($.concat('scripts.js'))
    .pipe($.uglify())
    .pipe(gulp.dest('build/js'));
});



// Imagemin
// Optimize all images

gulp.task('imagemin', function() {
  return gulp.src('assets/images/**/*')
    .pipe($.plumber())
    .pipe($.imagemin())
    .pipe(gulp.dest('build/images'))
    .pipe(browserSync.stream());
});



// Copy fonts

gulp.task('copy-fonts', function() {
  return gulp.src('assets/fonts/**/*')
    .pipe($.plumber())
    .pipe(gulp.dest('build/fonts/'))
});



// Browser Sync
// Reload on file changes in /build

gulp.task('browser-sync', function() {
  // browserSync.init({
  //   open: 'external',
  //   host: pkg.domains.local,
  //   proxy: pkg.domains.local,
  //   port: 80
  // });
});




// Watch
// Watch HTML and CSS compilation changes

gulp.task('watch-tasks', function() {
  gulp.watch(pkg.paths.src.styles + '**/*.styl', ['stylus:watch']);
  gulp.watch(pkg.paths.src.js + '**/*.js', ['js:watch']);
  gulp.watch(pkg.paths.src.img + '**/*', ['imagemin']);
});



// Clean
// Clean 'build' folder

gulp.task('clean-build', function() {
  console.log('Cleaning build folder');
  return del('build/');
});



// Run Tasks

gulp.task('watch', ['stylus:watch', 'js:watch', 'imagemin', 'copy-fonts', 'browser-sync', 'watch-tasks']);
gulp.task('build', ['stylus:build', 'js:build', 'imagemin', 'copy-fonts']);
// gulp.task('clean', ['clean-build']);
