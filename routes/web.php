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

Route::get('/', 'EntryController@index');
Route::get('ioi', "EntryController@ioi_index")->name('ioi_index');
Route::get('cpr', "EntryController@cpr_index")->name('cpr_index');
Route::get('auth', 'AuthController@auth');
Route::get('token', 'AuthController@token');
Route::get('logout', 'AuthController@logout');
Route::resource('user', 'UserController');

//route for IOI service
Route::group(['prefix' => 'ioi'], function () {
    Route::resource('events','IOIEventController');
    Route::resource('reservations','IOIReservationController');
});

//route for cpr service
Route::group(['prefix' => 'cpr'], function () {
    
});


