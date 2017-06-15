<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('/register', 'Auth\AuthController@register');
Route::post('/login', 'Auth\AuthController@login');
Route::post('/logout', 'Auth\AuthController@logout');

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('/me', 'Auth\AuthController@user');
});

Route::group(['prefix' => 'v1', 'namespace' => 'Api'], function () {
    Route::get('metrics', 'MetricController@index');
    Route::get('stats/report_data', 'ReportDataController@stats');
    Route::get('stats/uptime', 'ReportDataController@uptime');
    Route::get('stats/new_clients', 'MachineController@new_clients');

    Route::resource('events', 'EventController');
    Route::resource('machines', 'MachineController');
    Route::resource('report_data', 'ReportDataController');
    Route::resource('business_units', 'BusinessUnitController');
    Route::resource('clients', 'ClientController');

    Route::post('webhook/endpoint', 'WebhookController@endpoint');
});


