const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

// mix.js('resources/js/app.js', 'public/js')
//     .sass('resources/sass/app.scss', 'public/css');


mix.styles([
	'public/assets/css/bootstrap.min.css',
	'public/assets/awesome/css/all.min.css',
	'public/assets/css/elegant-icons.css',
	'public/assets/css/themify-icons.css',
	'public/assets/css/nice-select.css',
	'public/assets/css/jquery-ui.min.css',
	'public/assets/css/owl.carousel.min.css',
	'public/assets/css/magnific-popup.css',
	'public/assets/css/slicknav.min.css',
	'public/assets/css/jssocials.css',
	'public/assets/css/jssocials-theme-plain.css',
	'public/assets/css/style.css',
	'public/assets/css/custom.css',
], 'public/assets/css/all.min.css');

mix.scripts([
	'public/assets/js/jquery.min.js',
	'public/assets/js/bootstrap.min.js',
	'public/assets/js/jquery.nice-select.min.js',
	'public/assets/js/jquery.slicknav.js',
	'public/assets/js/jquery-ui.min.js',
	'public/assets/js/owl.carousel.min.js',
	'public/assets/js/jquery.mask.min.js',
	'public/assets/js/jssocials.min.js',
	'public/assets/js/main.js',
], 'public/assets/js/all.min.js');