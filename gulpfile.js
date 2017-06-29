/**
 * Gulpfile.
 *
 * Gulp with WordPress.
 *
 * Implements:
 *      1. Live reloads browser with BrowserSync.
 *      2. CSS: Sass to CSS conversion, error catching, Autoprefixing, Sourcemaps,
 *         CSS minification, and Merge Media Queries.
 *      3. JS: Concatenates & uglifies Vendor and Custom JS files.
 *      4. Images: Minifies PNG, JPEG, GIF and SVG images.
 *      5. Watches files for changes in CSS or JS.
 *      6. Watches files for changes in PHP.
 *      7. Corrects the line endings.
 *      8. InjectCSS instead of browser page reload.
 *      9. Generates .pot file for i18n and l10n.
 *
 * @author Ahmad Awais (@ahmadawais)
 * @version 1.0.3
 */

/**
 * Configuration.
 *
 * Project Configuration for gulp tasks.
 *
 * In paths you can add <<glob or array of globs>>. Edit the variables as per your project requirements.
 */

// START Editing Project Variables.
// Project related.
var project                 = 'mrkaluzny-wptheme'; // Project Name.
var projectURL              = 'localhost:8888/mrkaluzny'; // Project URL. Could be something like localhost:8888.
var productURL              = './'; // Theme/Plugin URL. Leave it like it is, since our gulpfile.js lives in the root folder.

// Translation related.
var text_domain             = 'mrkaluzny-wptheme'; // Your textdomain here.
var destFile                = 'mrkaluzny-wptheme.pot'; // Name of the transalation file.
var packageName             = 'mrkaluzny-wptheme'; // Package name.
var bugReport               = 'https://AhmadAwais.com/contact/'; // Where can users report bugs.
var lastTranslator          = 'Wojciech Kałużny <wk@mrkaluzny.com>'; // Last translator Email ID.
var team                    = ''; // Team's Email ID.
var translatePath           = './languages'; // Where to save the translation files.

// Style related.
var styleSRC                = './assets/css/style.scss'; // Path to main .scss file.
var styleDestination        = './'; // Path to place the compiled CSS file.


// JS Custom related.
var jsCustomSRC             = './assets/js/app.js'; // Path to JS custom scripts folder.
var jsCustomDestination     = './js/'; // Path to place the compiled JS custom scripts file.
var jsCustomFile            = 'app'; // Compiled JS custom file name.

// Images related.
var imagesSRC               = './assets/img/raw/**/*.{png,jpg,gif,svg}'; // Source folder of images which should be optimized.
var imagesDestination       = './assets/img/'; // Destination folder of optimized images. Must be different from the imagesSRC folder.

// Watch files paths.
var styleWatchFiles         = './assets/css/**/*.scss'; // Path to all *.scss files inside css folder and inside them.
var vendorJSWatchFiles      = './assets/js/vendor/*.js'; // Path to all vendor JS files.
var customJSWatchFiles      = './assets/js/custom/**/*.js'; // Path to all custom JS files.
var projectPHPWatchFiles    = './**/*.php'; // Path to all PHP files.


// Browsers you care about for autoprefixing.
// Browserlist https        ://github.com/ai/browserslist
const AUTOPREFIXER_BROWSERS = [
    'last 2 version',
    '> 1%',
    'ie >= 9',
    'ie_mob >= 10',
    'ff >= 30',
    'chrome >= 34',
    'safari >= 7',
    'opera >= 23',
    'ios >= 7',
    'android >= 4',
    'bb >= 10'
  ];

// STOP Editing Project Variables.

/**
 * Load Plugins.
 *
 * Load gulp plugins and assing them semantic names.
 */
 // Dependencies
 var gulp         = require('gulp');
 var sass         = require('gulp-sass');
 var minifycss    = require('gulp-uglifycss');
 var autoprefixer = require('gulp-autoprefixer');
 var mmq          = require('gulp-merge-media-queries');
 var concat       = require('gulp-concat');
 var uglify       = require('gulp-uglify');
 var imagemin     = require('gulp-imagemin');
 var rename       = require('gulp-rename');
 var lineec       = require('gulp-line-ending-corrector');
 var filter       = require('gulp-filter');
 var sourcemaps   = require('gulp-sourcemaps');
 var notify       = require('gulp-notify');
 var browserSync  = require('browser-sync').create();
 var reload       = browserSync.reload;
 var babel        = require('gulp-babel');
 var browserify   = require('gulp-browserify');
 var gulpUtil     = require('gulp-util');

/**
 * Task: `browser-sync`.
 *
 * Live Reloads, CSS injections, Localhost tunneling.
 *
 * This task does the following:
 *    1. Sets the project URL
 *    2. Sets inject CSS
 *    3. You may define a custom port
 *    4. You may want to stop the browser from openning automatically
 */
gulp.task( 'browser-sync', function() {
  browserSync.init( {
    proxy: projectURL,
    port: 4000,
    open: true,
    injectChanges: true,
  });
});


/**
 * Task: `styles`.
 *
 * Compiles Sass, Autoprefixes it and Minifies CSS.
 *
 * This task does the following:
 *    1. Gets the source scss file
 *    2. Compiles Sass to CSS
 *    3. Writes Sourcemaps for it
 *    4. Autoprefixes it and generates style.css
 *    5. Renames the CSS file with suffix .min.css
 *    6. Minifies the CSS file and generates style.min.css
 *    7. Injects CSS or reloads the browser via browserSync
 */
 gulp.task('styles', function () {
    gulp.src( styleSRC )
    .pipe( sourcemaps.init() )
    .pipe( sass( {
      errLogToConsole: true,
      outputStyle: 'compact',
      //outputStyle: 'compressed',
      // outputStyle: 'nested',
      // outputStyle: 'expanded',
      precision: 10
    } ) )
    .on('error', console.error.bind(console))
    .pipe( sourcemaps.write( { includeContent: false } ) )
    .pipe( sourcemaps.init( { loadMaps: true } ) )
    .pipe( autoprefixer( AUTOPREFIXER_BROWSERS ) )

    .pipe( sourcemaps.write ( styleDestination ) )
    .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
    .pipe( gulp.dest( styleDestination ) )

    .pipe( filter( '**/*.css' ) ) // Filtering stream to only css files
    .pipe( mmq( { log: true } ) ) // Merge Media Queries only for .min.css version.

    .pipe( browserSync.stream() ) // Reloads style.css if that is enqueued.

    .pipe( rename( { suffix: '.min' } ) )
    .pipe( minifycss( {
      maxLineLen: 10
    }))
    .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
    .pipe( gulp.dest( styleDestination ) )

    .pipe( filter( '**/*.css' ) ) // Filtering stream to only css files
    .pipe( browserSync.stream() )// Reloads style.min.css if that is enqueued.
    .pipe( notify( { message: 'TASK: "styles" Completed! 💯', onLast: true } ) )
 });


 /**
  * Task: `customJS`.
  *
  * Concatenate and uglify custom JS scripts.
  *
  * This task does the following:
  *     1. Gets the source folder for JS custom files
  *     2. Concatenates all the files and generates custom.js
  *     3. Renames the JS file with suffix .min.js
  *     4. Uglifes/Minifies the JS file and generates custom.min.js
  */
  gulp.task( 'customJS', function() {
     gulp.src( jsCustomSRC )
 	.pipe( browserify() )
     .pipe( concat( jsCustomFile + '.js' ) )
     .pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
     .pipe( gulp.dest( jsCustomDestination ) )
 	.pipe( rename( {
 	  basename: jsCustomFile,
 	  suffix: '.min'
 	}))
 	.pipe( uglify().on('error', gulpUtil.log) )
 	.pipe( lineec() ) // Consistent Line Endings for non UNIX systems.
 	.pipe( gulp.dest( jsCustomDestination ) )
     .pipe( notify( { message: 'TASK: "customJs" Completed! 💯', onLast: true } ) );
  });


 /**
  * Task: `images`.
  *
  * Minifies PNG, JPEG, GIF and SVG images.
  *
  * This task does the following:
  *     1. Gets the source of images raw folder
  *     2. Minifies PNG, JPEG, GIF and SVG images
  *     3. Generates and saves the optimized images
  *
  * This task will run only once, if you want to run it
  * again, do it with the command `gulp images`.
  */
 gulp.task( 'images', function() {
  gulp.src( imagesSRC )
    .pipe( imagemin( {
          progressive: true,
          optimizationLevel: 3, // 0-7 low-high
          interlaced: true,
          svgoPlugins: [{removeViewBox: false}]
        } ) )
    .pipe(gulp.dest( imagesDestination ))
    .pipe( notify( { message: 'TASK: "images" Completed! 💯', onLast: true } ) );
 });


 /**
  * Watch Tasks.
  *
  * Watches for file changes and runs specific tasks.
  */
 gulp.task( 'default', ['styles', 'customJS', 'images', 'browser-sync'], function () {
  gulp.watch( projectPHPWatchFiles, reload ); // Reload on PHP file changes.
  gulp.watch( styleWatchFiles, [ 'styles' ] ); // Reload on SCSS file changes.
  gulp.watch( customJSWatchFiles, [ 'customJS', reload ] ); // Reload on customJS file changes.
 });
