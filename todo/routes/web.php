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

Route::get('/',
'TaskController@getTasks');

Route::get('/tasks',
'TaskController@getTasks')->name('tasks');

Route::get('/create',
'TaskController@taskForm');

Route::post('/addtask', 'TaskController@addTask');

Route::get('/edittask/{id}', 
'TaskController@taskEditForm');

Route::post('/updatetask', 'TaskController@updateTask');


Route::delete('/deletetask/{id}', 'TaskController@deleteTask');