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

    Route::get('/feedback', 'UserFeedbackController@index');
    Route::get('/feedback/{id}', 'UserFeedbackController@show');
    Route::post('/feedback/{id}', [
        'as' => 'userfeedback',
        'uses' => 'UserFeedbackController@store'
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
    Route::get('/', 'VendorController@index');
    Route::get('/profile', 'VendorProfileController@index');
    Route::post('/profile/{id}', [
        'as' => 'vendorupdate',
        'uses' => 'VendorProfileController@update'
    ]);

    Route::get('/my-projects', 'VendorProjectsController@index');
    Route::get('/my-projects/{id}', 'VendorProjectsController@show');

    Route::get('/my-projects/addusers/{id}', 'VendorProjectsController@addUsersToProject');
    Route::post('/my-projects/addusers', [
        'as' => 'addusersproject',
        'uses' => 'VendorProjectsController@storeUsersToProject'
    ]);

    Route::get('/product-feedback', 'VendorProductController@index');
    Route::post('/product-feedback', [
        'as' => 'vendorproduct',
        'uses' => 'VendorProductController@create'
    ]);

    Route::get('/service-feedback', 'VendorServiceController@index');
    Route::post('/service-feedback', [
        'as' => 'vendorservice',
        'uses' => 'VendorServiceController@create'
    ]);

    Route::get('/area-feedback', 'VendorAreaController@index');
    Route::post('/area-feedback', [
        'as' => 'vendorarea',
        'uses' => 'VendorAreaController@create'
    ]);
});

/**
 * WebServiceRoutes
 */

Route::group(['prefix' => 'userjson', 'middleware' => ['auth', 'users']], function() {
# User profile
    Route::get('/user/projects/{email}', 'WebServiceController@getProjectListForUser');
    Route::get('/projects/stat/{id}', 'WebServiceController@projectStatistic');
    Route::get('/projects/creator/{id}', 'WebServiceController@projectCreator');
    Route::get('/user/feedback/{email}', 'WebServiceController@usersFeedbacks');
    Route::get('/user/info/{email}', 'WebServiceController@userInfo');
});

Route::get('authMobile/login/{email}/{password}', 'WebServiceController@getLogin');
Route::get('authMobile/register/{email}/{password}/{first_name}/{last_name}', 'WebServiceController@getRegister');





