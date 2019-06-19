var gulp = require('gulp'),
    stylus = require('gulp-stylus'),
    minifyCSS = require('gulp-minify-css'),
    rename = require('gulp-rename'),
    prefix = require('gulp-autoprefixer'),
    connect = require('gulp-connect'),
    sourcemaps = require('gulp-sourcemaps'),
    nib = require('nib');
//for  stylus extensions needs a variable typographic = require('typographic');


// stylus
gulp.task('styl', function () {
    gulp.src('stylus/main.styl')
        .pipe(sourcemaps.init())
        .pipe(stylus({
            use: [nib()]  /*for using stylus extensions!!! [typographic(), nib()]*/
        }))
        .pipe(sourcemaps.write())
        .pipe(gulp.dest('app/cssStyle'));
});

//css

gulp.task('css', function () {
    gulp.src('app/cssStyle/*.css')
        .pipe(prefix('> 1%', 'ie 9'))
        .pipe(minifyCSS())
        .pipe(rename('style.min.css'))
        .pipe(gulp.dest('app/css'))
        .pipe(connect.reload());
});

// html
gulp.task('html', function () {
    gulp.src('app/index.html')
        .pipe(connect.reload());
});

// watch
gulp.task('watch', function () {
    gulp.watch('stylus/*.styl', ['styl']);
    gulp.watch('app/cssStyle/*.css', ['css']);
    gulp.watch('app/index.html', ['html']);
});

// default
gulp.task('default', ['webserver', 'styl', 'css', 'html', 'watch']);


var webserver = require('gulp-webserver');

gulp.task('webserver', function() {
    gulp.src('app')
        .pipe(webserver({
            livereload: true,
            directoryListing: false,
            open: true,
            root: 'app'
            //fallback: 'index.html'
        }));
});
