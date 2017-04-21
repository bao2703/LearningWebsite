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

Route::name('home')->get('/', 'HomeController@index');

Route::prefix('')->middleware('auth:web')->group(function() {
	Route::name('project.index')->get('/project', 'ProjectController@index');

	Route::name('lesson.show')->get('/lesson/{lesson}/show', 'LessonController@show');

	Route::name('task.check')->post('/task/check', 'TaskController@check');
});

Route::name('admin.')->prefix('admin')->namespace('Admin')->middleware('auth:admin')->group(function() {
	Route::resource('project', ProjectController::class);
	Route::name('project.delete')->get('/project/{project}/delete', 'ProjectController@delete');
	Route::name('lesson.index')->get('/lesson/{id}/project', 'LessonController@index');
});

Route::prefix('')->namespace('Auth')->group(function() {
	Route::name('login')->get('/login', 'LoginController@getLogin');
	Route::name('postLogin')->post('/login', 'LoginController@postLogin');
	Route::name('register')->get('/register', 'LoginController@getLogin');
	Route::name('logout')->post('/logout', 'LoginController@getLogin');
});