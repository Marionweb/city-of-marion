// package vars
const pkg = require("./package.json");

// gulp
var gulp        = require('gulp'),
    nib         = require('nib'),
    rupture     = require('rupture'),
    csso        = require('csso-stylus'),
    poststylus  = require('poststylus'),
    lost        = require('lost'),
    cssnano     = require('cssnano'),
    mqpacker    = require('css-mqpacker'),
    cssnext     = require('postcss-cssnext'),
    brandColors = require('postcss-brand-colors'),
    fontAwesome = require('font-awesome-stylus'),
    critical    = require('critical'),
    browserSync = require('browser-sync').create(),
    del         = require('del');

// load all plugins in "devDependencies" into the variable $
const $ = require('gulp-load-plugins')({
  pattern: ['*'],
  scope: ['devDependencies']
});

const onError = (err) => {
    console.log(err);
};

const banner = [
    "/**",
    " * @project        <%= pkg.name %>",
    " * @author         <%= pkg.author %>",
    " * @build          " + $.moment().format("llll") + " ET",
    // " * @release        " + $.gitRevSync.long() + " [" + $.gitRevSync.branch() + "]",
    " * @copyright      Copyright (c) " + $.moment().format("YYYY") + ", <%= pkg.copyright %>",
    " *",
    " */",
    ""
].join("\n");








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





// CSS
// Compile Stylus CSS
// build the scss to the build folder, including the required paths, and writing out a sourcemap
gulp.task('stylus:watch', ['svgSprites:copy'], function () {
  var postCSSPlugins = [
    lost,
    cssnext({
      browsers: ['last 2 version','> 1%','not ie < 9'],
      features: {
        calc: false
      }
    }),
    mqpacker,
    brandColors,
  ];
  $.fancyLog("-> Compiling stylus: " + pkg.paths.src.styles + pkg.vars.styleName);
  gulp.src(pkg.paths.src.styles + pkg.vars.styleName)
    .pipe($.plumber())
    .pipe($.sourcemaps.init())
    .pipe($.stylus({
      compress: false,
      use: [
        nib(),
        rupture(),
        fontAwesome(),
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
    .pipe($.header(banner, {pkg: pkg}))
    .pipe($.sourcemaps.write('./'))
    .pipe($.size({ gzip: true, showFiles: true }))
    // .pipe(gulp.dest(pkg.paths.build.css));
    .pipe(gulp.dest(pkg.paths.dist.css));
    // .pipe(browserSync.stream());
});




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
gulp.task('criticalcss', ['stylus:build'], (callback) => {
    doSynchronousLoop(pkg.globs.critical, processCriticalCSS, () => {
        // all done
        callback();
    });
});


gulp.task('stylus:build', function () {
  var postCSSPlugins = [
    lost,
    cssnext({
      browsers: ['last 2 version','> 1%','not ie < 9'],
      features: {
        calc: false
      }
    }),
    mqpacker,
    brandColors,
  ];

  $.fancyLog("-> Building stylus: " + pkg.paths.src.styles + pkg.vars.styleName);
  gulp.src(pkg.paths.src.styles + pkg.vars.styleName)
    .pipe($.plumber())
    .pipe($.stylus({
      'include css': true,
      use: [
        nib(),
        rupture(),
        fontAwesome(),
        poststylus(postCSSPlugins),
        csso()
      ],
      paths: [
        'node_modules'      // Shortcut references possible everywhere, e.g. @import 'node_modules/bla'
      ]
    }))
    .pipe(gulp.dest(pkg.paths.build.css));

  $.fancyLog("-> Rename CSS: " + $.chalk.cyan(pkg.paths.build.css + pkg.vars.cssName) + " --> " + $.chalk.magenta(pkg.vars.siteCssName) );
  return gulp.src(pkg.paths.build.css + pkg.vars.cssName)
      .pipe($.rename(pkg.vars.siteCssName))
      .pipe(gulp.dest(pkg.paths.dist.css));
});



// JavaScript
// Concat, rename and uglify all JS

var jsFiles = [
  pkg.paths.src.js + 'modules/ready.js',
  'src/js/master.js'
];

gulp.task('js:watch', function() {
  return gulp.src(pkg.globs.distJs.concat(jsFiles))
    .pipe($.plumber())
    .pipe($.sourcemaps.init({loadMaps: true}))
    .pipe($.concat('scripts.js'))
    .pipe($.sourcemaps.write('/dev/null', {addComment: false}))
    .pipe(gulp.dest(pkg.paths.dist.js))
    .pipe(browserSync.stream());
});

gulp.task('js:watchv2', function() {
  return gulp.src(pkg.globs.distJs.concat(jsFiles))
    .pipe($.plumber())
    .pipe($.sourcemaps.init({loadMaps: true}))
    .pipe($.concat('scripts.js'))
    .pipe($.sourcemaps.write('/dev/null', {addComment: false}))
    .pipe(gulp.dest(pkg.paths.dist.js))
});

gulp.task('js:build', function() {
  return gulp.src(pkg.globs.distJs.concat(jsFiles))
    .pipe($.concat('scripts.js'))
    .pipe($.uglify())
    .pipe(gulp.dest(pkg.paths.build.js));
});






// SVG Sprites
// Optimize all images
//
// More complex configuration example
config = {
  shape: {
    dimension: {     // Set maximum dimensions
      maxWidth: 32,
      maxHeight: 32
    },
    spacing: {     // Add padding
      padding: 10
    },
    // dest: pkg.paths.dist.sprites + '/intermediate-svg'  // Keep the intermediate files
  },
  dest: pkg.paths.build.sprites,
  mode: {
    css: {     // Activate the css mode
      bust: false,
      sprite: '../img/sprites.svg',
      render: {
        styl: true    // Activate Stylus output (with default options)
      }
    }
  }
};

gulp.task('svgSprites:compile', function() {
  return gulp.src(pkg.paths.src.sprites + '**/*.svg')
    .pipe($.plumber())
    .pipe($.svgSprite(config))
    .pipe(gulp.dest(pkg.paths.build.sprites))
    // .pipe(browserSync.stream());
});
gulp.task('svgSprites:copy', ['svgSprites:compile'], function () {
  return gulp.src(pkg.paths.build.sprites + 'img/*.svg')
    .pipe($.plumber())
    .pipe(gulp.dest(pkg.paths.dist.img))
});





// Imagemin
// Optimize all images

gulp.task('imagemin', function() {
  return gulp.src('assets/images/**/*')
    .pipe($.plumber())
    .pipe($.imagemin())
    .pipe(gulp.dest('build/images'))
    // .pipe(browserSync.stream());
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
gulp.task('build:staging', ['stylus:watch', 'js:watchv2']);
gulp.task('build', ['stylus:build', 'js:build', 'imagemin', 'copy-fonts']);
// gulp.task('clean', ['clean-build']);
