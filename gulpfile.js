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
    return gulp.src('languages/**/*.po')
        .pipe(gettext())
        .pipe(gulp.dest('languages'));
});

// Compile application styles.
function stylePipe(name) {
    return gulp.src(`assets/source/sass/${name}.scss`)
        .pipe(sass())
        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 8', 'ie 9', 'opera 12.1'))
        .pipe(rename(`${name}.dev.css`))
        .pipe(gulp.dest('assets/dist/css'))
        .pipe(rename(`${name}.min.css`))
        .pipe(cssnano({
            mergeLonghand: false,
            zindex: false
        }))
        .pipe(gulp.dest('assets/dist/css'));
}

// Register style tasks.
gulp.task('style-app', () => stylePipe('app'));
gulp.task('style-admin', () => stylePipe('admin'));
gulp.task('style', ['style-app', 'style-admin']);

// Compile application scripts.
function scriptPipe(name) {
    return browserify({entries: `assets/source/js/${name}.js`})
        .transform(babelify, {presets: ['env']})
        .bundle()
        .pipe(source(`${name}.js`))
        .pipe(buffer())
        .pipe(rename(`${name}.dev.js`))
        .pipe(gulp.dest('assets/dist/js'))
        .pipe(rename(`${name}.min.js`))
        .pipe(uglify())
        .pipe(gulp.dest('assets/dist/js'));
}

// Register script tasks.
gulp.task('script-app', () => scriptPipe('app'));
gulp.task('script-admin', () => scriptPipe('admin'));
gulp.task('script', ['script-app', 'script-admin']);

// File change watches.
gulp.task('watch', function() {
    gulp.watch('assets/source/js/**/*.js', ['script']);
    gulp.watch('assets/source/sass/**/*.scss', ['style']);
    gulp.watch('languages/**/*.po', ['lang']);
});

// Command line tasks.
gulp.task('build', ['lang', 'script', 'style']);
gulp.task('default', ['build', 'watch']);
