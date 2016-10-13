var gulp = require('gulp');

gulp.task('default', function() {	 
	console.log('Use the following commands');
	console.log('--------------------------');
	console.log('gulp sass				to compile the style.scss to style.css');
	console.log('gulp admin-sass		to compile the admin.scss to admin.css');
	console.log('gulp compile-sass		to compile both of the above.');
	console.log('gulp js				to compile the custom.js to custom.min.js');
	console.log('gulp compile-js		to compile both JS files above');
	console.log('gulp watch				to continue watching all files for changes, and build when changed');
	console.log('gulp wordpress-pot		to compile the lsx-mega-menus.pot');
	console.log('gulp reload-node-js	Copy over the .js files from teh various node modules');
});

var sass = require('gulp-sass');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var sort = require('gulp-sort');
var wppot = require('gulp-wp-pot');
var rename = require('gulp-rename');

gulp.task('js', function () {
	gulp.src('assets/js/to-team.js')
		.pipe(concat('to-team.min.js'))
		.pipe(uglify())
		.pipe(gulp.dest('assets/js'));
});
gulp.task('compile-js', (['js']));

gulp.task('watch', function() {
	gulp.watch('assets/js/custom.js', ['js']);
});

gulp.task('wordpress-pot', function () {
	gulp.src('**/*.php')
		.pipe(sort())
		.pipe(wppot({
			domain: 'to-team',
			destFile: 'to-team.pot',
			package: 'to-team',
			bugReport: '{plugin-url}/issues',
			team: 'LightSpeed <webmaster@lsdev.biz>'
		}))
		.pipe(gulp.dest('languages'));
});