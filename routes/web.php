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

Route::get('/adddrug', function () {
    return view('AddDrug');
});
Route::get('/createbill', function () {
    return view('minicreate');
});

Route::post('/minicreatebi','Controller@minicreatebi');
Route::post('/newuserbi','Controller@newuserbi');
Route::post('/createbi','Controller@createbi');
Route::post('/addDrugbi','Controller@addDrugbi');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


