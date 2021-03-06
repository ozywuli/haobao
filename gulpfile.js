var gulp = require('gulp');

var preprocess = require('gulp-preprocess');
var fileinclude = require('gulp-file-include')
var rename = require("gulp-rename");
var plumber = require('gulp-plumber');
var del = require('del');

var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var cmq = require('gulp-combine-media-queries');
var minifycss = require('gulp-minify-css');



function compileHTML() {
  return gulp.src('src/*.php')
    .pipe(fileinclude())
    .pipe(gulp.dest('../wp-content/themes/haobao/'))
}
function compileCSS() {
  return gulp.src('src/assets/scss/*.scss')
    .pipe(plumber({
        errorHandler: function (err) {
            console.log(err);
            this.emit('end');
        }
    }))
    .pipe(sass({
        outputStyle: 'expanded'
    }))
    .pipe( cmq({
        log: true
    }))
    .pipe(gulp.dest('../wp-content/themes/haobao/assets/css/'))
    .pipe(minifycss())
    .pipe(gulp.dest('../wp-content/themes/haobao/'))
}
function compileJS() {
  return gulp.src('src/assets/js/**/*')
    .pipe(gulp.dest('../wp-content/themes/haobao/assets/js'));
}
function compileICONS() {
    return gulp.src('src/assets/icons/*.php')
    .pipe(gulp.dest('../wp-content/themes/haobao/assets/icons'));
}





gulp.task('html', ['css', 'js', 'icons'], function() {
  return compileHTML();
});
gulp.task('css', function() {
  return compileCSS();
});
gulp.task('js', function() {
  return compileJS();
});
gulp.task('icons', function() {
  return compileICONS();
});





function watchHTML(error) {
    handleError(error);
    gulp.watch(['src/*.php'], ['html']);
}
function watchCSS(error) {
    handleError(error);
    gulp.watch(['src/assets/scss/*.scss'], ['html']);
}
function watchJS(error) {
    handleError(error);
    gulp.watch(['src/assets/js/*.js'], ['html']);
}
function watchICONS(error) {
    handleError(error);
    gulp.watch(['src/assets/icons/*.php'], ['html'])
}
function handleError(error) {
    var message = error;
    if (typeof error === 'function' ) return;
    if (typeof error === 'object' && error.hasOwnProperty('message')) message = error.message;
    if (message !== undefined) console.log('Error: ' + message);
}
function watchTask(error) {
    handleError(error);
    watchHTML();
    watchCSS();
    watchJS();
    watchICONS();
}


gulp.task('clean', function(cb) {
    del(['../wp-content/themes/haobao'], {force: true}, cb)
});
gulp.task('watch', ['html', 'css', 'js', 'icons'], watchTask);
gulp.task('default', ['watch']);
