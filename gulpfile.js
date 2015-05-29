var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less', 'resources/css');

    mix.styles([
    	//'libs/roboto.css',
    	'libs/select2.min.css',
        'libs/dropzone.css',
        'libs/star-rating.min.css',
        'libs/linkPreview.css',
    	'app.css'


    ]);

    mix.scripts([
    	'libs/jquery.min.js',
    	'libs/bootstrap.min.js',
        'libs/vue.min.js',
    	'libs/select2.min.js',
        'libs/dropzone.js',
        'libs/star-rating.min.js',
        'libs/linkPreview.js',
        'libs/linkPreviewRetrieve.js',
        'googleAnalytics.js'
    	
    ]);
});
