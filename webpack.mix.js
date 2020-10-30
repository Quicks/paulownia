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
   'resources/assets/admin_js/admin_template/menu-creator.js',
   'resources/assets/admin_js/admin_template/select2.js',
   'resources/assets/admin_js/admin_template/jstree.js',
   'resources/assets/admin_js/admin_template/ck_jquery_adapter.js',
   'resources/assets/admin_js/admin_template/vue.js',
   'resources/assets/admin_js/admin_template/layout.js',
   'resources/assets/admin_js/admin_template/custom.js',
], 'public/js/admin.js').version();
mix.combine(['resources/assets/css/admin_template/*', 'resources/assets/css/admin_template/default.css'],'public/css/admin.css').version()

mix.combine([
   'resources/assets/public_js/jquery-1.12.4.min.js',
   'resources/assets/public_js/bootstrap.min.js',
   'resources/assets/public_js/imagesloaded.pkgd.min.js',
   'resources/assets/public_js/isotope.min.js',
   'resources/assets/public_js/jquery.countdown.min.js',
   'resources/assets/public_js/jquery.counterup.min.js',
   'resources/assets/public_js/jquery.dd.min.js',
   'resources/assets/public_js/jquery.elevatezoom.js',
   'resources/assets/public_js/jquery.fitvids.js',
   'resources/assets/public_js/jquery.parallax-scroll.js',
   'resources/assets/public_js/jquery-ui.js',
   'resources/assets/public_js/js.cookie.js',
   'resources/assets/public_js/magnific-popup.min.js',
   'resources/assets/public_js/owl.carousel.min.js',
   'resources/assets/public_js/parallax.js',
   'resources/assets/public_js/popper.min.js',
   'resources/assets/public_js/shop-quick-view.js',
   'resources/assets/public_js/waypoints.min.js',
   'resources/assets/public_js/scripts.js',
   'resources/assets/public_js/custom_scripts.js',
   'resources/assets/public_js/comments.js',
   'resources/assets/public_js/slick.min.js',
   'resources/assets/public_js/jquery.justified.min.js',
], 'public/js/app.js').version();
mix.combine(['resources/assets/css/public/*'],'public/css/app.css').version()

