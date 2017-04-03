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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return phpinfo();
    return view('welcome');
});

Route::resource('client', 'ClientController');
Route::resource('wallet', 'WalletController');

Route::resource('city', 'CityController');
Route::resource('country', 'CountryController');
Route::resource('currency', 'CurrencyController');
Route::resource('quote', 'QuoteController');
