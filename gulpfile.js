var gulp = require('gulp'),
	less = require('gulp-less'),
	concat = require('gulp-concat'),
	cssnano = require('gulp-cssnano'),
    browserify = require('browserify'),
    uglify = require('gulp-uglify'),
    source = require('vinyl-source-stream'),
    buffer = require('vinyl-buffer');

var resource_path = 'resources/',
	build_path = 'public/';

gulp.task('less', function(){
    return gulp.src(resource_path + 'less/app.less')
        .pipe(less())
		.pipe(cssnano())
        .pipe(gulp.dest( build_path + 'css'));
});

/**
 * Highlight.js uses a module based system (require and module.export), so we use
 * Browserify to bundle it in a usable thing
 */
gulp.task('hjs', function (done) {
  var b = browserify(resource_path + 'js/app.js');

  return b.bundle()
    .pipe(source('highlight.js'))
    .pipe(buffer())
        .pipe(uglify())
    .pipe(gulp.dest( build_path + 'js/'));
})

gulp.task('scripts', ['hjs'], function() {
  //  gulp.src([
	// 		// './node_modules/highlight.js/dist/jquery.min.js', 
	// 		resource_path + 'js/app.js'
	// 	])
  //      .pipe(concat('app.js'))
  //      .pipe(gulp.dest( build_path + 'js'));
});


gulp.task('default', ['less' , 'scripts']);

gulp.task('watch', function() {
  gulp.watch(resource_path + 'less/**/*.less', ['less']);
  gulp.watch(resource_path + 'js/**/*.js', ['scripts']);
});