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

const vendor = [
  'vue',
  'axios',
  'd3',
  'bootstrap-vue',
  'vue-axios',
  'vue-i18n',
  'vue-tables-2',
  'vue-d3',
  'vue-nvd3'
];



mix.js('resources/assets/js/navigation.js', 'public/js');

// TODO: temporary, should be dynamically determined.
mix.js('mr_module/ARD/assets/js/listing.js', 'public/js/x/ard');
mix.js('mr_module/Bluetooth/assets/js/listing.js', 'public/js/x/bluetooth');
mix.js('mr_module/Certificate/assets/js/listing.js', 'public/js/x/certificate');
mix.js('mr_module/DirectoryService/assets/js/listing.js', 'public/js/x/directoryservice');
mix.js('mr_module/DiskReport/assets/js/listing.js', 'public/js/x/diskreport');
mix.js('mr_module/Display/assets/js/listing.js', 'public/js/x/display');
mix.js('mr_module/MunkiReport/assets/js/listing.js', 'public/js/x/munkireport');
mix.js('mr_module/Network/assets/js/listing.js', 'public/js/x/network');
mix.js('mr_module/Power/assets/js/listing.js', 'public/js/x/power');
mix.js('mr_module/Printer/assets/js/listing.js', 'public/js/x/printer');
mix.js('mr_module/Security/assets/js/listing.js', 'public/js/x/security');
mix.js('mr_module/TimeMachine/assets/js/listing.js', 'public/js/x/timemachine');
mix.js('mr_module/Warranty/assets/js/listing.js', 'public/js/x/warranty');

mix.js([
    'resources/assets/js/app.js'
], 'public/js')
    .sourceMaps()
    .extract(vendor);

mix.sass('resources/assets/sass/app.scss', 'public/css');

if (mix.config.inProduction) {
  mix.version();
}