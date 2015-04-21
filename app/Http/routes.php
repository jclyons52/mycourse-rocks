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
    'as' => 'getentry', 'uses' => 'FileEntryController@get']);


Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


//Route::resource('api/comments', 'API\CommentAPIController');

Route::resource('products', 'ProductController');
Route::resource('lessons', 'LessonController');
Route::resource('categories', 'CategoryController');
Route::resource('quizzes', 'QuizController');

Route::resource('comments', 'CommentController');

Route::get('comments/{id}/delete', [
    'as' => 'comments.delete',
    'uses' => 'CommentController@destroy',
]);

Route::get('product/{id}', 'StoreController@product');
Route::get('/', 'CategoryController@index');

Route::get('/lesson/{id}', 'StoreController@lesson');




