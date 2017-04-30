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

Route::prefix('')->middleware('auth')->group(function() {
	Route::name('project.index')->get('/project', 'ProjectController@index');

	Route::name('lesson.show')->get('/lesson/{lesson}/show', 'LessonController@show');

	Route::name('task.check')->post('/task/check', 'TaskController@check');
});

Route::name('admin.')->prefix('admin')->namespace('Admin')->middleware('admin')->group(function() {
	Route::name('home')->get('/', 'HomeController@index');
	Route::resource('project', ProjectController::class);
	Route::name('project.delete')->get('/project/{project}/delete', 'ProjectController@delete');
	Route::name('lesson.index')->get('/lesson/{project}/project', 'LessonController@index');
	Route::name('slide.index')->get('/slide/{lesson}/lesson', 'SlideController@index');
	Route::resource('slide', SlideController::class, ['except' => ['index']]);
});

Auth::routes();