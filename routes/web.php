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
Route::get('/apps', 'AppRequestController@display')->name('allaps')->middleware('auth');
Route::get('/paidapps', 'AppRequestController@allPurchases')->name('apppurch')->middleware('auth');
Route::get('/orders', 'AppRequestController@orders')->name('orders')->middleware('auth');

Route::post('/makepay', 'AppRequestController@makePayment')->name('payment')->middleware('auth');
Route::post('/makepayh', 'AppRequestController@makeHalfPayment')->name('hpayment')->middleware('auth');
Route::post('/makepayah', 'AppRequestController@payOtherHalf')->name('ahpayment')->middleware('auth');
Route::post('/saveappinfo', 'AppRequestController@saveAppInfo')->name('appinfo')->middleware('auth');
Route::post('/saveaddinfo', 'AppRequestController@saveAddInfo')->name('addinfo')->middleware('auth');
Route::post('/payment/{trans_id}/{pay_type}/{user_id}', 'AppRequestController@PayComplete')->name('payComplete')->middleware('auth');

Route::get('/upcommingapps', 'GeneralController@upcomming')->name('upcomming')->middleware('auth');
Route::get('/help', 'GeneralController@help')->name('help')->middleware('auth');
Route::get('/contact', 'GeneralController@contact')->name('contact')->middleware('auth');
Route::post('/contactmsg', 'GeneralController@contactMessage')->name('contactSave')->middleware('auth');
Route::get('/users', 'GeneralController@users')->name('allusers')->middleware('auth');

Route::get('/vieworder/{id}', 'AppRequestController@viewOrder')->name('vieworder')->middleware('auth');
Route::get('/del/{id}', 'AppRequestController@delOrder')->name('delorder')->middleware('auth');
Route::get('/download/{file}/{id}', 'AppRequestController@download')->name('download')->middleware('auth');

Route::get('/viewreq/{id}', 'AppRequestController@viewReq')->name('viewreq')->middleware('auth');
Route::post('/response', 'AppRequestController@response')->name('response')->middleware('auth');

Route::post('/saveapp', 'AppRequestController@saveAppInfoTwo')->name('appinfo2')->middleware('auth');
Route::post('/saveadd', 'AppRequestController@saveAddInfoTwo')->name('addinfo2')->middleware('auth');
Route::get('/cat', 'PlanController@addCat')->name('addcat')->middleware('auth');
Route::post('/catsave', 'PlanController@catSave')->name('catsave')->middleware('auth');