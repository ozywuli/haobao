var gulp = require('gulp');

var rename = require("gulp-rename");
var plumber = require('gulp-plumber');

var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var cmq = require('gulp-combine-media-queries');
var minifycss = require('gulp-minify-css');


gulp.task('default', function() {
  return gulp.src('./src/index.php')
    .pipe(gulp.dest('../wp-content/themes/haobao'))
});


gulp.task('html', function() {
  return gulp.src('./src/*.php')
    .pipe(gulp.dest('../wp-content/themes/haobao/'))
});

gulp.task('css', function() {
  return gulp.src('./src/assets/scss/style.scss')
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

})