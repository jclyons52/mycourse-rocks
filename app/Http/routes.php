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

Route::group(['middleware' => 'admin'], function()
{

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

    Route::resource('roles', 'RoleController');

    Route::get('roles/{id}/delete', [
        'as' => 'roles.delete',
        'uses' => 'RoleController@destroy',
    ]);

    Route::resource('users', 'UserAdminController');

    Route::get('users/{id}/delete', [
        'as' => 'users.delete',
        'uses' => 'UserAdminController@destroy',
    ]);

    Route::resource('permissions', 'PermissionsController');

    Route::get('permissions/{id}/delete', [
        'as' => 'permissions.delete',
        'uses' => 'PermissionsController@destroy',
    ]);
});

Route::group(['middleware' => 'auth'], function()
{

});



Route::get('/', 'WelcomeController@index');

Route::get('home', 'HomeController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);


