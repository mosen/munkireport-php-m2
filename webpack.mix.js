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

mix.js('resources/assets/js/app.js', 'public/js')
  .sourceMaps()
  .extract(['vue', 'axios', 'd3', 'bootstrap-vue', 'vue-axios', 'vue-i18n', 'vue-tables-2']);

mix.sass('resources/assets/sass/app.scss', 'public/css');

if (mix.config.inProduction) {
  mix.version();
}