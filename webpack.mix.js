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

mix.options({
   processCssUrls: false
}); // When compile scss file the svg cause problems because of the processed css url names so deactivate the option

mix.js('resources/js/app.js', 'public/js')
   .js("resources/js/welcome-particles.js", 'public/js')
   .js('resources/js/type-writer.js', 'public/js')
   .js('resources/js/carousel.js', 'public/js')
   .js('resources/js/welcomeMenu.js', 'public/js')
   .js('resources/js/projects.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .sass('resources/sass/console-drro.scss', 'public/css')
   .sass('resources/sass/welcome.scss', 'public/css')
   .sass('resources/sass/projects.scss', 'public/css')
   .sass('resources/sass/contact.scss', 'public/css')
   .sass('resources/sass/animate.scss', 'public/css')
   .sass('resources/sass/404.scss', 'public/css')
   .sass('resources/sass/dashboard.scss', 'public/css');