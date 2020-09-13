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

 
// to copy our assets from the resources foldet to public folder.
mix.copyDirectory('resources/admintemplate', 'public/admintemplate');
mix.copyDirectory('resources/customertemplate', 'public/customertemplate');
mix.copyDirectory('storage/app/public/products', 'public/storage/products');
mix.copyDirectory('storage/app/public/categories', 'public/storage/categories');
/* use in the future to compile our VueJS Components
mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');
*/
mix.js('resources/js/app.js', 'public/admintemplate/js');
