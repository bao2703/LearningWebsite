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

Route::name('home.index')->get('/', 'HomeController@index');

Route::name('project.index')->get('/project', 'ProjectController@index');

Route::name('lesson.index')->get('/lesson/{id}', 'LessonController@index');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function() {
	Route::resource('project', ProjectController::class);
	Route::name('lesson.index')->get('/lesson/project-{id}', 'LessonController@index');
});