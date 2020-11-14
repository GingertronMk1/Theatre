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

const esfilename = 'public/js/app.es2015.js';

mix
.js(
    'resources/js/app.js',
    esfilename
)
.babel(
    esfilename,
    'public/js/app.js'
)
;

mix.sass('resources/sass/app.scss', 'public/css');
