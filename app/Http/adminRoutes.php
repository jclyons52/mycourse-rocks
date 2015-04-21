<?php


Route::group(['middleware' => 'admin'], function() {

    /**
     * Log view route
     */

    Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

});

Route::group(['middleware' => 'admin', 'prefix' => 'admin'], function()
{

    /**
     *  Role management routes
     */

    Route::resource('roles', 'AdminRoleController');

    Route::get('roles/{id}/delete', [
        'as' => 'admin.roles.delete',
        'uses' => 'AdminRoleController@destroy',
    ]);

    /**
     * User management routes
     */

    Route::resource('users', 'AdminUserController');

    Route::get('users/{id}/delete', [
        'as' => 'admin.users.delete',
        'uses' => 'AdminUserController@destroy',
    ]);

    /**
     * Permissions management routes
     */

    Route::resource('permissions', 'AdminPermissionsController');

    Route::get('permissions/{id}/delete', [
        'as' => 'admin.permissions.delete',
        'uses' => 'AdminPermissionsController@destroy',
    ]);

    /**
     * Product management routes
     */

    Route::resource('products', 'AdminProductController');

    Route::get('products/{id}/delete', [
        'as' => 'admin.products.delete',
        'uses' => 'AdminProductController@destroy',
    ]);

    /**
     * Category management routes
     */

    Route::resource('categories', 'AdminCategoryController');

    Route::get('categories/{id}/delete', [
        'as' => 'admin.categories.delete',
        'uses' => 'AdminCategoryController@destroy',
    ]);

    /**
     * Tag management routes
     */

    Route::resource('tags', 'AdminTagController');

    Route::get('tags/{id}/delete', [
        'as' => 'admin.tags.delete',
        'uses' => 'AdminTagController@destroy',
    ]);

    /**
     * Lesson management routes
     */
    Route::resource('lessons', 'AdminLessonController');

    Route::get('lessons/{id}/delete', [
        'as' => 'admin.lessons.delete',
        'uses' => 'AdminLessonController@destroy',
    ]);

    Route::resource('links', 'AdminLinkController');

    Route::get('links/{id}/delete', [
        'as' => 'admin.links.delete',
        'uses' => 'AdminLinkController@destroy',
    ]);

    Route::resource('quizzes', 'QuizController');

    Route::get('quizzes/{id}/delete', [
        'as' => 'admin.quizzes.delete',
        'uses' => 'QuizController@destroy',
    ]);


    Route::post('fileentry/add',[
        'as' => 'addentry', 'uses' => 'FileEntryController@add']);
});