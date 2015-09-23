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

Route::get('/admin', [
    'as' => 'admin',
    'uses' => 'AdminController@home'
]);

Route::group(['prefix' => 'users', 'middleware' => 'auth', 'namespace' => 'Users'], function() {
# User profile
    Route::get('dashboard', 'DashboardController@index');
});
