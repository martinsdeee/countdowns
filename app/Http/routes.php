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

Route::get('/', 'WelcomeController@index');

Route::get('home',[
	'as' => 'home',
	'middleware' => 'auth',
	'uses' => 'HomeController@index',
]);

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

/**
 * Countdowns
 */

Route::get('new', [
	'as' => 'create',
	'middleware' => 'auth',
	'uses' => 'HomeController@create'
]);
Route::post('new', [
	'as' => 'store',
	'middleware' => 'auth',
	'uses' => 'HomeController@store'
]);
Route::get('/edit/{cd}', [
	'as' => 'edit',
	'middleware' => 'auth',
	'uses' => 'HomeController@edit'
]);
Route::post('/edit/{cd}', [
	'as' => 'update',
	'middleware' => 'auth',
	'uses' => 'HomeController@update'
]);
Route::get('{cd}', 'HomeController@show');
