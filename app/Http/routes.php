<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['middleware' => 'guest'], function() {
	Route::get('/', function () {
		return view('spark::welcome');
	});
});



include __DIR__.'/adminRoutes.php';


Route::group(['middleware' => 'auth'], function()
{

});

Route::get('fileentry', 'FileEntryController@index');
Route::get('fileentry/get/{filename}', [
		'as' => 'getentry',
		'uses' => 'FileEntryController@show'
]);

//Route::resource('api/comments', 'API\CommentAPIController');

Route::resource('products', 'ProductController');


Route::post('results/store', [
		'as' => 'results.store',
		'uses' => 'UserLessonResultController@store'
]);
Route::resource('lessons', 'LessonController');
Route::get('lessons/{id}/links', 'LessonController@links');
Route::get('lessons/create/{id}', [
		'as' => 'lessons.create',
		'uses' => 'LessonController@create'
]);


Route::resource('categories', 'CategoryController');
Route::resource('quizzes', 'QuizController');

/*
 * User Routes
 */

Route::get('followers', 'UserController@followers');
Route::get('followers', 'UserController@followers');
Route::resource('users', 'UserController');

/*
 * Links Routes
 */

Route::post('links/textCrawler', 'LinksController@textCrawler');
Route::get('links/highlighter', 'LinksController@highlighter');
Route::resource('links', 'LinksController');
Route::post('links/delete', [
		'as' => 'links.delete',
		'uses' => 'LinksController@destroy',
]);

Route::get('home', 'HomeController@index');

/*
 * Comments Routes
 */

Route::resource('comments', 'CommentController');

Route::get('comments/{id}/delete', [
		'as' => 'comments.delete',
		'uses' => 'CommentController@destroy',
]);

Route::get('about', 'PageController@about');
Route::get('dashboard', 'PageController@userDashboard');
Route::get('front_page', 'PageController@frontPage');
Route::get('popular', 'PageController@popular');
Route::post('contact', [
		'as' => 'contact',
		'uses' => 'PageController@contact'
]);


Route::get('product/{id}', 'StoreController@product');


Route::post('follows', [
		'as' => 'follows.store',
		'uses' => 'FollowsController@store'
]);

Route::get('follows/{id}', [
		'as' => 'follows.delete',
		'uses' => 'FollowsController@destroy'
]);

Route::post('add_moderator', [
		'as' => 'mods.store',
		'uses' => 'ModsController@store'
]);

Route::post('remove_moderator', [
		'as' => 'mods.delete',
		'uses' => 'ModsController@destroy'
]);

/*
 * favorites routes
 */
Route::get('favorite/{id}', [
		'as' => 'favorites.store',
		'uses' => 'FavoritesController@store'
]);

Route::get('unfavorite/{id}', [
		'as' => 'favorites.delete',
		'uses' => 'FavoritesController@destroy'
]);

Route::group(['prefix' => 'blog'], function()
{
	Route::resource('posts', 'BlogController');

});


Route::resource('api/notes', 'API\NoteAPIController');

Route::resource('api/lessons', 'API\LessonsAPIController');

Route::get('api/notes/{id}/delete', [
		'as' => 'api.notes.delete',
		'uses' => 'API\NoteAPIController@destroy',
]);
