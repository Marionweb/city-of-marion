// package vars
const pkg = require("./package.json");

// gulp and post-css plugins
var gulp        = require('gulp'),
    print       = require('gulp-print').default,
    nib         = require('nib'),
    rupture     = require('rupture'),
    csso        = require('csso-stylus'),
    poststylus  = require('poststylus'),
    lost        = require('lost'),
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
    " * @project        <%= pkg.name %> - <%= pkg.description %>",
    " * @author         <%= pkg.author %>",
    " * @build          " + $.moment().format("llll") + " ET",
    // " * @release        " + $.gitRevSync.long() + " [" + $.gitRevSync.branch() + "]",
    " * @copyright      Copyright (c) " + $.moment().format("YYYY") + ", <%= pkg.copyright %>",
    " *",
    " */",
    ""
].join("\n");






// CSS
// ---------------------------------------------------------------------------------------------

// Compile Stylus CSS
// build the scss to the build folder, including the required paths, and writing out a sourcemap
gulp.task('stylus', ['svgSprites:copy'], function () {
  // PostCSS setup
  var postCSSPlugins = [
    lost,
    cssnext({
      browsers: ['last 2 version','> 1%','not ie < 9'],
      features: {
        calc: false
      }
    }),
    mqpacker,
    brandColors
  ];


  $.fancyLog("-> Compiling stylus: " + pkg.paths.src.styles + pkg.vars.styleName);
  return gulp.src(pkg.paths.src.styles + pkg.vars.styleName)
    .pipe($.plumber({errorHandler: onError}))
    // .pipe($.sourcemaps.init({loadMaps: true}))
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
    // .pipe($.sourcemaps.write("./"))
    .pipe($.size({gzip: true, showFiles: true}))
    .pipe(gulp.dest(pkg.paths.build.css));
});


// css task - combine & minimize any distribution CSS into the public css folder, and add our banner to it
gulp.task("css", ["stylus"], () => {
    $.fancyLog("-> Building css");
    return gulp.src(pkg.globs.distCss)
        .pipe($.plumber({errorHandler: onError}))
        .pipe($.newer({dest: pkg.paths.dist.css + pkg.vars.siteCssName}))
        .pipe(print())
        .pipe($.sourcemaps.init({loadMaps: true}))
        .pipe($.concat(pkg.vars.siteCssName))
        .pipe($.cssnano({
            discardComments: {
                removeAll: true
            },
            discardDuplicates: true,
            discardEmpty: true,
            minifyFontValues: true,
            minifySelectors: true
        }))
        .pipe($.header(banner, {pkg: pkg}))
        .pipe($.sourcemaps.write("./"))
        .pipe($.size({gzip: true, showFiles: true}))
        .pipe(gulp.dest(pkg.paths.dist.css))
        .pipe($.filter("**/*.css"));
});


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
  const criticalDest = pkg.paths.templates + element.template + "_critical.min.css";

  let criticalWidth = 1200;
  let criticalHeight = 1200;
  if (element.template.indexOf("amp_") !== -1) {
      criticalWidth = 600;
      criticalHeight = 19200;
  }

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
      width: criticalWidth,
      height: criticalHeight
  }, (err, output) => {
      if (err) {
          $.fancyLog($.chalk.magenta(err));
      }
      callback();
  });
}


//critical css task
gulp.task('criticalcss', ['css'], (callback) => {
    if (process.env.NODE_ENV === "production") {
        doSynchronousLoop(pkg.globs.critical, processCriticalCSS, () => {
            // all done
            callback();
        });
    } else {
        callback();
    }

});






// JavaScript
// ---------------------------------------------------------------------------------------------


// Process the downloads one at a time
function processDownload(element, i, callback) {
  const downloadSrc = element.url;
  const downloadDest = element.dest;

  $.fancyLog("-> Downloading URL: " + $.chalk.cyan(downloadSrc) + " -> " + $.chalk.magenta(downloadDest));
  $.download(downloadSrc)
      .pipe(gulp.dest(downloadDest));
  callback();
}

// download task
gulp.task("download", (callback) => {
  doSynchronousLoop(pkg.globs.download, processDownload, () => {
      // all done
      callback();
  });
});


// Run pa11y accessibility tests on each template
function processAccessibility(element, i, callback) {
  const accessibilitySrc = pkg.urls.critical + element.url;
  const cliReporter = require('./node_modules/pa11y/reporter/cli.js');
  const options = {
      log: cliReporter,
      ignore: [
        'notice',
        'warning',
        'WCAG2AA.Principle1.Guideline1_4.1_4_3.G145.Fail',
        'WCAG2AA.Principle1.Guideline1_4.1_4_3.G18.Fail'
      ],
  };
  const test = $.pa11y(options);

  $.fancyLog("-> Checking Accessibility for URL: " + $.chalk.cyan(accessibilitySrc));
  test.run(accessibilitySrc, (error, results) => {
      cliReporter.results(results, accessibilitySrc);
      callback();
  });
}

// accessibility task
gulp.task("a11y", (callback) => {
  doSynchronousLoop(pkg.globs.critical, processAccessibility, () => {
      // all done
      callback();
  });
});



// babel js task - transpile our Javascript into the build directory
gulp.task("js-babel", () => {
  $.fancyLog("-> Transpiling Javascript via Babel...");
  return gulp.src(pkg.globs.babelJs)
      .pipe($.plumber({errorHandler: onError}))
      .pipe($.newer({dest: pkg.paths.build.js}))
      // babel causing problems with build
      // .pipe($.babel())
      .pipe($.size({gzip: true, showFiles: true}))
      .pipe(gulp.dest(pkg.paths.build.js));
});


// js task - minimize any distribution Javascript into the public js folder, and add our banner to it
gulp.task("js-copy", () => {
  $.fancyLog("-> Copy js");
  return gulp.src(pkg.globs.copyJs)
      .pipe($.plumber({errorHandler: onError}))
      .pipe($.header(banner, {pkg: pkg}))
      .pipe($.size({gzip: true, showFiles: true}))
      .pipe(gulp.dest(pkg.paths.dist.js))
      .pipe($.filter("**/*.js"));
});


// js task - minimize any distribution Javascript into the public js folder, and add our banner to it
gulp.task("js", ["js-copy", "js-babel"], () => {
  $.fancyLog("-> Building js");
  return gulp.src(pkg.globs.distJs)
      .pipe($.plumber({errorHandler: onError}))
      .pipe($.if(["*.js", "!*.min.js"],
          $.newer({dest: pkg.paths.dist.js, ext: ".min.js"}),
          $.newer({dest: pkg.paths.dist.js})
      ))
      .pipe($.concat(pkg.vars.siteJsName))
      // .pipe($.if(["*.js", "!*.min.js"],
      //     $.uglify()
      // ))
      .pipe($.if(["*.js", "!*.min.js"],
          $.rename({suffix: ".min"})
      ))
      .pipe($.header(banner, {pkg: pkg}))
      .pipe($.size({gzip: true, showFiles: true}))
      .pipe(gulp.dest(pkg.paths.dist.js))
      .pipe($.filter("**/*.js"));
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
gulp.task('imagemin', ['compile'], function () {
  return gulp.src(pkg.paths.dist.img + "**/*.{png,jpg,jpeg,gif,svg}")
      .pipe($.imagemin({
          progressive: true,
          interlaced: true,
          optimizationLevel: 7,
          svgoPlugins: [{removeViewBox: false}],
          verbose: true,
          use: []
      }))
      .pipe(gulp.dest(pkg.paths.dist.img));
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

gulp.task('default', function() {
  gulp.watch(pkg.paths.src.styles + '**/*.styl', ['css']);
  gulp.watch(pkg.paths.src.js + '**/*.js', ['js']);
  gulp.watch(pkg.paths.src.img + '**/*', ['imagemin']);
  gulp.watch(pkg.paths.src.sprites + '**/*.svg', ['svgSprites:copy']);
});



// Clean
// Clean 'build' folder

gulp.task('clean-build', function() {
  console.log('Cleaning build folder');
  return del('build/');
});



// Run Tasks
gulp.task("compile", ["js", "criticalcss"]);
gulp.task("build", ["compile", "imagemin"]);
gulp.task("watch", ["build", "default"]);
// gulp.task('clean', ['clean-build']);
