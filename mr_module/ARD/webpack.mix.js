const { mix } = require('laravel-mix');

mix.js('assets/js/listing.js', 'public')
  .sourceMaps();

if (mix.config.inProduction) {
  mix.version();
}