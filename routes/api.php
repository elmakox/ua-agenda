<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::group(['namespace' => 'API'], function () {
	Route::group(['prefix' => 'projects'], function () {
		Route::get('/', 'ProjectController@index');
		Route::get('/{project}', 'ProjectController@get');
	});
	
	Route::group(['prefix' => 'aspirations'], function () {
		Route::get('/', 'AspirationController@index');
		Route::get('/{aspiration}', 'AspirationController@get');
	});
});

