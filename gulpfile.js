/*-------------------------------------------------------
  Build Configuration Szymon Trzepla
---------------------------------------------------------*/

//Settings

const gulp = require('gulp'),

	// Styles

	sass = require('gulp-sass'),
	autoprefixer = require('gulp-autoprefixer'),
	sourcemaps = require('gulp-sourcemaps'),

	// Scripts

	gutil = require('gulp-util'),
	concat = require('gulp-concat'),
	babili = require('gulp-babel-minify'),
	stripdebug = require('gulp-strip-debug'),

	// Utility plugins

	rename = require('gulp-rename'),
	plumber = require('gulp-plumber'),
	gulpif = require('gulp-if'),
	options = require('gulp-options'),

	// Images/SVG

	imagemin = require('gulp-imagemin'),
	svgo = require('gulp-svgo'),

	// Browser
	browserSync = require('browser-sync').create(),
	runSequence = require('run-sequence'),
	notify = require('gulp-notify'),
	wait = require('gulp-wait');


//=========== Paths ==================/

const projectName = 'Smacznegopl'; 

//=========== Styles ==================/

const styleSRC = './src/sass/**/*.scss';
const styleDIST = './dist/css/';
const mapDIST = './';

//=========== Scripts ==================/

const jsSRC = './src/js/';
const jsVendors = jsSRC + 'vendors/';
const jsMain = jsSRC + 'script.js';

const jsAll = [
	jsVendors + 'slick.js',
	jsVendors + 'lazyload.iife.js',
	jsVendors + 'jquery.event.move.js',
	jsVendors + 'jquery.twentytwenty.js',
	jsVendors + 'instafeed.js',
	// jsSRC + 'filter.js'
	jsMain
];

const jsDIST = './dist/js/';

//=========== Images ==================/

const imgSRC = './src/images/**/*';
const imgDIST = './dist/images/';

//=========== Fonts ==================/

const fontSRC = './src/fonts/**/*';
const fontDIST = './dist/fonts/';

//=========== Watch ==================/

const styleWatch = './src/sass/**/*.scss';
const jsWatch = './src/js/**/*.js';
const imgWatch = './src/images/**/*.*';
const fontsWatch = './src/fonts/**/*.*';
const phpWatch = './**/*.php';

//====================================/





//================
//=== browserSync
//================

gulp.task('browserSync', () => {
	const files = [styleWatch, jsWatch, imgWatch, fontsWatch, phpWatch];

	browserSync.init(files, {
		proxy: "localhost/" + projectName + "/",
		notify: false
	})
});


//================
//=== Styles
//================


gulp.task('styles', () => {
	return gulp.src([
			styleSRC
		])
		.pipe(plumber({
			errorHandler: notify.onError('Error: <%= error.message %>')
		}))
		.pipe(sourcemaps.init())
		.pipe(sass({
			errLogToConsole: true,
			outputStyle: 'compressed',
			// outputStyle: 'compact',
			// outputStyle: 'nested',
			// outputStyle: 'expanded',
			precision: 10
		}).on('error', sass.logError))
		.pipe(autoprefixer({
			browsers: ['last 4 versions']
		}))
		.pipe(rename({
			suffix: '.min'
		}))
		.pipe(sourcemaps.write(mapDIST))
		.pipe(plumber.stop())
		.pipe(gulp.dest(styleDIST))
		.pipe(notify({
			message: 'TASK: "styles" Completed! 💯',
			onLast: true
		}))
		.pipe(browserSync.stream());
});

//================
// Minify Scripts
//================

gulp.task('scripts', () => {
	return gulp.src(
		jsAll
		)
		.pipe(concat('script.min.js'))
		.pipe( gulpif( options.has( 'production'), stripdebug()))
		.pipe(babili({
			mangle: {
				keepClassNames: true
			}
		}))
		.on('error', function (err) {
			gutil.log(gutil.colors.red('[Error]'), err.toString());
		})
		.pipe( sourcemaps.write( '.' ) )
		.pipe(gulp.dest(jsDIST))
		.pipe(browserSync.stream())
});

// gulp.task('copy', () => {
// 	return gulp.src('src/**/*.html')
// 		.pipe(gulp.dest('dist'))
// 		.pipe(browserSync.stream())
// });


//================
//     Images 
//================

gulp.task('images', () => {
	return gulp.src(imgSRC)
		.pipe(imagemin())
		.pipe(gulp.dest(imgDIST))
});

gulp.task('svg', () => {
    return gulp.src('src/svg/*')
        .pipe(svgo())
        .pipe(gulp.dest('dist/svg'));
});

//================
//      Fonts 
//================

gulp.task('fonts', () => {
	return gulp.src( fontSRC )
	  .pipe(gulp.dest( fontDIST ))
  });
  

gulp.task('watch', ['browserSync', 'styles'], () => {
	gulp.watch(styleWatch, ['styles'], browserSync.reload());
	gulp.watch(jsWatch, ['scripts'], browserSync.reload());
	gulp.watch(phpWatch, browserSync.reload());
})


gulp.task('default', function (callback) {
	runSequence(['watch', 'styles', 'scripts', 'browserSync'],
		callback)
});

