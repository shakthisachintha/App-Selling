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
Route::post('/regen', 'AppRequestController@regenerate')->name('regen')->middleware('auth');


Route::get('/upcommingapps', 'GeneralController@upcomming')->name('upcomming')->middleware('auth');
Route::get('/help', 'GeneralController@help')->name('help')->middleware('auth');
Route::get('/addfaq', 'GeneralController@addFaq')->name('addfaq')->middleware('auth');
Route::post('/createfaq', 'GeneralController@createFaq')->name('createfaq')->middleware('auth');
Route::get('/editfaq/{id}', 'GeneralController@editFaq')->name('editfaq')->middleware('auth');
Route::post('/savefaq', 'GeneralController@saveFaq')->name('savefaq')->middleware('auth');
Route::get('/delfaq/{id}', 'GeneralController@delFaq')->name('delfaq')->middleware('auth');
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
Route::get('/catedit/{id}', 'PlanController@catEdit')->name('catedit')->middleware('auth');
Route::post('/catupdate', 'PlanController@catUpdate')->name('catupdate')->middleware('auth');
Route::get('/catdel/{id}', 'PlanController@catDel')->name('catdel')->middleware('auth');

Route::get('/addup', 'UpCommingController@index')->name('addup')->middleware('auth');
Route::post('/saveup', 'UpCommingController@save')->name('saveup')->middleware('auth');
Route::post('/updateup', 'UpCommingController@update')->name('updateup')->middleware('auth');
Route::get('/editup/{id}', 'UpCommingController@edit')->name('editup')->middleware('auth');
Route::get('/deleteup/{id}', 'UpCommingController@delete')->name('deleteup')->middleware('auth');