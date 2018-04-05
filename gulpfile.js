// Include gulp
var gulp = require('gulp');

// Include Our Plugins
var autoprefixer = require('gulp-autoprefixer');
var babelify = require('babelify');
var browserify = require('browserify');
var buffer = require('vinyl-buffer');
var concat = require('gulp-concat');
var cssnano = require('gulp-cssnano');
var gettext = require('gulp-gettext');
var rename = require('gulp-rename');
var sass = require('gulp-sass');
var source = require('vinyl-source-stream');
var uglify = require('gulp-uglify');

// Compile translations.
gulp.task('lang', function() {
    return gulp.src('languages/*.po')
        .pipe(gettext())
        .pipe(gulp.dest('languages'));
});

// Compile application styles.
gulp.task('style', function() {
    return gulp.src('assets/source/sass/app.scss')
        .pipe(sass())
        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
        .pipe(rename('app.dev.css'))
        .pipe(gulp.dest('assets/dist/css'))
        .pipe(rename('app.min.css'))
        .pipe(cssnano({
            mergeLonghand: false,
            zindex: false
        }))
        .pipe(gulp.dest('assets/dist/css'));
});

// Compile application scripts.
gulp.task('script', function() {
    return browserify({entries: 'assets/source/js/app.js'})
        .transform(babelify, {presets: ['env']})
        .bundle()
        .pipe(source('app.js'))
        .pipe(buffer())
        .pipe(rename('app.dev.js'))
        .pipe(gulp.dest('assets/dist/js'))
        .pipe(rename('app.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('assets/dist/js'));
});

// File change watches.
gulp.task('watch', function() {
    gulp.watch('assets/source/js/**/*.js', ['script']);
    gulp.watch('assets/source/sass/**/*.scss', ['style']);
    gulp.watch('languages/*.po', ['lang']);
});

// Command line tasks.
gulp.task('build', ['lang', 'script', 'style']);
gulp.task('default', ['build', 'watch']);
