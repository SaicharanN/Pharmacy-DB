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
    return view('welcome');
});
Route::get('/homee',function() {
	return view('/home');
});
Route::get('/search', 'Controller@searchbi');

Route::get('/adddrug', function () {
    return view('AddDrug');
});
Route::get('/createbill', function () {
    return view('minicreate');
});
Route::get('/edit', function () {
    return view('editprofile');
});
Route::get('/pass', function () {
    return view('password');
});

Route::post('/minicreatebi','Controller@minicreatebi');
Route::post('/search1','Controller@search1bi');
Route::post('/search2','Controller@search2bi');
Route::post('/search3','Controller@search3bi');
Route::post('/newuserbi','Controller@newuserbi');
Route::post('/createbi','Controller@createbi');
Route::post('/addDrugbi','Controller@addDrugbi');
Route::get('/history','Controller@historybi');
Route::get('/profile','Controller@profilebi');
Route::post('/editpr','Controller@editbi');
Route::post('/editps','Controller@passbi');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


