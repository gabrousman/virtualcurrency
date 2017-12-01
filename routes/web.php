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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/sendmoney', 'TransactionController@sendmoney')->name('sendmoney');
Route::get('/transactions', 'TransactionController@list')->name('transactions');
Route::get('/moneyrecieved', 'TransactionController@moneyrecieved')->name('moneyrecieved');
Route::get('/markasread', 'TransactionController@MarkNotifications')->name('markasread');

Route::post('/sendmoney', 'TransactionController@moneysent');
