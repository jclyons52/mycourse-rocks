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

include __DIR__.'/adminRoutes.php';


Route::group(['middleware' => 'auth'], function()
{

});

Route::get('fileentry', 'FileEntryController@index');
Route::get('fileentry/get/{filename}', [
    'as' => 'getentry',
    'uses' => 'FileEntryController@show'
]);


Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);
Route::get('login/{provider?}', 'Auth\AuthController@login');

//Route::resource('api/comments', 'API\CommentAPIController');

Route::resource('products', 'ProductController');
Route::resource('lessons', 'LessonController');
Route::get('lessons/create/{id}', [
    'as' => 'lessons.create',
    'uses' => 'LessonController@create'
]);


Route::resource('categories', 'CategoryController');
Route::resource('quizzes', 'QuizController');
Route::resource('users', 'UserController');
Route::resource('links', 'LinksController');

Route::resource('comments', 'CommentController');

Route::get('comments/{id}/delete', [
    'as' => 'comments.delete',
    'uses' => 'CommentController@destroy',
]);

Route::get('about', 'PageController@about');
Route::get('popular', 'PageController@popular');
Route::post('contact', [
    'as' => 'contact',
    'uses' => 'PageController@contact'
]);

Route::get('product/{id}', 'StoreController@product');
Route::get('/', 'CategoryController@index');

Route::get('/lesson/{id}', 'StoreController@lesson');

Route::post('follows', [
    'as' => 'follows.store',
    'uses' => 'FollowsController@store'
]);

Route::get('follows/{id}', [
    'as' => 'follows.delete',
    'uses' => 'FollowsController@destroy'
]);

/*
 * favorites routes
 */
Route::post('favorites', [
    'as' => 'favorites.store',
    'uses' => 'FavoritesController@store'
]);

Route::get('favorites/{id}', [
    'as' => 'favorites.delete',
    'uses' => 'FavoritesController@destroy'
]);

Route::group(['prefix' => 'blog'], function()
{
    Route::resource('posts', 'BlogController');

});