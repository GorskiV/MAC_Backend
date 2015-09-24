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


Route::get('/', [
    'as' => 'home',
    'uses' => 'PagesController@home'
]);

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

/*Route::get('/user', [
    'as' => 'user',
    'uses' => 'UsersDashboardController@index'
]);*/
/*Route::get('/admin', [
    'as' => 'admin',
    'uses' => 'AdminController@home',
    'middleware'=>['admin']
]);*/
//Route::get('/vendor', [
//    'as' => 'vendor',
//    'uses' => 'UsersDashboardController@index'
//]);


Route::group(['prefix' => 'user', 'middleware' => ['auth', 'users']], function() {
# User profile
    Route::get('/', 'UsersDashboardController@index');
    Route::get('/profile', 'UserProfileController@index');
    Route::post('/profile/{id}', [
        'as' => 'profileupdate',
        'uses' => 'UserProfileController@update'
    ]);
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function() {
# Admin profile
    Route::get('/', 'AdminController@home');
    Route::get('/users', 'AdminUsersControler@index');
    Route::get('/users/{id}', 'AdminUsersControler@show');
    Route::get('/users/edit/{id}', 'AdminUsersControler@edit');
    Route::post('/users/edit/{id}', 'AdminUsersControler@update');
});

Route::group(['prefix' => 'vendor', 'middleware' => ['auth', 'vendor']], function() {
# Vendor profile
    Route::get('/', 'AdminController@home');
    Route::get('/users', 'AdminUsersControler@index');
});

/**
 * WebServiceRoutes
 */

Route::group(['prefix' => 'userjson', 'middleware' => ['auth', 'users']], function() {
# User profile
    Route::get('/projects/{id}', 'WebServiceController@getProjectListForUser');
    Route::get('/projects/stat/{id}', 'WebServiceController@projectStatistic');
    Route::get('/projects/creator/{id}', 'WebServiceController@projectCreator');
    Route::get('/user/feedback/{id}', 'WebServiceController@usersFeedbacks');
    Route::get('/user/info/{id}', 'WebServiceController@userInfo');
    Route::get('/user/info/{id}', 'WebServiceController@userInfo');
});




