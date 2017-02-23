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
Route::get('install', 'InstallController@index');

Route::get('client/listing', 'ClientController@listing');
Route::get('machine/listing', 'MachineController@listing');

Auth::routes();


