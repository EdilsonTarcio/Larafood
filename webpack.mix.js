let mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
.sass('resources/css/style.scss', 'public/css/style.css')   
.postCss('resources/css/app.css', 'public/css', [
]);