const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix//.js('resources/js/app.js', 'public/js')
    .less('resources/assets/less/admin/core.less', 'assets/admin/css/')
    .less('resources/assets/less/admin/pages.less', 'assets/admin/css/')
    .less('resources/assets/less/admin/components.less', 'assets/admin/css/')
    .less('resources/assets/less/admin/responsive.less', 'assets/admin/css/')
    .less('resources/assets/less/admin/icons.less', 'assets/admin/css/')
    ;
