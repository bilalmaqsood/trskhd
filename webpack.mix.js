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

var path ={
    css : 'resources/assets/styles',
    js : 'resources/assets/scripts',
    node : 'node_modules',
};

alert(path.css);
mix.js('resources/assets/js/app.js', 'public/js')
   .sass('resources/assets/sass/app.scss', 'public/css');

mix.styles([
    path.css + 'bootstrap.min.css',
    path.css + 'bootstrap-theme.min.css',
    path.css + 'font-awesome.min.css',
    path.css + 'jquery.fancybox.min.css',
    path.css + 'flexslider.css',
    path.css + 'animate.css',
    path.css + 'bootsnav.css',
    path.css + 'style.css',
    path.css + 'custom.css',
    path.css + 'responsive.css',

    'public/css/vendor/videojs.css'
], 'public/css/all.css');

mix.scripts([
    path.js + 'jquery-1.11.3.js',
    path.js + 'jquery.flexslider.js',
    path.js + 'bootstrap.min.js',
    path.js + 'bootsnav.js',
    path.js + 'custom.js',
    path.js + 'jquery.fancybox.min.js',

], 'public/js/all.js');