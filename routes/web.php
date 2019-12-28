<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', 'HomeController@index')->name('dashboard');

Route::group(['middleware' => 'auth'], function () {
	Route::group(['prefix' => 'users'], function () {
		Route::get('/', 'UserController@index')->name('users.index');
		Route::get('/datatable', 'UserController@datatable')->name('users.datatable');
		Route::get('/{user}', 'UserController@edit')->name('users.edit');
		
		Route::post('/', 'UserController@store')->name('users.store');
		Route::put('/{user}', 'UserController@update')->name('users.update');
		Route::delete('/{user}', 'UserController@destroy')->name('users.destroy');
	});
	
	Route::group(['prefix' => 'pages'], function () {
		Route::get('/', 'PageController@index')->name('pages.index');
		Route::get('/datatable', 'PageController@datatable')->name('pages.datatable');
		Route::get('/create', 'PageController@create')->name('pages.create');
		Route::get('/{page}/edit', 'PageController@edit')->name('pages.edit');
		
		Route::post('/', 'PageController@store')->name('pages.store');
		Route::put('/{page}', 'PageController@update')->name('pages.update');
		Route::delete('/{page}', 'PageController@destroy')->name('pages.destroy');
	});
	
	Route::group(['prefix' => 'projects'], function () {
		Route::get('/', 'ProjectController@index')->name('projects.index');
		Route::get('/datatable', 'ProjectController@datatable')->name('projects.datatable');
		Route::get('/create', 'ProjectController@create')->name('projects.create');
		Route::get('/{project}/edit', 'ProjectController@edit')->name('projects.edit');
		
		Route::post('/', 'ProjectController@store')->name('projects.store');
		Route::put('/{project}', 'ProjectController@update')->name('projects.update');
		Route::delete('/{project}', 'ProjectController@destroy')->name('projects.destroy');
	});
	
	Route::group(['prefix' => 'aspirations'], function () {
		Route::get('/', 'AspirationController@index')->name('aspirations.index');
		Route::get('/datatable', 'AspirationController@datatable')->name('aspirations.datatable');
		Route::get('/create', 'AspirationController@create')->name('aspirations.create');
		Route::get('/{aspiration}/edit', 'AspirationController@edit')->name('aspirations.edit');
		
		Route::post('/', 'AspirationController@store')->name('aspirations.store');
		Route::put('/{aspiration}', 'AspirationController@update')->name('aspirations.update');
		Route::delete('/{aspiration}', 'AspirationController@destroy')->name('aspirations.destroy');
	});
});
