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

Route::get('/', 'PagesController@index');
Route::get('/slider', 'PagesController@slider');

Route::get('/dashboard', 'DashboardController@index');

Auth::routes();

Route::get('/modules', 'ModulesController@index');
Route::get('/notes', 'NotesController@index');

Route::resource('modules', 'ModulesController');
Route::resource('notes', 'NotesController');
Route::get('targetSetting', 'DashboardController@targetSetting');
Route::get('testing', 'PagesController@test');