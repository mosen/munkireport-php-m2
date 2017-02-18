<?php
Route::resource('directoryservice', 'DirectoryServiceController');
Route::get('stats/directoryservice', 'DirectoryServiceController@stats');
