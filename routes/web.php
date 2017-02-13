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

Route::get('/', 'DashboardController@index');

Route::get('client/detail/{serialNumber}', 'ClientController@detail');

Auth::routes();

Route::group(['prefix' => 'report', 'middleware' => 'safephpunserialize'], function () {
    Route::post('hash_check', 'MR2CheckInController@hash_check');
    Route::post('checkin', 'MR2CheckInController@check_in');
    Route::post('broken_client', 'MR2CheckInController@broken_client');
});
