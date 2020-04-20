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

mix.combine([
   'resources/assets/admin_js/admin_template/jquery-core.js', 
   'resources/assets/admin_js/admin_template/jquery-ui-core.js',
   'resources/assets/admin_js/admin_template/jquery-ui-widget.js',
   'resources/assets/admin_js/admin_template/jquery-ui-mouse.js',
   'resources/assets/admin_js/admin_template/jquery-ui-position.js',
   'resources/assets/admin_js/admin_template/modernizr.js',
   'resources/assets/admin_js/admin_template/resizable.js',
   'resources/assets/admin_js/admin_template/draggable.js',
   'resources/assets/admin_js/admin_template/sortable.js',
   'resources/assets/admin_js/admin_template/selectable.js',
   'resources/assets/admin_js/admin_template/moment.js',
   'resources/assets/admin_js/admin_template/bootstrap.js',
   'resources/assets/admin_js/admin_template/progressbar.js',
   'resources/assets/admin_js/admin_template/superclick.js',
   'resources/assets/admin_js/admin_template/inputswitch-alt.js',
   'resources/assets/admin_js/admin_template/slimscroll.js',
   'resources/assets/admin_js/admin_template/slidebars.js',
   'resources/assets/admin_js/admin_template/piegage.js',
   'resources/assets/admin_js/admin_template/screenfull.js',
   'resources/assets/admin_js/admin_template/contentbox.js',
   'resources/assets/admin_js/admin_template/overlay.js',
   'resources/assets/admin_js/admin_template/widgets-init.js',
   'resources/assets/admin_js/admin_template/bootstrap-datepicker.js',
   'resources/assets/admin_js/admin_template/datepicker.js',
   'resources/assets/admin_js/admin_template/ckeditor.js',
   'resources/assets/admin_js/admin_template/ck_styles.js',
   'resources/assets/admin_js/admin_template/ck_config.js',
   'resources/assets/admin_js/admin_template/ck_en.js',
   'resources/assets/admin_js/admin_template/dropzone.min.js',
   'resources/assets/admin_js/admin_template/dropzone-amd-module.min.js',
   'resources/assets/admin_js/admin_template/layout.js',
   'resources/assets/admin_js/admin_template/custom.js',
], 'public/js/admin.js');
mix.combine(['resources/assets/css/admin_template/*', 'resources/assets/css/admin_template/default.css'],'public/css/admin.css')
