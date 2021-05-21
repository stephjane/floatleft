let gulp = require('gulp');
let cleanCSS = require('gulp-clean-css');
let minify = require('gulp-minify');
 
gulp.task('script', done => {
  gulp.src(['js/*.js'])
    .pipe(minify())
    .pipe(gulp.dest('dist'))
  done();
});

gulp.task('css', done => {
  gulp.src('css/*.css')
    .pipe(cleanCSS({compatibility: 'ie8'}))
    .pipe(gulp.dest('dist'))
  done();
});

gulp.task('default', gulp.parallel(
      'script',
      'css'
)
);