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
	Route::name('lesson.create')->get('/lesson/{project}/project/create', 'LessonController@create');
	Route::name('lesson.store')->post('/lesson/{project}/project/store', 'LessonController@store');
	Route::name('lesson.edit')->get('/lesson/{lesson}/edit', 'LessonController@edit');
	Route::name('lesson.update')->post('/lesson/{lesson}/update', 'LessonController@update');
	Route::name('lesson.show')->get('/lesson/{lesson}/show', 'LessonController@show');
	Route::name('lesson.destroy')->post('/lesson/{lesson}/destroy', 'LessonController@destroy');

	Route::name('slide.index')->get('/slide/{lesson}/lesson', 'SlideController@index');
	Route::name('slide.create')->get('/slide/{lesson}/lesson/create', 'SlideController@create');
	Route::name('slide.store')->post('/slide/{lesson}/lesson/store', 'SlideController@store');
	Route::name('slide.edit')->get('/slide/{slide}/edit', 'SlideController@edit');
	Route::name('slide.update')->post('/slide/{slide}/update', 'SlideController@update');
	Route::name('slide.destroy')->post('/slide/{slide}/destroy', 'SlideController@destroy');

	Route::resource('user', UserController::class);
});

Auth::routes();