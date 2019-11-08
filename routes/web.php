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
    return view('auth.login');
})->middleware('guest');

Auth::routes();

Route::resources([
    'plans' => 'PlanController'
]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/newapp/', 'AppRequestController@index')->name('appreq')->middleware('auth');
Route::get('/newapp/{id}', 'AppRequestController@create')->name('makeapp')->middleware('auth');
Route::get('/apps', 'PlanController@display')->name('allaps')->middleware('auth');
