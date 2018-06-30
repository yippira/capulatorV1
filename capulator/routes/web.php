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

Route::get('/', function () {
    return view('pages.index');
});

Route::get('/slider', function() {

    return view('pages.slider');
});

Route::get('/dashboard', function(){
    return view('dashboard.index');
});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index');

Route::get('/modules', function(){

    return view('dashboard.modules');
});
