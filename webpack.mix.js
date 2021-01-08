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
    /* js */
    // mix.js('resources/assets/js/app.js', 'public/js');

    /* css */
    mix.sass('resources/assets/sass/app.scss', 'public/css/apps.css')
        mix.js( 'resources/assets/js/app.js', 'public/js/apps.js');

    /* copy */
    /*
    mix.copyDirectory('node_modules/admin-lte/plugins', 'public/assets/plugins');
    */
