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

        mix.js('resources/js/app.js', 'public/js');
        mix.sass('resources/sass/app.scss', 'public/css');
        mix.styles([
        'resources/asset/core/css/bootstrap.min.css',
        'resources/asset/core/css/font-awesome.min.css'
        ], 'public/css/core.css');
        mix.styles([
        'resources/asset/login/css/main.css',
        'resources/asset/login/css/util.css'
        ], 'public/css/login.css');
        mix.styles([
        'resources/asset/admin/css/main.css'
        ], 'public/css/admin.css');
        mix.scripts([
        'resources/asset/core/js/jquery.min.js',
        'resources/asset/core/js/popper.min.js',
        'resources/asset/core/js/bootstrap.min.js'
        ], 'public/js/core.js');
        mix.scripts([
        'resources/asset/admin/js/main.js'
        ], 'public/js/admin.js');
