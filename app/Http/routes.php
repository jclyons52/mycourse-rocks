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

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function()
{

    /**
     * Log view route
     */

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    /**
     *  Role management routes
     */

    Route::resource('roles', 'RoleController');

    Route::get('roles/{id}/delete', [
        'as' => 'admin.roles.delete',
        'uses' => 'RoleController@destroy',
    ]);

    /**
     * User management routes
     */

    Route::resource('users', 'UserAdminController');

    Route::get('users/{id}/delete', [
        'as' => 'admin.users.delete',
        'uses' => 'UserAdminController@destroy',
    ]);

    /**
     * Permissions management routes
     */

    Route::resource('permissions', 'PermissionsController');

    Route::get('permissions/{id}/delete', [
        'as' => 'admin.permissions.delete',
        'uses' => 'PermissionsController@destroy',
    ]);

    /**
     * Product management routes
     */

    Route::resource('products', 'ProductController');

    Route::get('products/{id}/delete', [
        'as' => 'admin.products.delete',
        'uses' => 'ProductController@destroy',
    ]);

    /**
     * Category management routes
     */

    Route::resource('categories', 'CategoryController');

    Route::get('categories/{id}/delete', [
        'as' => 'admin.categories.delete',
        'uses' => 'CategoryController@destroy',
    ]);

    /**
     * Tag management routes
     */

    Route::resource('tags', 'TagController');

    Route::get('tags/{id}/delete', [
        'as' => 'admin.tags.delete',
        'uses' => 'TagController@destroy',
    ]);

    /**
     * Lesson management routes
     */
    Route::resource('lessons', 'LessonController');

    Route::get('lessons/{id}/delete', [
        'as' => 'lessons.delete',
        'uses' => 'LessonController@destroy',
    ]);
});

Route::group(['middleware' => 'auth'], function()
{

});

Route::get('fileentry', 'FileEntryController@index');
Route::get('fileentry/get/{filename}', [
    'as' => 'getentry', 'uses' => 'FileEntryController@get']);
Route::post('fileentry/add',[
    'as' => 'addentry', 'uses' => 'FileEntryController@add']);


Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


Route::resource('api/comments', 'API\CommentAPIController');

Route::resource('comments', 'CommentController');

Route::get('comments/{id}/delete', [
    'as' => 'comments.delete',
    'uses' => 'CommentController@destroy',
]);

Route::get('product/{id}', 'StoreController@product');
Route::get('/', 'StoreController@index');

