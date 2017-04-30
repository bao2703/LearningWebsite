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
	.copy('vendor/kartik-v/bootstrap-fileinput/img', 'public/assets/img')
    .styles([
        'node_modules/datatables.net-bs/css/dataTables.bootstrap.css',
	    'node_modules/codemirror/lib/codemirror.css',
	    'node_modules/codemirror/theme/dracula.css',
	    'vendor/kartik-v/bootstrap-fileinput/css/fileinput.css'
    ], 'public/assets/css/lib.css')
    .scripts([
        'node_modules/datatables.net/js/jquery.dataTables.js',
        'node_modules/datatables.net-bs/js/dataTables.bootstrap.js',
	    'node_modules/codemirror/lib/codemirror.js',
	    'node_modules/codemirror/mode/css/css.js',
	    'node_modules/codemirror/mode/vbscript/vbscript.js',
	    'node_modules/codemirror/mode/xml/xml.js',
	    'node_modules/codemirror/mode/htmlmixed/htmlmixed.js',
	    'node_modules/codemirror/mode/javascript/javascript.js',
	    'vendor/kartik-v/bootstrap-fileinput/js/fileinput.js'
    ], 'public/assets/js/lib.js')
    .scripts([
        'resources/assets/js/modal-form.js'
    ], 'public/assets/js/modal-form.js')
	.copy('resources/assets/images', 'public/storage/images');
