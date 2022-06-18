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

mix.js('resources/js/app.js', 'public/js')
    .js('resources/assets/grant/script.js', 'public/js')
    .js('resources/assets/grant/multiselect/vanillaSelectBox.js', 'public/js/multiselect.js')
    .sass('resources/assets/grant/source/scss/style.scss', 'public/css')
    .sass('resources/sass/app.scss', 'public/css')
    .css('resources/assets/grant/multiselect/vanillaSelectBox.css', 'public/css/multiselect.css')
    .sourceMaps();
