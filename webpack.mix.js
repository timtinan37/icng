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

// mix.js('resources/js/cover-notes/create.js', 'public/js/cover-notes/create').extract(['vue'])

mix.js('resources/js/cover-notes/edit.js', 'public/js/cover-notes/edit').extract(['vue'])