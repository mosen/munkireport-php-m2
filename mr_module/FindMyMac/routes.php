<?php
Route::resource('findmymac', 'FindMyMacController');
Route::get('stats/findmymac', 'FindMyMacController@stats');