
/*
 |--------------------------------------------------------------------------
 | Laravel Spark - Creating Amazing Experiences.
 |--------------------------------------------------------------------------
 |
 | First, we will load all of the "core" dependencies for Spark which are
 | libraries such as Vue and jQuery. This also loads the Spark helpers
 | for things such as HTTP calls, forms, and form validation errors.
 |
 | Next, we will create the root Vue application for Spark. This'll start
 | the entire application and attach it to the DOM. Of course, you may
 | customize this script as you desire and load your own components.
 |
 */
require('./libs/jquery.min.js');
require('./libs/bootstrap.min.js');
require('./libs/select2.min.js');
require('./libs/dropzone.js');
require('./libs/star-rating.min.js');
require('./libs/linkPreview.js');
require('./libs/linkPreviewRetrieve.js');
require('./googleAnalytics.js');

require('./spark/core/dependencies.js');

require('./spark/components.js');

new Vue(require('./spark/spark.js'));
