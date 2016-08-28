var gulp = require('gulp');
var pump = require('pump');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');

gulp.task('scripts', function (cb) {
	pump([
			gulp.src(['./js/highlight.pack.js','./js/svg-morpheus.js','./js/side.js','./js/main.js']),
			concat('index.js'),
			rename('index.min.js'),
			uglify(),
			gulp.dest('./js/build')
		],
		cb)
});

var watcher = gulp.watch('js/*.js', ['scripts']);
watcher.on('change', function(event) {
  console.log('File ' + event.path + ' was ' + event.type + ', running tasks...');
});

gulp.task('default', ['scripts']);