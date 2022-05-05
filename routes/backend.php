<?php

use Illuminate\Support\Facades\Route;

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
Route::namespace('backend')->group(function () {
    Route::get('login','AuthController@index')->name('login');
    Route::post('login','AuthController@check')->name('login.submit');
    Route::middleware('auth:backend')->group(function () {
        Route::get('/', 'DashboardController@index')->name('home');
        Route::get('logout', 'AuthController@logout')->name('logout');
        Route::get('profile', 'User@index')->name('profile');
    });    
});