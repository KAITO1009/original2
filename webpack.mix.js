const mix = require('laravel-mix')

mix.browserSync('vuesplash.test')
  .js('resources/assets/js/app.js', 'public/js')
  .sass('resources/assets/sass/app.scss', 'public/css')
  .version()