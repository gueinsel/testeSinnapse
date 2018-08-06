var gulp = require('gulp');
var sass = require("gulp-sass");
var notify = require("gulp-notify");
var concat = require('gulp-concat');
var jsmin = require('gulp-jsmin');
var rename = require('gulp-rename');
var uglifycss = require('gulp-uglifycss');
var imagemin = require('gulp-imagemin');
var htmlmin = require('gulp-htmlmin');


gulp.task('jigglypuff' , function(){
  return gulp.src('./source/sass/*.scss')
    .pipe(sass({outputStyle:'compressed'}))
    .on('error', notify.onError({ title: 'Seu burro , presta atenção!', message: '<%= error.message %>'}))
    .pipe(gulp.dest('./dist/css/'));
});

gulp.task('default',['jigglypuff','pikachu','snorlax','w']);

gulp.task('w', function() {
  gulp.watch('./source/sass/*.scss', ['jigglypuff']);
  gulp.watch('./source/js/**/*.js',['zapdos']);
  gulp.watch('./source/php/*.php', ['pikachu']);
});

gulp.task('pikachu', function() {
  return gulp.src('./source/php/*.php')
    .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest(''));
});

gulp.task('snorlax', function() {
  return gulp.src(['./node_modules/jquery/dist/jquery.min.js','./node_modules/popper.js/dist/umd/popper.min.js','./node_modules/bootstrap/dist/js/bootstrap.min.js','./node_modules/@fortawesome/fontawesome-free/js/all.min.js','./source/js/owl.carousel.min.js'])
    .pipe(concat('lib.js'))
    .pipe(gulp.dest('./dist/js/'));
});

gulp.task('zapdos', function() {
  return gulp.src(['./source/js/app.js'])
    .pipe(jsmin())
    .pipe(rename({suffix: '.min'}))
    .pipe(gulp.dest('./dist/js/'));
});

gulp.task('imagem', function() {
  return gulp.src('./source/imagens/*')
    .pipe(imagemin())
    .pipe(gulp.dest('./dist/img/'));
});
