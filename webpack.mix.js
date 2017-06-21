const { mix } = require('laravel-mix');
const USER_PATH = 'resources/assets/template/customer/';
const USER_JS_PATH = USER_PATH + 'js/';
const USER_CSS_PATH = USER_PATH + 'css/';
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

mix.js('resources/assets/js/app.js', 'public/assets/js')
   .sass('resources/assets/sass/app.scss', 'public/assets/css');
mix.copy(USER_PATH + 'images', 'public/assets/images');
mix.copy(USER_PATH + 'products-images','public/assets/images/products-images');
mix.copy(USER_PATH + 'fonts', 'public/assets/fonts');

mix.styles([
	USER_CSS_PATH + 'blogmate.css',
	USER_CSS_PATH + 'bootstrap.min.css',
	USER_CSS_PATH + 'fancybox.css',
	USER_CSS_PATH + 'owl.carousel.css',
	USER_CSS_PATH + 'owl.theme.css',
	USER_CSS_PATH + 'revslider.css',
	USER_CSS_PATH + 'font-awesome.css',
	USER_CSS_PATH + 'style.css',
], 'public/assets/css/customer.min.css');

mix.scripts([
	USER_JS_PATH + 'jquery.min.js',
	USER_JS_PATH + 'bootstrap.min.js',
	USER_JS_PATH + 'common.js',
	USER_JS_PATH + 'revslider.js',
	USER_JS_PATH + 'owl.carousel.min.js',	
], 'public/assets/js/customer.min.js');
