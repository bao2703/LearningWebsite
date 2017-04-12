const { mix } = require('laravel-mix');

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
    .sass('resources/assets/sass/app.scss', 'public/assets/css')
    .copy('node_modules/bootstrap-sass/assets/fonts/bootstrap', 'public/assets/fonts')
    .copy('node_modules/font-awesome/fonts', 'public/assets/fonts')
    .styles([
        'node_modules/datatables.net-bs/css/dataTables.bootstrap.css'
    ], 'public/assets/css/lib.css')
    .scripts([
        'node_modules/datatables.net/js/jquery.dataTables.js',
        'node_modules/datatables.net-bs/js/dataTables.bootstrap.js'
    ], 'public/assets/js/lib.js');
