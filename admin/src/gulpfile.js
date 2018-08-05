var gulp = require('gulp');
var sass = require('gulp-sass');
var postcss = require('gulp-postcss');
var autoprefixer = require('gulp-autoprefixer');
var notify = require('gulp-notify');
var runSequence = require('run-sequence');
var sourcemaps = require('gulp-sourcemaps');
var sassLint = require('gulp-sass-lint');
var clean = require('gulp-clean');

var build = require('./build.config.json');

gulp.task('clean-css', function () {
    return gulp.src('../css/*.{css,map}', {read: false})
        .pipe(clean({force: true}));
});

gulp.task('clean-build', function () {
    return gulp.src('../css/*', {read: false})
        .pipe(clean());
});

gulp.task('fonts', function () {
    return gulp.src(build.app_files.fonts)
        .pipe(gulp.dest('../fonts'));
});

gulp.task('sass', function () {
  return gulp.src(build.app_files.sass)
      .pipe(sourcemaps.init())
      .pipe(sass().on('error', sass.logError))
      .pipe(autoprefixer( build.autoprefixer_options ))
      .pipe(sourcemaps.write('.'))
      .pipe(gulp.dest('../css/'))
      ;
});

gulp.task('sass-lint', function () {
   return gulp.src( build.sass_lint.src )
       .pipe(sassLint({configFile:build.sass_lint.options.config_file}))
       .pipe(sassLint.format())
       .pipe(sassLint.failOnError())
});

gulp.task('default', function(callback){
    runSequence('clean-css',['fonts','sass-lint','sass'],callback);
});

gulp.task('watch', function(){
    runSequence('clean-css',
            ['sass-lint',
            'sass'],
        function(){
            var sassWatcher = gulp.watch('sass/**/*.scss', function(){
                runSequence('fonts','sass-lint','sass');
            });
            sassWatcher.on('change', function(event) {
                console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
            });
        }
    );
});
