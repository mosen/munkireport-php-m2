<?php
// These routes need to be exempt from CSRF but not part of the api namespace.

Route::group(['prefix' => 'report', 'middleware' => 'safephpunserialize'], function () {
    Route::post('hash_check', 'MR2CheckInController@hash_check');
    Route::post('check_in', 'MR2CheckInController@check_in');
    Route::post('broken_client', 'MR2CheckInController@broken_client');
});
