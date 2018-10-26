let mix = require('laravel-mix');

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

mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    'public/parts/css/libs/blog-post.css',
    'public/parts/css/libs/bootstrap.css',
    'public/parts/css/libs/font-awesome.css',
    'public/parts/css/libs/metisMenu.css',
    'public/parts/css/libs/sb-admin-2.css'
], 'public/parts/css/libs/all.css');

mix.scripts([
    'public/parts/js/libs/bootstrap.js',
    'public/parts/js/libs/jquery.js',
    'public/parts/js/libs/metisMenu.js',
    'public/parts/js/libs/sb-admin-2.js',
    'public/parts/js/libs/scripts.js'
], 'public/parts/js/libs/all.js');
